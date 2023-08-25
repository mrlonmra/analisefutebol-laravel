<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function autenticarUsuario(Request $request): RedirectResponse {
        
        $credenciais = $request->validate ([

            'email'=>['required', 'email'],
            'password'=>['required'], [
            'email.required' => 'O campo e-mail é obrigatório!',
            'email.email' => 'Digite um e-mail válido.',
            'password.required' => 'O campo senha é obrigatório!']

        ]);

        if (Auth::attempt($credenciais)) {

            $request->session()->regenerate();
 
            return redirect()->intended('/api/usuarios');
            
        } else {

            return redirect()->back()->with('erro', 'E-mail ou Senha Inválido.');

        }
    }
}
