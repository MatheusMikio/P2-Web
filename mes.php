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
        <div class="table-wrapper">
            <h3 class="main-title">Mes de {DALE}</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr class="grid text-center">
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody class="grid text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                    <tfoot class="text-end">
                        <td colspan="7">Total R$</td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>