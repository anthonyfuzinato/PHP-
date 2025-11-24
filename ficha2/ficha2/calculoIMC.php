<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cálculo do IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 500px;">

    <div class="card shadow-sm p-4">
        <h4 class="mb-3">Calculadora de IMC</h4>

        <form method="post">

            <div class="mb-3">
                <label class="form-label">Peso (kg)</label>
                <input type="number" name="peso" step="0.1" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Altura (m)</label>
                <input type="number" name="altura" step="0.01" class="form-control" required>
            </div>

            <button class="btn btn-primary" type="submit">Calcular</button>

        </form>
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $peso = floatval($_POST["peso"]);
    $altura = floatval($_POST["altura"]);
    $erros = [];

    if ($peso <= 0) $erros[] = "O peso deve ser maior que zero.";
    if ($altura <= 0) $erros[] = "A altura deve ser maior que zero.";

    if (!empty($erros)) {
        echo "<div class='alert alert-danger mt-3'>";
        foreach ($erros as $e) echo "$e<br>";
        echo "</div>";
    } else {
        $imc = $peso / ($altura * $altura);
        $imcFormatado = number_format($imc, 2, ",", ".");

        // classificação
        if ($imc < 18.5) $class = "Magreza";
        elseif ($imc < 24.9) $class = "Normal";
        elseif ($imc < 29.9) $class = "Sobrepeso";
        else $class = "Obesidade";

        echo "
        <div class='card mt-3 p-3 shadow-sm'>
            <h5>Resultado do IMC</h5>
            <p><b>IMC:</b> $imcFormatado</p>
            <p><b>Classificação:</b> $class</p>
        </div>";
    }
}
?>

</div>

</body>
</html>
