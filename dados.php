<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href = "style.css">
    <link rel = "icon" href="eco.png" sizes="16x16" type="image/png">
    <script src = "script.js" defer></script>

    <title>ECO</title>
</head>
<body>
    <ul class="topnav">
        <li><a href="#pag">Pagina Inicial</a></li>
        <li><a href="#sobre">Sobre</a></li>
        <li><a href="#pag_video">Institucional</a></li>
    </ul>

    <div id="loading">
        <img src="icons8-loading.gif">      
    </div>
    <a name = "pag">
        
    <div class="pagina1">
        <div class ="pagina_login">
          <div class ="login">
            <div class="blocoA">
                <h2>Bem-vindo,faça o cadastro e descubra seu impacto na natureza e ajude na preservação.</h2>
            </div>

            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                
                // variaveis de conxeão
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "banco_teste";
            
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["pass"];
                $cell = $_POST['telefone'];
                // conexão 
                $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            
            
                if(!$conn){
                    echo("Falha na conexão com o banco de dados: " . mysqli_connect_error());
                }
                
                // Consulta SQL
                $sql = "SELECT * FROM cadastro WHERE email = '$email'";
                
                $resultado = mysqli_query($conn, $sql); 
            
                if(mysqli_num_rows($resultado) == 1) {
                    echo "\n\nEmail já cadastrado no banco de dados";
                }else{
                    echo "\n\nEmail não existe no banco de dados \n\nCadastrando dados";
                
                    // Senha criptografada 
                    $senhaHASH = hash('md5',$senha);
                    $sql = "INSERT INTO cadastro (nome,senha,email,telefone) VALUES ('$nome','$senhaHASH','$email','$cell')";
                    if(mysqli_query($conn,$sql)){
                        echo("\n\n Dados cadastrados com sucesso");
                    }
                }
            
                mysqli_close($conn);        
            }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class ="formulario" method="POST">
                <h1>CADASTRO</h1>
                <h4>Acesse e contribua com a preservação da natureza</h4>
                <div class ="entrada">
                    <label for ="nome"></label>
                    <input type = "text" id ="nome" name ="nome" placeholder = "Nome" required>
                </div>
            
                <div class="entrada">
                    <label for="email"></label>
                    <input type = "email" id = "email" name = "email" placeholder = "Seu melhor email" required>
                </div>

                <div class = "entrada">
                    <label for = "celular"></label>
                    <input type = "text" id = "telefone" name = "telefone" minlenght = "8" placeholder ="Telefone" required>
                </div>
                
                <div class = "entrada">
                    <label for = "password"></label>
                    <input type = "password" id = "pass" name = "pass" minlenght = "8" placeholder ="Senha" required>
                </div>

                <a href ="login_page.html" target="_blank">
                    <div class="link">Login</div>
                </a>

                <a href="esqpass.html">
                    <div class="link_acess">Nova senha</div>
                </a>
                    <button type = "submit" id = "send" name = "acao" value ="Enviar">Enviar</button>
                </form> 
            </div>
        </div>
    </div>
    
    <a name = "sobre">
        <div class="bloco_texto">
            <h3>Bem-vindo ao nosso site dedicado às ONGs que trabalham incansavelmente para a preservação da natureza. Aqui, você encontrará uma lista de organizações comprometidas em conscientizar e promover ações em prol do meio ambiente. Nosso objetivo é fornecer informações úteis sobre essas ONGs e inspirar mais pessoas a se envolverem na preservação do nosso planeta. Junte-se a nós nessa importante missão! </h3>
        </div>
        <div class="bloco">
            <div class="carrossel">
            

            <div class="bloco_1"></div>

            <a href="https://www.tamar.org.br/">
                <div class="bloco_2"></div>
            </a> 
            
            <a href="https://www.gamba.org.br/instituicao/quem-somos">
                <div class="bloco_3"></div>
            </a>

            <a href="https://centrosabia.org.br/"> 
                <div class="bloco_4"></div>
            </a>


            <a href = "https://oceanica.org.br/">
                <div class="bloco_5"></div>

            </a>
            <a href="https://ispn.org.br/desmatamento-e-uma-politica-de-estado-na-bahia-aponta-estudo/">
                <div class="bloco_6"></div>
            </a>

            <a href="https://tonomapa.org.br/">
                <div class="bloco7"></div>
            </a>

            </div>
    </div></a>
        
    <button class="anterior"></button>
    <button class="proximo"></button>

    <a name = "pag_video">
    <div class="page_video">
        <div class="bloco_video">
            <video class="promo_video" controls>
                <source src = "video.mp4" preload="auto">
            </video>
        </div>
    </div></a>
        
    <button class="voltar" onclick="voltar()"></button>
    
</body>
</html>
