<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class statisticasController extends Controller
{
    public function index()
    {

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'api-football-v1.p.rapidapi.com',
            'X-RapidAPI-Key' => '16f29405a4msh8f6b180b284446fp1fe3fcjsnf0d8ebda33fe',
        ])->get('https://api-football-v1.p.rapidapi.com/v3/teams/statistics?league=71&season=2022&team=126');

        $dados = $response->json();

        // Código que formata a forma da equipe
        $mapeamento = [
            'L' => 'Derrota',
            'W' => 'Vitória',
            'D' => 'Empate',
        ];

        $ultimosJogos = $dados['response']['form'];
        $ultimosJogosFormatado = '';
        foreach (str_split($ultimosJogos) as $resultado) {
            switch ($resultado) {
                case 'L':
                    $ultimosJogosFormatado .= $mapeamento[$resultado] . ' ';
                    break;
                case 'W':
                    $ultimosJogosFormatado .= $mapeamento[$resultado] . ' ';
                    break;
                default:
                    $ultimosJogosFormatado .= $mapeamento[$resultado] . ' ';
                    break;
            }
        }

        return view('analisarjogos', ['dados' => $dados, 'ultimosJogosFormatado' => $ultimosJogosFormatado]);
    }
}
