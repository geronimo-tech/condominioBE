<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Verificar si el usuario está autenticado
        if (!$request->user()) {
            return response()->json([
                'message' => 'No autenticado'
            ], 401);
        }

        // Verificar si tiene el rol requerido
        if (!$request->user()->hasRole($role)) {
            return response()->json([
                'message' => 'No autorizado'
            ], 403);
        }

        return $next($request);
    }
}