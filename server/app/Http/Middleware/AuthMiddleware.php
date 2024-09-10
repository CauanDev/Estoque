<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifique se o cabeçalho "X-Auth-Token" está presente
        $authHeader = $request->header('Authorization');

        // Se o cabeçalho não estiver presente ou não for válido
        if (is_null($authHeader) || $authHeader !== env('API_KEY')) {
            // Retorne uma resposta de erro
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Continue para o próximo middleware ou para a rota
        return $next($request);
    }
}
