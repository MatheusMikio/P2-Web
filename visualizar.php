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
        <div class="card-container">
            <h3 class="main-title">Meses do ano <select name="ano" id="ano">
                <option value="">2024</option>
            </select></h3>
            <div class="card-wrapper">
                <a href="mes.php">
                    <div class="mes-card">
                        <div class="card-header">
                            <div class="amount">
                                <span class="mes">Janeiro</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>            
        </div>
    </div>