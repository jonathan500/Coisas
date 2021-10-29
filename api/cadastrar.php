<?php
include("../conexao.php");
session_start();
unset($_SESSION['erro']);
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$idade= $_POST['idade'];
try{
    $sql = $conexao->prepare("INSERT INTO tb_usuario(nome_usuario, senha_usuario, idade_usuario, email_usuario, sexo_usuario) VALUES
    (:nome, :senha, :idade, :email, :sexo)");
    $sql->bindValue(':email',$email, PDO::PARAM_STR);
    $sql->bindValue(':idade',$idade, PDO::PARAM_INT);
    $sql->bindValue(':senha',$senha, PDO::PARAM_STR);
    $sql->bindValue(':nome',$nome, PDO::PARAM_STR);
    $sql->bindValue(':sexo',$sexo, PDO::PARAM_STR);
    $sql->execute();
    $pesquisa = $sql->fetch(PDO::PARAM_STR);
    if(empty($pesquisa)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../paginas/login.php');
        
    }else{
        $_SESSION['email']=$email;
        $_SESSION['senha']=$senha;
        header('Location: login.php');
    }
}catch(PDOException $e){
    $_SESSION['erro'] = "E-mail já utilizado por outra pessoa!";
    header('Location: ../paginas/cadastro.php');
}
//
?>