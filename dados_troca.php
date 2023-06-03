<?php
    // variaveis de conxeão
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banco_teste";

    // conexão 
    $conn = new mysqli($servername, $username, $password, $dbname);

    $email = $_POST["email"];
    $senha = $_POST["pass"];

    // Código SQL 
    $sql = "INSERT INTO TrocaSenha (email,nova_senha) VALUES ('$email','$senha')";

    // Teste de conexão do banco de dados
    if(!($conn -> connect_error) and ($conn ->query($sql) === TRUE)){
        echo("Conexão com o banco de dados efetuada");
    }else{
        echo("Erro de acesso: ".$conn->connect_error);
    }
    
    http_response_code(200);
    
    $conn ->close();

?>
