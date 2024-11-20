<?php 
require_once './back/conexao.php';
require_once './back/funcoes.php';
$mes = [];
$sql = "SELECT * from meses";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query)>0)
{
    $mes = mysqli_fetch_array($query);
}
$sql = "SELECT * FROM despesas";
$despesas = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="pt=-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meses</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li >
                <a href="index.php" >
                <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="active">
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
                <span>Meses</span>
                <h2>Sistema de Controle de Finanças</h2>
            </div>
            <div>
                <a href="criar_despesa.php"name="criar_despesa" class="button-button">Criar</a>
            </div>
        </div>
        <?php include ('notificacao.php')?>
        <div class="table-wrapper">
            <h3 class="main-title">Mes de <?= ucfirst($mes['mes'])?></h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr class="grid text-center">
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Alterações</th>
                        </tr>
                    </thead>
                    <?php foreach ($despesas as $despesa): ?>
                    <tbody class="grid text-center">
                        <td><?=date('d/m/Y H:i:s', strtotime($despesa['data_hora']))?></td>
                        <td><?=getTipo($despesa['tipo'])?></td>
                        <td><?=$despesa['descricao']?></td>
                        <td><?=numfmt($despesa['valor'])?></td>
                        <td>
                        <form action="./back/funcoes.php" method="post">
                            <a href="editar.php?idDespesas=<?=$despesa['idDespesas']?>" class="btn btn-warning m-1"><i class="bi bi-pencil-square"></i></a>
                            <!-- Tem que testar essa porra -->
                            <button onclick="return confirm('Excluir Despesa?')" name="deletar_despesa" type="submit" value="<?=$despesa['idDespesas']?>" class="btn btn-danger"><i class="bi bi-calendar-x"></i></button>
                            </form>
                        </td>
                    </tbody>
                    <?php endforeach;?> 

                    <tfoot class="text-end">
                        <td colspan="7">Total R$</td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>