<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\UserGroup; // Asegúrate de importar el modelo UserGroup

class LoadUserPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userGroup = UserGroup::find($user->tipo_usuario);

            // Verifica si el grupo de usuarios existe
            if ($userGroup) {
                $permisosUsuario = $userGroup->permisos ? json_decode($userGroup->permisos, true) : [];
            } else {
                $permisosUsuario = [];
            }

            // Compartir permisos con todas las vistas
            View::share('permisosUsuario', $permisosUsuario);
        }

        return $next($request);
    }
}
