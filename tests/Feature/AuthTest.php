<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Usuario;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_authenticate_with_valid_credentials()
    {
        // Criar um usuário para testar
        $user = Usuario::create([
            'nome' => 'John Doe',
            'email' => 'johndoe@example.com',
            'senha' => bcrypt('password'),
        ]);

        // Tentar autenticar com as credenciais corretas
        $response = $this->post('/usuario/auth', [
            'email' => 'johndoe@example.com',
            'password' => 'password',
        ]);

        // A autenticação deve ser bem-sucedida e redirecionar para a página inicial
        $response->assertRedirect('/api/usuarios');
    }
}
