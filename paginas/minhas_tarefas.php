<?php
    session_start();
    if(empty($_SESSION['nome'])){
        unset($_SESSION);
        header('Location: login.php');
    }else if(isset($_SESSION['sair'])){
        if($_SESSION['sair'] == "sair"){
            unset($_SESSION);
            header('Location: login.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MinhasTarefas</title>
</head>
<body>
    <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-image: linear-gradient(45deg, #e66465, #9198e5);
            
        }
        .barraNav{
            background-color: black;
            width: 100%;
            height: 40px;
            position: absolute;
            
        }
        button{
            background-color: #e66465;
            border: none;
            padding: 10px;
            width: 100%;
            float: left;
        }
        button:hover{
            background-color: #9198e5;
        }
        .listar{
            background-color: white;
            border-radius: 15px;
            padding: 1%;
            color: black;
            width: 70%;
        }

        .meio{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </style>
        
        <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">MinhasTarefas</span>
            <a href="cadastrot.php"><button name="cadastrart" value="cadastrart">Cadastrar</button></a>
            <a href="../api/sair.php"><button>Sair</button></a>
        </nav>
        <br>
        <br>
        <div class="meio">
            <?php
                include("../conexao.php");                   
                $sql = $conexao->prepare("select t.*, m.* from tb_usuario u, tb_tarefas t, tb_materias m where u.id_usuario = t.fk_usuario and m.id_materia = t.fk_materias and u.email_usuario like :email");
                $sql->bindValue(':email',$_SESSION['email'], PDO::PARAM_STR);
                $sql->execute();
                while($materias = $sql->fetch(PDO::FETCH_ASSOC)){
                    
                    echo "
                    <div class='listar'>
                        <p><strong>Nome da tarefa: </strong>".$materias['nome_tarefa']."</p>
                        <p><strong>Descricao da Tarefa: </strong>".$materias['descricao_tarefa']."</p>
                        <p><strong>Data de entrega: </strong>".$materias['dataEntrega_tarefa']."</p>
                        <p><strong>Urgencia tarefa: </strong>".$materias['urgencia_tarefa']."</p>
                        <p><strong>Matéria: </strong>".$materias['nome_materia']."</p>
                        <p><strong>Download: </strong><a href='".$materias['arquivo_tarefa']."' download>tarefa</a></p>
                        <a href='../api/tarefa/deletar.php?id=$materias[id_tarefa]'><button>Deletar</button></a>
                        <br>
                        <br>
                        <a href='../api/tarefa/alterar.php?id=$materias[id_tarefa]'><button>Alterar</button></a>
                    </div>
                    <br>
                    <br>
                    ";
              
                }
            ?>
            
        </div>
</body>
</html>
