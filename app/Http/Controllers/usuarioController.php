<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class usuarioController extends Controller
{
    public function indexUsuario() {
        
        // captura todos os usuarios e salva na string $usuarios
        $usuarios = Usuario::all();
        
        //retorna os usuarios em tela no formato json
        return response()->json($usuarios, 200, [], JSON_PRETTY_PRINT);
    }
    
    public function gravarUsuario(Request $requisicao) {

        //aqui esta os input qe irao chegar na requisicao
        $requisicao->validate([
            'nome'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        //capturo a senha e salvo na string $senha
        $password = $requisicao->input('password');

        //transforma a senha em md5 e salvando em $senhaprotegida
        $passwordprotegido = Hash::make($password);

        //realiza um merge para proteger a senha 
        $requisicao->merge(['password' => $passwordprotegido]);

        //se passar em todas validações cria o usuario
        $usuario = Usuario::create($requisicao->all());

        //se criar o usuario retorna uma mensagem no formato json
        return response()->json($usuario, 201);
    }

    public function showUsuario($id) {

        //captura o id do usuario e salva em usuarioID
        $usuarioID = Usuario::findOrFail($id);

        //responde com o usuario solicitado na requisicao
        return response ()->json($usuarioID, 200, [], JSON_PRETTY_PRINT);
    }

    public function deleteUsuario($id){
        try {
        //captura o usuario id e salva em $usuario
        $usuario = Usuario::findOrFail($id);

        //deleta o usuario especificado no ID
        $usuario->delete();
        
        //responde em json com a informação que foi um sucesso
        return response ()->json('Usuário Excluido com sucesso.', 200);
        } 
        catch (ModelNotFoundException $e) {

            //se o usuário não for excluido retorna um erro 
            return response ()->json('Usuário não encontrado.', 404);
        }
        catch (\Exception $e) {

            //se não se encaixar nos erros acima retorna 500
            return response()->json('Erro ao Excluir o Usuário.', 500);
        }
    }
}