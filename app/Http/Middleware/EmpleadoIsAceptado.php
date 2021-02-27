<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class EmpleadoIsAceptado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $empleado = Auth::guard('empleados')->user();
        if(!$empleado->isAceptado()){
            $request->session()->invalidate();
            return redirect()
                            ->route('admin.login')
                            ->with([
                                'noAceptado' => "Usted no esta aceptado para iniciar session"
                            ]);
        }
        return $next($request);
    }
}
