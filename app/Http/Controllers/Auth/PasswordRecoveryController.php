<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class PasswordRecoveryController extends Controller
{

    public function enviarCodigo(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $usuario = User::where('email',$request->email)->first();

        if(!$usuario){
            return response()->json([
                'mensaje'=>'Usuario no encontrado'
            ],404);
        }

        $codigo = rand(100000,999999);

        $usuario->codigo_recuperacion = $codigo;
        $usuario->codigo_expira = now()->addMinutes(10);
        $usuario->save();

        Mail::raw("Tu código de recuperación es: $codigo", function ($message) use ($usuario) {
            $message->to($usuario->email)
                    ->subject('Recuperación de contraseña');
        });

        return response()->json([
            'mensaje'=>'Código enviado al correo'
        ]);
    }

    public function verificarCodigo(Request $request)
    {

        $usuario = User::where('email',$request->email)->first();

        if(!$usuario){
            return response()->json(['mensaje'=>'Usuario no encontrado'],404);
        }

        if($usuario->codigo_recuperacion != $request->codigo){
            return response()->json(['mensaje'=>'Código incorrecto'],400);
        }

        if(now()->greaterThan($usuario->codigo_expira)){
            return response()->json(['mensaje'=>'Código expirado'],400);
        }

        return response()->json([
            'mensaje'=>'Código válido'
        ]);
    }

    public function cambiarPassword(Request $request)
    {

        $usuario = User::where('email',$request->email)->first();

        $usuario->password = Hash::make($request->password);
        $usuario->codigo_recuperacion = null;
        $usuario->codigo_expira = null;

        $usuario->save();

        return response()->json([
            'mensaje'=>'Contraseña actualizada'
        ]);
    }

}