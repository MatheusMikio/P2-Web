<?php
session_start();
require_once('back/conexao.php');

function getValor($idmes,$tipo)
{
    include('back/conexao.php');
    $sqlSaidames = "SELECT sum(valor) as valor from despesas where idMes = $idmes and tipo = $tipo";
    $querySaidames = mysqli_query($conn,$sqlSaidames);
    if (mysqli_num_rows($querySaidames)>0)
    {
        $valor = mysqli_fetch_array($querySaidames);
        return $valor;
    }
}


$sql = "SELECT sum(valor) as valor FROM despesas WHERE tipo = '0' ";
$sql2= "SELECT sum(valor) as valor FROM despesas WHERE tipo = '1' ";
$sqlMes = "SELECT * FROM meses m JOIN despesas d on d.idMes = m.idMes;";
$sqlsoMes = "SELECT idmes,mes from meses";
$query = mysqli_query($conn, $sql);
$query2 = mysqli_query($conn,$sql2);
$queryMes = mysqli_query($conn,$sqlMes);
$querysoMes = mysqli_query($conn,$sqlsoMes);

if (mysqli_num_rows($query) > 0) {
    $mesesSaida = mysqli_fetch_array($query);
}
if(mysqli_num_rows($query2)>0)
{
    $mesesEntrada = mysqli_fetch_array($query2);
}
//precisa criar o banco para rodar agr felicidades !!
?>

<!DOCTYPE html>

<html lang="pt=-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php" >
                <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="visualizar.php">
                <i class="bi bi-calendar3"></i>
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
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Pesquisar">
            </div>
        </div>
        <div class="card-container">
            <h3 class="main-title">Total do ano</h3>
            <div class="card-wrapper">
                <div class="payment-card light-green">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Entrada Total:
                            </span>
                            <span class="amount-value"><?=$mesesEntrada['valor'] ??0 ?></span>
                        </div>
                        <i class="bi bi-caret-up-fill icon-g"></i>
                    </div>
                </div>  
                <div class="payment-card light-red">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Saida Total:
                            </span>
                            <span class="amount-value"><?=$mesesSaida['valor'] ??0 ?></span>
                        </div>
                        <i class="bi bi-caret-down-fill icon-r"></i>
                    </div>
                </div>
                <div class="payment-card light-blue">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Restante:
                            </span>
                            <span class="amount-value"><?=$mesesEntrada['valor'] - $mesesSaida['valor']?></span>
                        </div>
                        <i class="bi bi-currency-dollar icon-b"></i>
                    </div>
                </div>                
            </div>
        </div>
        <div class="table-wrapper">
            <h3 class="main-title">Resumo dos meses</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr class="grid text-center">
                            <th>Mês</th>
                            <th>Entrada</th>
                            <th>Saida</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <?php foreach ($querysoMes as $mes):?>
                        <?php 
                            $saidavalor = getValor($mes['idmes'],0);
                            $entradaValor = getValor($mes['idmes'],1);

                            ?>
                    <tbody class="grid text-center">
                        <td><?=$mes['mes']?></td>
                    
                        <td><?=number_format($entradaValor[0],2,',','.')?></td>
                        <td><?=number_format($saidavalor[0],2,',','.')?></td>
                        <td><?=number_format($entradaValor[0]-$saidavalor[0],2,',','.')?></td>
                    </tbody>
                    <?php endforeach;?>
                    <tfoot class="text-end">
                        <td colspan="7"><?=$mesesEntrada['valor'] - $mesesSaida['valor']?></td>
                    </tfoot>
                    
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>