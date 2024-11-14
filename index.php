<?php
session_start();
require_once('back/conexao.php');

$mesesEntrada= [];
$mesesSaida = [];
$sql = "SELECT sum(valor) as valor FROM dispesas WHERE tipo = '0' ";
$sql2= "SELECT sum(valor) as valor FROM dispesas WHERE tipo = '1' ";
$query = mysqli_query($conn, $sql);
$query2 = mysqli_query($conn,$sql2);
if (mysqli_num_rows($query) > 0) {
    $mesesEntrada = mysqli_fetch_array($query);
}
if(mysqli_num_rows($query2)>0)
{
    $mesesSaida = mysqli_fetch_array($query2);
}
// precisa criar o banco para rodar agr felicidades !!
?>

<!DOCTYPE html>
<html lang="pt=-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php" >
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="criar_despesa.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Criar despesa</span>
                </a>
            </li>
            <li>
                <a href="visualizar.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Visualizar meses</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Dashboard</span>
                <h2>Sistema de Controle de Finanças</h2>
            </div>
            <div class="search">
                <i class="fa-solid fa-search"></i>
                <input type="text" placeholder="Pesquisar">
            </div>
        </div>
    </div>
</body>
</html>