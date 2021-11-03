<?php 
    include("../../conexao.php");
    $id = $_GET['id'];
    echo $id;
    try{
        $sql = $conexao->prepare("DELETE FROM tb_tarefas WHERE id_tarefa = :id");
        $sql->bindValue(':id',$id, PDO::PARAM_INT);
        $sql->execute();
        header('Location: ../../paginas/minhas_tarefas.php');

    }catch(PDOException $e){
        
    }
?>