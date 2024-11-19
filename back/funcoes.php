<?php

function getValorMes($idmes,$tipo)
{
    include('back/conexao.php');
    $sqlValor = "SELECT sum(valor) as valor from despesas where idMes = $idmes and tipo = $tipo";
    $queryValor = mysqli_query($conn,$sqlValor);
    if (mysqli_num_rows($queryValor)>0)
    {
        $valor = mysqli_fetch_array($queryValor);
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

function getMes($mes,$ano)
{
    $sqlMes = "SELECT * FROM meses WHERE mes = $mes and ano = $ano";
    $queryMes = mysqli_query($conn,$sql);
    return  $queryMes;
}

function getMeses()
{
    include('back/conexao.php');  
    $sqlsoMes = "SELECT idmes,mes from meses";
    return $querysoMes = mysqli_query($conn,$sqlsoMes);
}

if(isset($_POST['criar_despesa']))
{
    $valor = $_POST['valor'];
    $ano = $_POST['data'];
    $mes = $_POST['data'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['categoria'];

    $getMes = getMes($mes,$ano);
    if (count($getMes)>0)
    {
        $idMes = $getMes['idMes'];
        $sqlAno = "INSERT INTO despesas (valor,descricao,idMes,tipo) VALUES ('$valor','$descricao','$idMes','$ano')";
        mysli_query($conn,$sqlAno);
    }
    else
    {
        $sqlMes = "INSERT INTO meses (mes,ano) VALUES ($mes,$ano)";
        mysqli_query($conn,$sqlMes);

    }
    header('Location: ../index.php');
    exit();
}

?>