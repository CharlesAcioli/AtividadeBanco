
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="banco.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Login</title>
    </head>
    <body>
        <form action="banco.php" method="post">
            <h1>Caixa Eletrônico</h1><br>
            <div class="inputs">
                <label for="valor_disponivel">Valor disponível:</label>
                <input  type="number" id="valor_disponivel" name="valor_disponivel" value="10000" readonly>
                <label for="valor_saque">Informe o valor de saque:</label>
                <input type="number" placeholder="R$2,00 mínimo" name="valor_saque" id="idvalor_saque">
                <input type="submit" id="sacar" name="sacar" value="Sacar">
            </div>
        </form>
    </body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor = $_POST['valor_saque'];
    $notas = [100, 50, 20, 10, 5, 2];
    $notas_saque = [];
    $resto = $valor;
    foreach ($notas as $nota) {
        $qtd_notas = floor($resto / $nota);
        if ($qtd_notas > 0) {
            $notas_saque[$nota] = $qtd_notas;
            $resto = $resto % $nota;
        }
    }
    
    if ($resto > 0) {
        echo "<p> Não é possível sacar o valor informado. </p>";
    } else {
        echo "<p> Valor sacado: R$ $valor </p><br>";
        foreach ($notas_saque as $nota => $qtd) {
            echo "<p> $qtd nota(s) de R$ <img src='notas/$nota.jpg'></p>";
        }
    }
}
