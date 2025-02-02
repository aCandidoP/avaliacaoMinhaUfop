<?php

    require "../src/conexao-bd.php";

    require "../src/model/Avaliacao.php";
    require "../src/repository/AvaliacaoRepository.php";
    $avaliacaoRepository = new AvaliacaoRepository($pdo);
    $avaliacao = $avaliacaoRepository->buscarFormatado();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
        defer
    ></script>
    <link rel="stylesheet" href="../styles/style.css" />

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Histórico de comentários:</title>
</head>

<body>

    <h2>Comentários postados: </h2>

    <div class="container d-flex" id="labelstablesavaliacoes">
        <div class="row w-100 d-flex justify-content-center my-5">
            <div class="col-md d-flex justify-content-center">
                <table class="table table-success table-striped">

                    <thead>
                        <tr>
                            <th scope="col">Usuário</th>
                            <th scope="col">Serviço Avaliado</th>
                            <th scope="col">Avaliação</th>
                            <th scope="col">Comentário</th>
                            <th scope="col">Data/Hora</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($avaliacao as $avaliacoes): ?>
                            <tr>
                                <td> <?= $avaliacoes->getNomeUsuario() ?> </td>
                                <td> <?= $avaliacoes->getServicoAvaliado() ?> </td>
                                <td id="tableStar"> <?= $avaliacoes->getNumeroEstrelas() ?> </td>
                                <td> <?= $avaliacoes->getComentario() ?> </td>
                                <td> <?= $avaliacoes->getDataHora() ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="container d-flex" id="labelsBackHome">
        <div class="row w-100 d-flex justify-content-center my-5">
            <div class="col-md-3 text-center">
                <form action="http://localhost:8080/" method="post">
                    <input type="submit" class="botao-home" value="Voltar"/>
                </form>
            </div>
        </div>
    </div>

</body>

</html>