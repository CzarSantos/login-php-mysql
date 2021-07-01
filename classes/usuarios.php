<?php
/* Classes para funcionamento | PDO*/


class Usuario
{
    //variavel global visivel em por todos da classe
    private $pdo;
    //varivel publica iniciada com vazio
    public $msgErro = "";


    //MÉTODO - conexão com banco
    public function conectar($nome, $host, $usuario, $senha)
    {
        //chama variavel
        global $pdo;

        try {
            //inicialização PDO com parametros de conexão
            $pdo = new PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha);
        } catch (PDOException $e) {
            //guardando erro na variavel
            $msgErro = $e->getMessage();
        }
    }



    //MÈTODO - cadastro
    public function cadastrar($nome, $email, $senha)
    {
        global $pdo;

        //verificar se existe email cadastrado

        //comando sql dentro do PDO | Objetivo: Verificar se é retornado um ID
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios 
        WHERE email = :e");
        //substituir info | valor é substituido pelo email enviado
        $sql->bindValue(":e", $email);
        //execução
        $sql->execute();
        //verificar | Função conta linhas q vieram do BD | Sse linha maior q 0
        if ($sql->rowCount() > 0) {
            return false; //já cadastrada
        } else {
            //caso não cadastrada
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, 
            email, senha) VALUES (:n, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha)); //criptografia da senha com md5

            //executar inserção
            $sql->execute();
            return true;
        }
    }

    //MÉTODO - logar
    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se o emal e senha estão cadastrados
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE
            email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        //se teve retorno do id
        if ($sql->rowCount() > 0) {
            //entrar no sistema
            $dado = $sql->fetch(); //transforma BD em array
            session_start(); //inicializa seção
            $_SESSION['id_usuario'] = $dado['id_usuario']; //grava id na sessao
            return true; //cadastrado com sucesso
        } else {
            return false; //nao é possivel login

        }
    }
} 

/*     //MÉTODO - logar
    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE
     email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            //entrar no sistema (sessao)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //cadastrado com sucesso
        } else {
            return false; //nao foi possivel logar
        }
    }
}


 */
