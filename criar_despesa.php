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
                <i class="bi bi-calendar-plus"></i>
                    <span>Criar despesa</span>
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
                <span>Criação de despesa</span>
                <h2>Sistema de Controle de Finanças</h2>
            </div>
            <div>
                <a href="visualizar.php"name="criar_despesa" class="button-button">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-container-g">
                <form action="back/funcoes.php" method="POST">
                    <div class="mb-3">
                        <label for="data" class="color">Data</label>
                        <input type="datetime-local" name="data" id="data" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="1">Entrada</option>
                            <option value="0">Saida</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoria">Categoria</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" minlength="5" maxlength="25">
                    </div>
                    <div class="mb-3">
                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor" class="form-control" placeholder="R$500.00" step=".01">
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" name="criar_despesa" class="button">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
