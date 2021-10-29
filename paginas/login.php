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
            width:84.5%;
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
    <div class="meio">
        <form action="../api/login.php" method="POST">
            <h1>Login</h1>
            <div>
                <input type="text" name="email" id="email" placeholder="Email" required><br><br>
            </div>
            <div>
                <input type="password" name="senha" id="senha" placeholder="Senha" required><br><br>
            </div>
                <button type="submit" name="entrar" value="entrar">Entrar</button>
        </form>
        <a href="cadastro.php"><button name="cadastrar" value="cadastrar">Cadastrar-se</button><br></a>
    </div>
</body>
</html>