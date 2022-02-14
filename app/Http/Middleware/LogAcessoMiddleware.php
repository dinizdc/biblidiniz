<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request);
        $navegador = $request->server->get('HTTP_USER_AGENT');
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        $log = "O ip: $ip, tentou acessar a rota: $rota ----> através de: $navegador!";
        LogAcesso::create(['log'=>$log]);

        $teste = $next($request);
        return $next($request);
        // dd($teste);
        // return Response($teste);
        
    }
}
