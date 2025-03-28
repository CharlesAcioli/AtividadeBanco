<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Varela+Round&display=swap');
        :root {
        --cor-violeta: #530082;
        --cor-roxo: #8A05BE;
        --cor-purple: #BA4DE3;
        --cor-fundo: #F5F5F5;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--cor-fundo);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: var(--cor-violeta);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            color: #ffffff;
            text-align: center;
            font-size: 50px;
            font-family: "Varela Round", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        input[type="text"], input[type="password"] {
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: var(--cor-roxo);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: var(--cor-purple);
        }
        .error {
            margin: 5px;
            padding: 5px;
            color: red;
            font-size: 14px;
            text-align: center;
        }
        footer {
            color: #ffffff;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>NUBANK</h2>

    <?php if (isset($erro)) { ?>
        <p class="error"><?php echo $erro; ?></p>
    <?php } ?>

    <form method="post" action="banco.php">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    <footer>Desenvolvido por: <strong>Charles Acioli</strong></footer>
</div>

</body>
</html>


<?php

session_start();

$user = "admin";
$pass = "admin";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario == "admin" && $senha == "admin") {
        $_SESSION['usuario'] = $usuario;
        header('Location: banco.php');
        exit();
    }else {
        $erro = "Usuário ou senha inválidos!";
    }
}

