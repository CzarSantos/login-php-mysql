<?php
//instaciar classes
require_once 'classes/usuarios.php';
$u = new Usuario; //inicializar
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;700&display=swap" rel="stylesheet">

    <title>Novo Usuário</title>
</head>

<body>

    <div class="layout">
        <div class="container">
            <h3 class="titulo">moon<span class="color-two">tains</span>
            </h3>
            <p class="descricao">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

        </div>

        <div class="fundo2">
            <img src="img/undraw_C.svg" alt="">
        </div>

    </div>

    <div class="campo-cad">

        <img class="cad-img" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" />

        <span class="title">
            Novo Usuário
        </span>

        <form class="form-cad" method="POST">
            <div class="item-cad">

                <input type="text" name="nome" class="inputs-cad" placeholder="Nome Completo" maxlength="30">

                <input type="email" name="email" class="inputs-cad" placeholder="E-mail" maxlength="40">

                <input type="password" name="senha" class="inputs-cad" placeholder="Senha" maxlength="15">

                <input type="password" name="confSenha" class="inputs-cad" placeholder="Confirmar Senha" maxlength="30">

                <div id="check">
                    <input type="checkbox" id="scales" name="scales" checked>
                    <label for="scales">Concordo com os termos de uso</label>
                </div>

                <button class="entrar-cad">CADASTRAR</button>

            </div>

        </form>


        <?php

        //verificar se clicou no botão
        if (isset($_POST['nome'])) {
            //atribindo a variaveis | addslasshes: bloquei carateres maliciosos
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmarSenha = addslashes($_POST['confSenha']);

            //verificar se há campos vazios
            if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

                //acessar banco | verificar erro
                $u->conectar("projeto", "localhost", "root", "");

                if ($u->msgErro == "") //tudo ok
                {
                    //verificar senhas iguais
                    if ($senha == $confirmarSenha) {

                        if ($u->cadastrar($nome, $email, $senha)) //enviando pra metodo de cadastro
                        {
                            //se retornar verdadeiro
        ?>
                            <div id="msg-sucesso">
                                Cadastrado com Sucesso!
                            </div>
                        <?php

                        } else {

                        ?>
                            <div class="msg-erro">
                                Email já cadastrado!
                            </div>
                        <?php

                        }
                    } else {


                        ?>
                        <div class="msg-erro">
                            Senhas diferentes!
                        </div>
                    <?php


                    }
                } else {

                    ?>
                    <div class="msg-erro">
                        <?php echo "Erro: " . $u->msgErro; ?>
                    </div>
                <?php

                }
            } else {

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