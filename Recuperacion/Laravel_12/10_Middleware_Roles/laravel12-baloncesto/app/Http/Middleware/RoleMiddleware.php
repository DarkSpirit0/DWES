<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            abort(403, 'No autenticado.');
        }

        $user = Auth::user();

        if (!$user->role) {
            abort(403, 'Usuario sin rol asignado.');
        }

        // Convertimos el rol del usuario y los roles permitidos a minúsculas para evitar problemas de mayúsculas/minúsculas
        $userRole = strtolower($user->role->name);
        $allowedRoles = array_map('strtolower', $roles);

        if (!in_array($userRole, $allowedRoles)) {
            abort(403, 'No autorizado.');
        }

        return $next($request);
    }

}

/*
public function handle(Request $request, Closure $next, ...$roles): Response
{
    // Verifica si el usuario está autenticado
    if (!Auth::check()) {
        dd('No está autenticado');
    }

    $user = Auth::user();

    // Verifica que el usuario tenga asignado un rol (relación)
    if (!$user->role) {
        dd('Usuario sin rol asignado');
    }

    // Muestra el rol actual del usuario y los roles permitidos
    dd([
        'rol_usuario' => $user->role->name,
        'roles_permitidos' => $roles,
        'resultado_in_array' => in_array($user->role->name, $roles)
    ]);

    // Si todo bien, sigue con la petición
    return $next($request);
}
*/
