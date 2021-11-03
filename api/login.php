<?php
include("../conexao.php");
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql = $conexao->prepare("SELECT * FROM tb_usuario WHERE email_usuario = :email AND senha_usuario = :senha");
$sql->bindValue(':email',$email, PDO::PARAM_STR);
$sql->bindValue(':senha',$senha, PDO::PARAM_STR);
$sql->execute();
$pesquisa = $sql->fetch(PDO::PARAM_STR);
$_SESSION['nome'] = $pesquisa['nome_usuario'];
if(empty($_SESSION['nome'])){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['nome']);
    header('Location: ../paginas/login.php');
    
}else{
    $_SESSION['email']=$email;
    $_SESSION['senha']=$senha;
    $_SESSION['nome']=$pesquisa['nome_usuario'];
    $_SESSION['sair'] = "entrar";
    header('Location: ../paginas/minhas_tarefas.php');
}

?>
