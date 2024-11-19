<?php

function getValorMes($idmes,$tipo)
{
    include('back/conexao.php');
    $sqlSaidames = "SELECT sum(valor) as valor from despesas where idMes = $idmes and tipo = $tipo";
    $querySaidames = mysqli_query($conn,$sqlSaidames);
    if (mysqli_num_rows($querySaidames)>0)
    {
        $valor = mysqli_fetch_array($querySaidames);
        return $valor['valor'];
    }
}

function getValor($tipo)
{
    include('back/conexao.php');
    $sql = "SELECT sum(valor) as valor FROM despesas WHERE tipo = $tipo ";   
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $mesesSaida = mysqli_fetch_array($query);
        return $mesesSaida['valor'];
    }
}

function getMes()
{
    include('back/conexao.php');  
    $sqlsoMes = "SELECT idmes,mes from meses";
    return $querysoMes = mysqli_query($conn,$sqlsoMes);
}

?>