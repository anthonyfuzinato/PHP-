<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Classificação por Idade</title>
    
</head>
<body>

<form method="post">
    <p><b>Nome:</b></p>
    <input type="text" name="nome" required>

    <p><b>Idade:</b></p>
    <input type="number" name="idade" required>

    <button type="submit">Enviar Dados</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $idade = intval($_POST["idade"]);
    $classificacao = "";

    if ($idade < 14) {
        $classificacao = "criança";
    } elseif ($idade < 18) {
        $classificacao = "adolescente";
    } elseif ($idade < 65) {
        $classificacao = "adulto";
    } else {
        $classificacao = "idoso";
    }

    echo "<div class='resultado'>";
    echo "Olá $nome, a tua classificação é: <b>$classificacao</b>.";
    echo "</div>";
}
?>

</body>
</html>
