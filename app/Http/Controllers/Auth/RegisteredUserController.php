<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PasswordResetController;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $tipoDocumentos = \App\Models\TipoDocumento::all();
        return view('auth.register', compact('tipoDocumentos'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'tipo_documento' => 'required|integer|exists:tipo_documento,id',
            'numero_documento' => 'required|digits:10',
            'numero_telefonico' => 'required|digits:10',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'apellido' => $request->apellido,
                'tipo_documento' => $request->tipo_documento,
                'numero_documento' => $request->numero_documento,
                'numero_telefonico' => $request->numero_telefonico,
                'email' => $request->email,
                'tipo_usuario' => '2',
            ]);

            // Enviar el correo para la creación de contraseña
            $passwordResetController = new PasswordResetController();
            $passwordResetController->sendResetLinkEmail($request);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al registrar el usuario: ' . $e->getMessage());
        }

        // Mostrar mensaje de éxito
        return redirect()->route('register')->with('success', 'Registro exitoso. Se ha enviado un correo para crear tu contraseña.');
    }
}
