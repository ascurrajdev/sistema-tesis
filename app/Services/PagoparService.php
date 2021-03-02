<?php
namespace App\Services;
use App\Traits\ConsumesExternalServices;
use App\Models\Agendamiento;
class PagoparService{

    use ConsumesExternalServices;

    private $tokenPublic,$tokenPrivate,$urlBase;
    
    public function __construct(){
        $this->urlBase = config('services.pagopar.base_uri');
        $this->tokenPublic = config('services.pagopar.token_public');
        $this->tokenPrivate = config('services.pagopar.token_private');
    }

    public function decodeResponse($response){
        return json_decode($response);
    }

    public function getDetailsOrder($hash){
        return $this->makeRequest(
            'POST',
            'pedidos/1.1/traer',
            [],
            [
                'hash_pedido' => $hash,
                'token' => $this->createTokenDetailsOrder(),
                'token_publico' => $this->tokenPublic
            ],
            [],
            $isJsonRequest = true
        );
    }

    public function createOrder(Agendamiento $agendamiento){
        $agendamiento->load(['user.datosFacturacion','servicio']);
        $datosFacturacion = $agendamiento->user->datosFacturacion;
        return $this->makeRequest(
            'POST',
            'comercios/1.1/iniciar-transaccion',
            [],
            [
                "token" => $this->createToken($agendamiento),
                "public_key" => $this->tokenPublic,
                "monto_total" => 600000,
                "tipo_pedido" => "VENTA-COMERCIO",
                "fecha_maxima_pago" => $agendamiento->fecha_maxima_confirmacion->format('Y-m-d H:i:s'),
                "id_pedido_comercio" => $agendamiento->id,
                "descripcion_resumen" => $agendamiento->motivo,
                "comprador" =>[
                    "ruc" => $datosFacturacion->ruc,
                    "email" => $agendamiento->user->email,
                    "ciudad" => $datosFacturacion->ciudad,
                    "nombre" => $agendamiento->user->name,
                    "telefono" => $agendamiento->numero_telefono,
                    "direccion" => $datosFacturacion->direccion,
                    "documento" => $datosFacturacion->cedula,
                    "coordenadas" => "",
                    "razon_social" => $datosFacturacion->razon_social,
                    "tipo_documento" => "CI",
                    "direccion_referencia" => null,
                ],
                "compras_items" => [
                    [
                        "ciudad" => "1",
                        "nombre" => $agendamiento->servicio->titulo,
                        "cantidad" => 1,
                        "categoria" => "909",
                        "public_key" => $this->tokenPublic,
                        "url_imagen" => "https://www.dropbox.com/s/qbwtdgjbxc25jeq/aydxgTRL1M72MnXbnzcFoWocXz0Qp7CURYZIJm3x46Gh1jZry9.jpg?raw=1",
                        "descripcion" => $agendamiento->servicio->descripcion,
                        "id_producto" => $agendamiento->servicio_id,
                        "precio_total" => 600000,
                        "vendedor_telefono" => "",
                        "vendedor_direccion" => "",
                        "vendedor_direccion_referencia" => "",
                        "vendedor_direccion_coordenadas" => ""
                    ]
                ]
            ],
            [],
            $isJsonRequest = true
        );
    }

    public function handlePayment($order){
        $orderId = $order->resultado[0]->data;
        return redirect("https://www.pagopar.com/pagos/{$orderId}");
    }

    public function createTokenDetailsOrder(){
        return sha1($this->tokenPrivate."CONSULTA");
    }

    public function createToken(Agendamiento $agendamiento){
        return sha1($this->tokenPrivate.$agendamiento->id.strval(floatval("600000")));
    }

}