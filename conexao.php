<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$base = 'minhastarefas';
$dsn = "mysql:host={$host};port=3306;dbname={$base}";
try 
{
    $conexao = new PDO($dsn, $usuario, $senha);
} 
catch (PDOException $e) 
{
    die($e->getMessage());
}
?>