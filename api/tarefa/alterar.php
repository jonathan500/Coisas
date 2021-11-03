<?php
    include("../../conexao.php");
    
    session_start();
    if(empty($_SESSION['nome'])){
        unset($_SESSION);
        header('Location: login.php');
    }else if(isset($_SESSION['sair'])){
        if($_SESSION['sair'] == "sair"){
            unset($_SESSION);
            header('Location: login.php');
        }else{
            if(isset($_POST['alterar'])){
                $nome = $_POST['nomet'];
                $descricao = $_POST['desct'];
                $data = $_POST['datat'];
                $urgencia = $_POST['urgencia'];
                if($urgencia != "sim"){
                    $urgencia="não";
                }
                $sql = $conexao->prepare("UPDATE tb_tarefas 
                SET 
                nome_tarefa = :nome,  
                descricao_tarefa = :desct, 
                dataEntrega_tarefa = :datae, 
                urgencia_tarefa = :urgencia
                WHERE
                id_tarefa = :id");

                $sql->bindValue(':nome',$nome, PDO::PARAM_STR);
                $sql->bindValue(':desct',$descricao, PDO::PARAM_STR);
                $sql->bindValue(':datae',$data, PDO::PARAM_STR);
                $sql->bindValue(':urgencia',$urgencia, PDO::PARAM_STR);
                $sql->bindValue(':id',$_SESSION['idtarefa'], PDO::PARAM_INT);
                $sql->execute();
                $pesquisa = $sql->fetch(PDO::PARAM_STR);
                header('Location: ../../paginas/minhas_tarefas.php');
            }else{
                $id = $_GET['id'];
                $_SESSION['idtarefa'] = $id;
            }
        }
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../../css/estilo.css" rel="stylesheet" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            
            body{
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                background-image: linear-gradient(45deg, #e66465, #9198e5);
            }
            .meio{
                background-color: black;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 80px;
                border-radius: 15px;
                color: white;
            }
            input{
                padding: 15px;
                border: none;
                outline: none;
                
            }
            .cem{
                width:85%;
            }
            button{
                background-color: #e66465;
                border: none;
                padding: 10px;
                width: 100%;
            }
            button:hover{
                background-color: #9198e5;
            }
        </style>
        <title>MinhasTarefas</title>
    </head>
    <body>
        <div class="meio" >
            <form action="alterar.php" method="POST" align="center" enctype="multipart/form-data">
                <h1>Alterar Tarefa</h1>
                <div>
                    <input class="cem" type="text" name="nomet" id="nomet" placeholder="Nome da Tarefa" required><br><br>
                </div>
                <div>
                    <input class="cem" type="textarea" name="desct" id="desct" placeholder="Descrição da Tarefa" ><br><br>
                </div>
                <div>
                    <input class="cem" type="date" name="datat" id="datat" placeholder="Data de entrega" required><br><br>
                </div>
                <div class="cem">
                    <input type="checkbox" name="urgencia" value="sim"> Este trabalho é urgente<br><br>
                </div>
                    <button type="submit" name="alterar" value="alterar">Alterar</button><br><br>
            </form>
            <a href="../../paginas/minhas_tarefas.php"><button name="voltar" value="voltar">Voltar</button></a>
        </div>
    </body>
    </html>