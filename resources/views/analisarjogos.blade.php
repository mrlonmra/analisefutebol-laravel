<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatísticas da Equipe</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .logo-equipe {
            max-width: 100px;
            height: auto;
        }

        .logo-liga {
            max-width: 150px;
            height: auto;
        }

        /* Adicione mais estilos conforme necessário */
    </style>
</head>

<body>
    
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h1>Estatísticas</h1>
            <img class="mb-4 logo-equipe" src="{{ $dados['response']['team']['logo'] }}" alt="Logo da Equipe">
            <p><strong>Time:</strong> {{ $dados['response']['team']['name'] }}</p>
            <p><strong>Liga:</strong> {{ $dados['response']['league']['name'] }}</p>
            <p><strong>País:</strong> {{ $dados['response']['league']['country'] }}</p>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-header">Forma da Equipe</div>
                    <div class="card-body">
                        <p class="card-text">{{ $ultimosJogosFormatado }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-header">Partidas da Equipe</div>
                    <div class="card-body">
                        <p>Jogadas: {{ $dados['response']['fixtures']['played']['total'] }}</p>
                        <p>Vitórias: {{ $dados['response']['fixtures']['wins']['total'] }}</p>
                        <p>Empates: {{ $dados['response']['fixtures']['draws']['total'] }}</p>
                        <p>Derrotas: {{ $dados['response']['fixtures']['loses']['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-header">Gols</div>
                    <div class="card-body">
                        <p>Gols Marcados: {{ $dados['response']['goals']['for']['total']['total'] }}</p>
                        <p>Gols Sofridos: {{ $dados['response']['goals']['against']['total']['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-header">Maior Sequência</div>
                    <div class="card-body">
                        <p>Vitórias: {{ $dados['response']['biggest']['streak']['wins'] }}</p>
                        <p>Empates: {{ $dados['response']['biggest']['streak']['draws'] }}</p>
                        <p>Derrotas: {{ $dados['response']['biggest']['streak']['loses'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-header">Jogos Sem Sofrer Gols</div>
                    <div class="card-body">
                        <p>Casa: {{ $dados['response']['clean_sheet']['home'] }}</p>
                        <p>Fora: {{ $dados['response']['clean_sheet']['away'] }}</p>
                        <p>Total: {{ $dados['response']['clean_sheet']['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-header">Jogos Sem Marcar Gols</div>
                    <div class="card-body">
                        <p>Casa: {{ $dados['response']['failed_to_score']['home'] }}</p>
                        <p>Fora: {{ $dados['response']['failed_to_score']['away'] }}</p>
                        <p>Total: {{ $dados['response']['failed_to_score']['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-header">Pênaltis</div>
                    <div class="card-body">
                        <p>Marcados: {{ $dados['response']['penalty']['scored']['total'] }}</p>
                        <p>Perdidos: {{ $dados['response']['penalty']['missed']['total'] }}</p>
                        <p>Total: {{ $dados['response']['penalty']['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-header">Escalações</div>
                    <div class="card-body">
                        @foreach ($dados['response']['lineups'] as $escalacao)
                        <p>Formação: {{ $escalacao['formation'] }} - Jogados: {{ $escalacao['played'] }}</p>
                        @endforeach
                    </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.5.0/js/bootstrap.min.js"></script>

</body>

</html>