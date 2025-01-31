<?php
    require "src/conexao-bd.php";

    require "src/model/Servicos.php";
    require "src/repository/ServicosRepository.php";
    $servicosRepository = new ServicosRepository($pdo);
    $servicos = $servicosRepository->buscarTodos();


    require "src/model/Usuarios.php";
    require "src/repository/UsuariosRepository.php";
    $usuariosRepository = new UsuariosRepository($pdo);
    $usuarios = $usuariosRepository->buscarTodos();


    require "src/model/Avaliacoes.php";
    require "src/repository/AvaliacoesRepository.php";        
    if(isset($_POST['enviar'])){
        if(empty($_POST['selectservico'] && $_POST['selectnome'])){ 
            echo  "<script>alert('Escolha um serviço e um usuario!');</script>";
        }else{
            $avaliacoes = new Avaliacoes(
                $_POST['selectservico'],
                $_POST['selectnome'],
                $_POST['numStar'],
                $_POST['comentario'],
                date("d/m/Y H:i:s")
            );
            $avaliacoesRepository = new AvaliacoesRepository($pdo);
            $avaliacoesRepository->salvar($avaliacoes);  
        }
        
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous" defer></script>
<link rel="stylesheet" href="styles/style.css">
<script src="js/script.js" defer></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação Minha Ufop</title>
</head>
<body>
    <form action="" method="POST">
        <div class="container d-flex" id="labels">
            <div class="row w-100 d-flex justify-content-center my-5">
                <div class="col-md-3 my-2">
                <select class="form-select" aria-label="Default select example" name="selectservico">
                        <option selected disabled>Escolha um Serviço</option>
                        <?php foreach ($servicos as $servico): ?>
                            <option id="optionselectservico"> <?= $servico->getServicoMinhaUfop() ?> </option>
                        <?php endforeach; ?>
                      </select>
                </div>
                <div class="col-md-3 my-2">
                <select class="form-select" aria-label="Default select example" name="selectnome" id="nomeusuariojs">
                        <option value="---" selected disabled>Usuário</option>
                        <?php foreach ($usuarios as $usuario): ?>
                            <option id="optionselectnome" title="<?= $usuario->getEmail() ?>"> <?= $usuario->getNome() ?> </option>
                        <?php endforeach; ?>
                      </select>
                </div>
                <div class="col-md-3 my-2 text-center">
                    <select class="form-select" aria-label="Default select example" name="selectemail">
                        <option id="emailusuariojs" selected>---</option>
                    </select>
                </div>
            </div>
        </div>
    
        <div class="container d-flex" id="labelsStars">
            <div class="row w-100 d-flex justify-content-center my-5">
                <div class="col-md-3 text-center">
                    <label for="fiveStar" class="">Avalie o serviço: </label>
                   
                        <div class="fiveStars">
                            <label class="star ativo" data-avaliacao="1">
                            <input class="hiddenRadio" type="radio" name="numStar" value="1">              
                            </label>
                            <label class="star" data-avaliacao="2">
                            <input class="hiddenRadio" type="radio" name="numStar" value="2">
                            </label>
                            <label class="star" data-avaliacao="3">
                            <input class="hiddenRadio" type="radio" name="numStar" value="3">
                            </label>
                            <label class="star" data-avaliacao="4">
                            <input class="hiddenRadio" type="radio" name="numStar" value="4">
                            </label>
                            <label class="star" data-avaliacao="5">
                            <input class="hiddenRadio" type="radio" name="numStar" value="5">
                            </label>
                        </div>
                        <p id="avaliacao-descritiva" class="text-center mt-1"></p>
    
                </div>
            </div>
        </div>
    
        <div class="container d-flex" id="labelsComments">
            <div class="row w-100 d-flex justify-content-center my-5">
                <div class="col-md-3">
                    <div class="form-floating">
                        <textarea class="form-control" disabled id="floatingTextarea" maxlength="200" name="comentario"></textarea>
                        <label for="floatingTextarea">Escreva um comentário</label>
                    </div>
                    <div id="countercss">
                        <span> Você digitou </span><span id="contador">0</span><span> de </span><span id="tamtext">0</span><span> caracteres.</span>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container d-flex mt-4">
            <div class="row w-100 justify-content-center mb-5">
                <div class="col-md-3 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" id="buttonSubmit" name="enviar" value="Enviar Avaliação">
                </div>
            </div>
        </div>
    </form>

    <div class="container d-flex" id="labelsView">
        <div class="row w-100 d-flex justify-content-center my-5">
            <div class="col-md-3 text-center">
                <form action="view.php" method="post">
                    <input type="submit" class="botao-view" value="Ver avaliações"/>
                </form>
            </div>
        </div>
    </div>    

</body>
</html>