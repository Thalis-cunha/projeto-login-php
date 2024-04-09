<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, rgba(67, 2, 2, 0.788), rgb(251, 3, 3));
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        div {
            width: flex;
            background-color: rgba(64, 61, 61, 0.064);
            padding: 55px;
            border-radius: 33px;
            margin: 30px;
        }

        h1 {
            color: rgb(239, 239, 243);
        }

        .botao {
            position: absolute;
            bottom: 20px; /* Distância do botão até o fundo */
            left: 50%; /* Centraliza o botão horizontalmente */
            transform: translateX(-50%); /* Centraliza o botão horizontalmente */
            padding: 20px 50px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div>
    <h1>Bem Vindo</h1>
    <h4>Esta Pagina Ainda Esta Em Desenvolvimento</h4>
    </div>
    <div>
    Bem Vindo a pg principal Usuario, <?php echo $_SESSION['nome']; ?>
    </div>

    <button id="voltar"class="botao">Voltar</button>

    <script>
        document.getElementById("voltar").addEventListener("click", function(event) {
        window.location.href = "http://localhost/trabalho/index.php";
    });
    </script>
    </body>
</html>    
