<?php

$usuario = "root";   // Substitua pelo seu usuário do MySQL
$senha = "";   // Substitua pela sua senha do MySQL
$host = 'localhost'; 
$base = "meudb";   // Substitua pelo nome do seu banco de dados

// Criar conexão
$conexao = new mysqli($host, $usuario, $senha, $base);

// Verificar conexão
if ($conexao->connect_error) {
   die("Conexão falhou: " . $conexao->connect_error); 
} else {
   echo "Conectado";
}

?>