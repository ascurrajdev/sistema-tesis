<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Empleado;
use App\Models\Agendamiento;
use Illuminate\Http\Request;
use App\Events\PagoProcesado;
use App\Services\{PaypalService,PagoparService};
use App\Models\DetallePagoAgendamiento;
use App\Http\Resources\Json\AgendamientosListJson;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendNotificationReservaPago;
use App\Http\Responsables\Agendamientos\AgendamientosIndex;

class AgendamientosController extends Controller
{
    private $paypalServices,$pagoparService;

    public function __construct(){
        $this->paypalServices = resolve(PaypalService::class);
        $this->pagoparService = resolve(PagoparService::class);
    }

    public function index(){
        return new AgendamientosIndex();
    }

    public function handleCapturePaymentDetails(Request $request){
        $resultado = $request->input('resultado.0');
        $detallePago = DetallePagoAgendamiento::firstWhere("transaccion_id","=",$resultado["hash_pedido"]);
        $tokenPedido = sha1(config('services.pagopar.token_private').$detallePago->transaccion_id);
        if($tokenPedido == $resultado["token"]){
            $estadoPago = $resultado["pagado"] ? 2 : 1;
            $estadoPago = $resultado["cancelado"] ? 3 : $estadoPago;
            $detallePago->update([
                "forma_pago_id" => $resultado["forma_pago_identificador"],
                "estado_pago_id" => $estadoPago
            ]);
            return response()->json([$resultado]);
        }
        return response()->json([
            "data" => "El pago no fue procesado"
        ]);
    }

    public function handleDetailsPayment($hash){
        $detailsOrder = $this->pagoparService->getDetailsOrder($hash);
        $detalle = $detailsOrder->resultado[0];
        return view("usuarios.agendamientos.payment-details",[
            "detalle" => $detalle
        ]);
    }

    public function handleRedirectPayment(Agendamiento $agendamiento){
        $order = $this->pagoparService->createOrder($agendamiento);
        DetallePagoAgendamiento::create([
            'agendamiento_id' => $agendamiento->id,
            'forma_pago_id' => 1,
            'estado_pago_id' => 1,
            'monto' => 600000,
            'transaccion_id' => $order->resultado[0]->data
        ]);
        return $this->pagoparService->handlePayment($order);
        // $order = $this->paypalServices->createOrder(100.00,'usd');
        // DetallePagoAgendamiento::create(array(
        //     'agendamiento_id' => $agendamientoId,
        //     'forma_pago_id' => 1,
        //     'estado_pago_id' => 1,
        //     'monto' => 500000,
        //     'transaccion_id' => $order->id,
        // ));
        // return $this->paypalServices->handlePayment($order);
    }

    public function getAllFechasReservadas(){
        return AgendamientosListJson::collection(Agendamiento::all('start','end'));
    }

    public function handleCapturePayment(Request $request){
        $detallePago = DetallePagoAgendamiento::firstWhere('transaccion_id','=',$request->token);
        $detallePago->estado_pago_id = 2;
        $detallePago->save();
        event(new PagoProcesado($detallePago));
        $administradores = Empleado::whereHas('role',function($query){
            $query->where('nombre','=','administrador');
        })->get();
        Notification::send($administradores,new SendNotificationReservaPago($detallePago));
        $this->paypalServices->capturePayment($request->token);
        return redirect()
                        ->route('agendamientos.index')
                        ->with(array(
                            'payment_success' => 'El pago se realizo satisfactoriamente'
                        ));
    }

    public function handlePaymentCancelled(Request $request){
        $detallePago = DetallePagoAgendamiento::firstWhere('transaccion_id','=',$request->token);
        $detallePago->estado_pago_id = 3;
        $detallePago->save();
        return redirect()
                        ->route('agendamientos.index')
                        ->with(array(
                            'payment_error' => 'El pago ha sido cancelado'
                        ));

    }

    public function create(){
        return view('agendamientos.create');
    }

    public function store(Request $request){
        Validator::make($request->all(),array(
            'start' => ['required'],
            'end' => ['required'],
            'motivo' => ['required'],
            'cantidad_personas' => ['required'],
            'servicio_id' => ['required'],
            'numero_telefono' => ['required']
        ))->validate();
        $fechaInicio = date_create($request->start);
        $fechaLimiteReservacion = date_create("+30 days");
        if($fechaInicio < $fechaLimiteReservacion){
            $fechaLimiteReservacion = $fechaInicio;
        }
        $reservacion = Agendamiento::create([
            'start' => $request->start,
            'end' => $request->end,
            'motivo' => $request->motivo,
            'cantidad_personas' => $request->cantidad_personas,
            'servicio_id' => $request->servicio_id,
            'numero_telefono' => $request->numero_telefono,
            'user_id' => Auth::id(),
            'estado_id' => 1,
            'fecha_maxima_confirmacion' => $fechaLimiteReservacion->format('Y-m-d'),
        ]);
        return redirect()->route('agendamientos.index')->with(array('created' => 'Reserva creada exitosamente'));
    }
}
