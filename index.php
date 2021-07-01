<?php
//instaciar classes
require_once 'classes/usuarios.php';
$u = new Usuario; //inicializar
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;700&display=swap" rel="stylesheet">

    <title>Login</title>

</head>

<body>

    <div class="layout">
        <div class="container">
            <h3 class="titulo">moon<span class="color-two">tains</span>
            </h3>
            <p class="descricao">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

        </div>

        <div class="fundo">
            <img src="img/undraw.svg" alt="">
        </div>

    </div>

    <div class="campo" id="ativar">

        <img class="login-img" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" />

        <span class="title">
            Sing In
        </span>

        <form class="form" method="POST">
            <input type="email" name="email" class="inputs" placeholder="E-mail">
            <input type="password" name="senha" class="inputs" placeholder="Senha">
            <button class="entrar">SING IN</button>
            <a class="cad" href="cadastro.php">Ainda não é inscrito? <strong>Cadastre-se</strong></a>
        </form>




        <?php

        //verificar se clicou no botão
        if (isset($_POST['email'])) {
            //atribindo a variaveis | addslasshes: bloquei carateres maliciosos
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            //verificar se há campos vazios
            if (!empty($email) && !empty($senha)) {

                //conexão BD
                $u->conectar("projeto", "localhost", "root", "");
                //se não conectar com o BD
                if ($u->msgErro == "") //tudo ok
                {

                    //envia dados para o metodo logar na classe Usuarios
                    if ($u->logar($email, $senha)) {
                        session_start();
                        //se true | Acessa Sistema
                        header("location: areaPrivada.php");
                    } else {
                        //se false

        ?>
                        <div class="msg-erro">
                            Email e/ou senha incorretos!
                        </div>
                    <?php

                    }
                } else {
                    //se erro exibe msg
                    ?>
                    <div class="msg-erro">
                        <?php echo "Erro: " . $u->msgErro; ?>
                    </div>
                <?php

                }
            } else {
                //se vazio
                ?>
                <div class="msg-erro">
                    Preencha todos os campos!
                </div>
        <?php

            }
        }
        ?>


    </div>
</body>

</html>