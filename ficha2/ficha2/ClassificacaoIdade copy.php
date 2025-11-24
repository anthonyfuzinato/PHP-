<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Classificação por Idade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<form method="post" class="card p-4 shadow-sm">
    <h4 class="mb-3">Classificação pela Idade</h4>

    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" class="form-control" name="nome" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Idade:</label>
        <input type="number" class="form-control" name="idade" required>
    </div>

    <button class="btn btn-primary">Enviar Dados</button>
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $idade = intval($_POST["idade"]);

    if($idade < 14) $class = "criança";
    elseif($idade < 18) $class = "adolescente";
    elseif($idade < 65) $class = "adulto";
    else $class = "idoso";

    echo "<div class='alert alert-info mt-4'>Olá <b>$nome</b>, a tua classificação é: <b>$class</b>.</div>";
}
?>

</div>
</body>
</html>
