<?php
// campos do db, login, senha, nome

require_once "conexao.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO clientes (nome, senha, email) VALUES ('$nome', '$senha', '$email')";

    if ($conexao->query($sql) === TRUE) {
        echo "Registro inserido com sucesso";
        // Redireciona para a página desejada após a inserção bem-sucedida
        header("Location: index.php");
    } else {
        echo "Erro ao inserir no registro de dados: " . $conexao->error;
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, rgba(67, 2, 2, 0.788), rgb(251, 3, 3));
        }

        legend {
            border: rgb(0, 0, 0) solid 2px;
            padding: 11px; /* Adicionar um pouco de espaço interno */
            border-radius: 55px; 
            text-align: center;
        }

        h4 {
            text-align: center;
        }

        fieldset {
            border: rgb(0, 0, 0) 3px solid;
            padding: 25px; /* Adicionar um pouco de espaço interno */
            border-radius: 33px;
        }

        .box {
            margin: 0; /* Remover margens padrão do corpo */
            height: 100vh; /* Definir altura do corpo para 100% da altura da viewport */
            display: flex; /* Usar flexbox para centralizar verticalmente */
            justify-content: center; /* Centralizar horizontalmente */
            align-items: center; /* Centralizar verticalmente */
            border-radius: 30px;
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="box">
        <form id="formulario" action="" method="post">
            <fieldset>
                <legend><b><h1>formulario de cadastro</h1></b></legend>
                
                <div class="inputbox">
                    <input type="text" name="nome" id="nome" required>
                    <label for="nome">Nome Para Login</label>
                
                <br><br>
                
                    <input type="password" name="senha" id="senha" required>
                    <label for="senha">Senha</label>
               
                <p><h4>Sexo</h4></p>
               
                    <input type="radio" id="feminino" name="genero" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <input type="radio" id="masculino" name="genero" value="masculino" required>
                    <label for="masculino">Masculino</label>
               
                <br></br>
                
                    <input type="date" name="data" id="data" required>
                    <label for="data">Data de nascimento</label>
               
                <br><br>
                
                    
                    <input type="email" id="email" name="email" required>
                    <label for="email">Email</label>
                    </div>


                <br><br>
                <input type="submit" id="submit" name="submit" value="Cadastar">
                <button id="voltar">Voltar</button>
                
            </fieldset>
            
        </form>
        
    </div>

    <script>
document.getElementById("formulario").addEventListener("submit", function(event) {
    var form = document.getElementById("formulario");
    if (!form.checkValidity()) {
        event.preventDefault();
        alert("Por favor, preencha todos os campos obrigatórios.");
    } else {
        var nome = document.getElementById("nome").value;
        document.getElementById("nome").value = nome;
    }
});


document.getElementById("voltar").addEventListener("click", function(event) {
        window.location.href = "http://localhost/trabalho/index.php";
    });
</script> 
    
</body>
</html>
