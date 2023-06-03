<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">    
    <title>Login PHP</title>
</head>
<body>
    <ul class="topnav">
        <li><a href="#pag">Pagina Inicial</a></li>
        <li><a href="#sobre">Sobre</a></li>
        <li><a href="#pag_video">Institucional</a></li>
    </ul>
        
    <div class="pagina1">
        <div class="pagina_login">
          <div class="login">
            <form action="dados_login.php" class="formulario" method="POST">
                <h1>LOGIN</h1>

                <div class="entrada">
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Seu melhor email" required>
                </div>

                <div class="entrada">
                    <label for="password"></label>
                    <input type="password" id="pass" name="pass" minlength="8" placeholder="Senha" required>
                </div>

                <a href="login_page.html" target="_blank">
                    <div class="link">Login</div>
                </a>

                <a href="esqpass.html">
                    <div class="link_acess">Nova senha</div>
                </a>
                <button type="submit" id="send" name="acao" value="Enviar">Enviar</button>
            </form> 
        </div>
    </div>
</div>
<script src="script2.js"></script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco_teste";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['pass'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    } else {

        $senha_HASH = hash('md5', $senha);
        echo "Senha criptografada: " . $senha_HASH;

        $sql = "SELECT * FROM cadastro WHERE email = '$email' and senha = '$senha_HASH' ";

        $resultado = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultado) == 1) {
            echo 'Email já existe no banco de dados e senha correta <br>';
        } else {
            echo 'Email não encontrado ou senha inválida';
        }
    }
}
?>

</body>
</html>