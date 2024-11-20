<?php
session_start();
require_once 'conexao.php';

function numfmt($num){
    return number_format($num,2,",",".");
}
function getTipo($tipo){
    if ($tipo == 0){
        return "Saida";
    }
    return "Entrada";
    
}
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
    include('back/conexao.php');
    $sqlMes = "SELECT * FROM meses WHERE mes = $mes and ano = $ano";
    $queryMes = mysqli_query($conn,$sqlMes);
    return  $queryMes;
}

function getMeses()
{
    include('back/conexao.php');  
    $sqlsoMes = "SELECT idmes,mes from meses";
    return $querysoMes = mysqli_query($conn,$sqlsoMes);
}

if (isset($_POST['criar_despesa'])){
    $data = trim($_POST['data']);
    $tipo = trim($_POST['tipo']);
    $descricao = trim($_POST['categoria']);
    $valor = trim($_POST['valor']);

    $sql = "INSERT INTO despesas (data_hora,tipo,descricao,valor) values ('$data','$tipo','$descricao','$valor')";

    mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn) >= 0){
        $_SESSION['message'] = "Despesa Criada!";
        $_SESSION['type'] = 'success';
    }
    else{
        $_SESSION['message'] = "A despesa não pode ser criada!";
        $_SESSION['type'] = 'error';
    }
    header('Location: mes.php');
    exit();
}



if (isset($_POST['editar_despesa'])){
    $idDespesas = mysqli_real_escape_string($conn,$_POST['idDespesa']);
    $data = mysqli_real_escape_string($conn,$_POST['data']);
    $tipo = mysqli_real_escape_string($conn,$_POST['tipo']);
    $categoria = mysqli_real_escape_string($conn,$_POST['categoria']);
    $valor = mysqli_real_escape_string($conn,$_POST['valor']);

    $sql = "UPDATE despesas set data_hora = '{$data}', tipo = '{$tipo}', descricao = '{$categoria}', valor = '{$valor}' WHERE idDespesas = '{$idDespesas}'";
    mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn) >= 0){
        $_SESSION['message'] = "Despesa atualizada!";
        $_SESSION['type'] = 'success';
    }
    else{
        $_SESSION['message'] = "A despesa não pode ser editada!";
        $_SESSION['type'] = 'error';
    }

    header('Location: ../mes.php');
    exit();
}

//TEM QUE TESTAR ESSA MERDA
if (isset($_POST['deletar_despesa'])){
    $idDespesa = mysqli_real_escape_string($conn,$_POST['deletar_despesa']);
    $sql = "DELETE FROM despesas WHERE idDespesas = '{$idDespesa}'";

    mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn) >= 0){
        $_SESSION['message'] = "Despesa excluida!";
        $_SESSION['type'] = 'success';
    }
    else{
        $_SESSION['message'] = "A despesa não pode ser excluida!";
        $_SESSION['type'] = 'error';
    }
    
    header('Location: ../mes.php');
    exit();
}
?>