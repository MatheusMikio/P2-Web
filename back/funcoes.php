<?php
session_start();
require_once 'conexao.php';


function numfmt($num){
    return number_format($num,2,",",".");


    // Não funciona no xampp normal tem que configurar // Roda em server normal
    // $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    // return numfmt_format_currency($padrao,$num,"BRL");
    
}
function getTipo($tipo){
    if ($tipo == 0){
        return "Saida";
    }
    return "Entrada";
}

function mes($mes){
    switch ($mes) {
        case '01':
            return "Janeiro";
            break;
        case '02':
            return "Fevereiro";
        case '03':
            return "Março";
        case '04':
            return "Abril";
        case '05':
            return "Maio";
        case '06':
            return "Junho";
        case '07':
            return "Julho";
            break;
        case '08':
            return "Agosto";
            break;
        case '09':
            return "Setembro";
            break;
        case '10':
            return "Outubro";
            break;
        case '11':
            return "Novembro";
            break;
        case '12':
            return "Dezembro";
            break;
        default:
            return "";
            break;
        }
}
function getValorMes($idmes,$tipo)
{
    include('conexao.php');
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
    include('conexao.php');
    $sql = "SELECT sum(valor) as valor FROM despesas WHERE tipo = $tipo ";   
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $mesesSaida = mysqli_fetch_array($query);
        return $mesesSaida['valor'];
    }
}

function selectMesOrInsert($mes,$ano)
{
    include('conexao.php');
    $sqlMes = "SELECT idMes FROM meses WHERE mes = '$mes' and ano = $ano";
    $queryMes = mysqli_query($conn,$sqlMes);
    if (mysqli_num_rows($queryMes) > 0) {
        $idMes = mysqli_fetch_array($queryMes);
        return $idMes['idMes'];
    }
    else
    {
        $sqlInsertMes = "INSERT INTO meses (mes,ano) VALUES ('$mes',$ano)";
        mysqli_query($conn,$sqlInsertMes);
        if (mysqli_affected_rows($conn) >= 0){
            $sqlSelectMes = "SELECT idMes FROM meses where mes = '$mes' and ano = $ano";
            $querySelectMes = mysqli_query($conn,$sqlSelectMes);
            if(mysqli_num_rows($querySelectMes))
            {
                $mes = mysqli_fetch_array($querySelectMes);
                return $mes['idMes'];
            }
            else
            {
                return "Não foi encontrado o mes";
            }
        }
    }
}

function getMes($idMes)
{
    include('conexao.php');
    $sql = "SELECT * from meses WHERE idMes = $idMes";
    $query = mysqli_query($conn,$sql);
    if (mysqli_num_rows($query)>0)
    {
        return mysqli_fetch_array($query);
    }
}

function getDespesa($idMes)
{
    include('conexao.php');
    $sqlDespesa = "SELECT * FROM despesas where idmes = $idMes";
    return mysqli_query($conn,$sqlDespesa);
    
}

function getMeses()
{
    include('conexao.php');  
    $sqlsoMes = "SELECT idmes,mes from meses ORDER BY 'mes'";
    return $querysoMes = mysqli_query($conn,$sqlsoMes);
}

function idMesDespesa($idDespesas){
    include 'conexao.php';
    $selectIdMes = "SELECT idMes from despesas where idDespesas = '$idDespesas'";
    $queryIdMes = mysqli_query($conn,$selectIdMes);
    $idMes = mysqli_fetch_array($queryIdMes);
    return $idMes['idMes'];
}

if (isset($_POST['criar_despesa'])){
    #var_dump($_POST['data']);
    $ano = date('Y',strtotime($_POST['data']));
    $mes = date('m',strtotime($_POST['data']));
    $data = trim($_POST['data']);
    $tipo = trim($_POST['tipo']);
    $descricao = trim($_POST['categoria']);
    $valor = trim($_POST['valor']);

    $idMes = selectMesOrInsert($mes,$ano);
    $sql = "INSERT INTO despesas (data_hora,tipo,descricao,valor,idMes) values ('$data','$tipo','$descricao','$valor','$idMes')";

    mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn) >= 0){
        $_SESSION['message'] = "Despesa Criada!";
        $_SESSION['type'] = 'success';
    }
    else{
        $_SESSION['message'] = "A despesa não pode ser criada!";
        $_SESSION['type'] = 'error';
    }
    header('Location: ../mes.php?idMes='.$idMes);
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
    $idMes = idMesDespesa($idDespesas);

    if (mysqli_affected_rows($conn) >= 0){
        $_SESSION['message'] = "Despesa atualizada!";
        $_SESSION['type'] = 'success';
    }
    else{
        $_SESSION['message'] = "A despesa não pode ser editada!";
        $_SESSION['type'] = 'error';
    }
    
    header('Location: ../mes.php?idMes='.$idMes);
    exit();
}


if (isset($_POST['deletar_despesa'])){
    $idDespesa = mysqli_real_escape_string($conn,$_POST['deletar_despesa']);
    $idMes = $_POST['idMes'];
    $sql = "DELETE FROM despesas WHERE idDespesas = '{$idDespesa}'";
    var_dump($idMes);
    mysqli_query($conn,$sql);
    
    if (mysqli_affected_rows($conn) >= 0){
        $_SESSION['message'] = "Despesa excluida!";
        $_SESSION['type'] = 'success';
    }
    else{
        $_SESSION['message'] = "A despesa não pode ser excluida!";
        $_SESSION['type'] = 'error';
    }
    
    header('Location: ../mes.php?idMes='.$idMes);
    exit();
}
?>