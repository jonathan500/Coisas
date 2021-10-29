<?php
include("../conexao.php");
session_start();
if(isset($_POST['cadastrart'])){
    $nome = $_POST['nomet'];
    $descricao = $_POST['desct'];
    $diretorio = "../../arquivos";
    $arquivo = $_FILES['tarefa']['name'];
    $data = $_POST['datat'];
    $urgencia = $_POST['urgencia'];
    $materia = $_POST['materia'];
    $iduser;    
    $sql = $conexao->prepare("SELECT id_usuario FROM tb_usuario WHERE email_usuario = :email AND senha_usuario = :senha");
    $sql->bindValue(':email',$_SESSION['email'], PDO::PARAM_STR);
    $sql->bindValue(':senha',$_SESSION['senha'], PDO::PARAM_STR);
    $sql->execute();
    $pesquisa = $sql->fetch(PDO::PARAM_STR);
    
}else{
    echo "algo deu de errado";
}


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../css/estilo.css" rel="stylesheet" >
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
            <form action="cadastrot.php" method="POST" align="center" enctype="multipart/form-data">
                <h1>Cadastrar Tarefa</h1>
                <div>
                    <input class="cem" type="text" name="nomet" id="nomet" placeholder="Nome da Tarefa" required><br><br>
                </div>
                <div>
                    <input class="cem" type="textarea" name="desct" id="desct" placeholder="Descrição da Tarefa" ><br><br>
                </div>
                <div>
                    <input class="cem" type="file" name="tarefa" id="tarefa" required><br><br>
                </div>
                <div>
                    <input class="cem" type="date" name="datat" id="datat" placeholder="Data de entrega" required><br><br>
                </div>
                <div class="cem">
                    <input type="checkbox" name="urgencia" id="sim"> Este trabalho é urgente<br><br>
                </div>
                <div>
                    <select class="cem" name="materia" id="materia" required>
                        <?php
                            include("../conexao.php");                   
                            $sql = $conexao->prepare("select * from tb_materias");
                            $sql->execute();
                            while($materias = $sql->fetch(PDO::FETCH_ASSOC)){
                                print_r($materias);
                                echo '<option value="'.$materias['nome_materia'].'">'.$materias['nome_materia'].'</option>';
                            }
                        ?>
                    </select><br><br>
                </div>
                    <button type="submit" name="cadastrart" value="cadastrart">Cadastrar-se</button><br><br>
            </form>
            <a href="minhas_tarefas.php"><button name="voltar" value="voltar">Voltar</button></a>
        </div>
    </body>
    </html>