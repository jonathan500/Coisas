<?php

// Informações para conexão
$host = 'localhost';
$usuario = 'root';
$senha = '';
$base = 'minhastarefas';
$dsn = "mysql:host={$host};port=3306;dbname={$base}";

try 
{
    // Conectando
    $conexao = new PDO($dsn, $usuario, $senha);
} 
catch (PDOException $e) 
{
    // Se ocorrer algum erro na conexão
    die($e->getMessage());
}
?>