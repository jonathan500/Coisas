<?php
session_start();
$_SESSION['sair'] = "sair";
header('Location: ../paginas/minhas_tarefas.php');
?>