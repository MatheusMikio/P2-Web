<!DOCTYPE html>
<html lang="pt=-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php" >
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="criar_despesa.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Criar despesa</span>
                </a>
            </li>
            <li>
                <a href="visualizar.php">
                    <i class="fas fa-tachometer-alt"></i>
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
                <i class="fa-solid fa-search"></i>
                <input type="text" placeholder="Pesquisar">
            </div>
        </div>
        <div class="card-container">
            <h3 class="main-title">Today's data</h3>
            <div class="card-warapper">
                <div class="payment-card">
                    <div class="card-header">
                        <div class="ammount">
                            <span class="title">
                                Payment ammount
                            </span>
                            <span class="amount-value">$500.00</span>
                        </div>
                        <i class="fas fa-dollar-sign icon"></i>
                    </div>
                    <span class="card-detail">**** **** **** 3210</span>
                </div>                
            </div>
        </div>
    </div>
</body>
</html>