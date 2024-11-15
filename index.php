<!DOCTYPE html>
<html lang="pt=-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php" >
                <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
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
                <span>Dashboard</span>
                <h2>Sistema de Controle de Finanças</h2>
            </div>
            <div class="search">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Pesquisar">
            </div>
        </div>
        <div class="card-container">
            <h3 class="main-title">Total do ano</h3>
            <div class="card-wrapper">
                <div class="payment-card light-green">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Entrada Total:
                            </span>
                            <span class="amount-value">$500.00</span>
                        </div>
                        <i class="bi bi-caret-up-fill icon-g"></i>
                    </div>
                </div>  
                <div class="payment-card light-red">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Saida Total:
                            </span>
                            <span class="amount-value">$500.00</span>
                        </div>
                        <i class="bi bi-caret-down-fill icon-r"></i>
                    </div>
                </div>
                <div class="payment-card light-blue">
                    <div class="card-header">
                        <div class="amount">
                            <span class="title">
                                Restante:
                            </span>
                            <span class="amount-value">$500.00</span>
                        </div>
                        <i class="bi bi-caret-right-fill icon-b"></i>
                    </div>
                </div>                
            </div>
        </div>
        <div class="table-wrapper">
            <h3 class="main-title">Resumo dos meses</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr class="grid text-center">
                            <th>Mês</th>
                            <th>Entrada</th>
                            <th>Saida</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="grid text-center">
                        <td>Janeiro</td>
                        <td>R$ 1000</td>
                        <td>R$ 500</td>
                        <td>R$ 500</td>
                    </tbody>
                    <tfoot class="text-end">
                        <td colspan="7">Total: R$500</td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>