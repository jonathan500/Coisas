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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MinhasTarefas</title>
</head>
<body>
    <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-image: linear-gradient(45deg, #e66465, #9198e5);
        }
    </style>
    <a href="https://www.youtube.com/watch?v=iNm86iordCQ">nandato</a>
</body>
</html>
