<?php 
session_start();
require_once './back/conexao.php';
$despesas = [];

if (!isset($_GET['idDespesas'])){
    header('Location: mes.php');
}
$idDespesa = mysqli_real_escape_string($conn,$_GET['idDespesas']);
$sql = "SELECT * FROM despesas WHERE idDespesas = '{$idDespesa}'";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0){
    $despesas = mysqli_fetch_array($query);
}
?>
<!DOCTYPE html>
<html lang="pt=-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Despesa</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="index.php" >
                <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="criar_despesa.php">
                <i class="bi bi-calendar2-minus"></i>
                    <span>Editar despesa</span>
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
                <span>Editar despesa</span>
                <h2>Sistema de Controle de Finanças</h2>
            </div>
            <div>
                <a href="visualizar.php"name="criar_despesa" class="button-button">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <?php 
            if ($despesas):
            ?>
            <div class="card-container-g">
                <form action="back/funcoes.php" method="POST">
                    <input type="hidden" name="idDespesa" value="<?=$despesas['idDespesas']?>">
                    <div class="mb-3">
                        <label for="data" class="color">Data</label>
                        <input type="datetime-local" name="data" id="data" class="form-control" value="<?=$despesas['data_hora']?>">
                    </div>
                    <div class="mb-3" >
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" >
                            <option value="1">Entrada</option>
                            <option value="0">Saida</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoria">Categoria</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" minlength="5" maxlength="25" value="<?=$despesas['descricao']?>">
                    </div>
                    <div class="mb-3">
                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor" class="form-control"  step=".01" value="<?=$despesas['valor']?>">
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" name="editar_despesa" class="button">Editar</button>
                    </div>
                </form>
            </div>
            <?php 
            endif
            ?>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
