<?php
    session_start();
    if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nome']);
        header('Location: login.php');
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

    </style>
        
        <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">MinhasTarefas</span>
            <a href="cadastrot.php"><button name="cadastrart" value="cadastrart">Cadastrar</button></a>
            <a href="login.php"><button name="sair" value="sair">Sair</button></a>
        </nav>
        <br>
        <br>
        <div>
            <form action=""></form>
        </div>
</body>
</html>
