<?php
// Inclua o arquivo de conexão
include('conexao.php');

// Verifique se o formulário foi enviado
if(isset($_POST['nome']) && isset($_POST['senha'])){

    // Verifica se o campo login-nome não está vazio
    if(strlen($_POST['nome']) == 0){
        echo "Preencha seu Nome";
    }
    // Verifica se o campo senha não está vazio
    elseif(strlen($_POST['senha']) == 0){
        echo "Preencha sua senha";
    }

    else{
        // Obtém o login-nome e a senha do formulário
        $nome = $conexao->real_escape_string($_POST['nome']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        // Consulta SQL para verificar se o usuário existe no banco de dados
        $sql_code = "SELECT * FROM clientes WHERE nome = '$nome' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        $quantidade = $sql_query->num_rows;  

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            // Inicia a sessão
            session_start();

            // Define as variáveis de sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            // Redireciona para a página de perfil
            header("location: perfil.php");
            exit; // Termina o script para evitar que o restante do código seja executado
        } 
        else{
            echo "Falha ao logar";
        }   
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    </style>
</head>
<body>   
    <form action="" method="post">
        <div>
            <label for="nome">nome:</label><br>
            <input type="text" id="nome" name="nome" placeholder="nome" required>
            <br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" placeholder="senha" required>
            <br><br>
            <button type="submit">Entrar</button>
            <button id="cadastrar">Cadastrar</button>
            
        </div>
    </form>
    <script>
    document.getElementById("cadastrar").addEventListener("click", function(event) {
        window.location.href = "http://localhost/trabalho/formulario.php";
});
document.getElementById("formulario").addEventListener("submit", function(event) {
        var form = document.getElementById("formulario");
        if (!form.checkValidity()) {
            event.preventDefault();
            alert("Por favor, preencha todos os campos obrigatórios.");
        } 
    
    });
   </script>
</body>
</html>
