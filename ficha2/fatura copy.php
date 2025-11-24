<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Fatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<form method="post" class="card p-4 shadow-sm">
    <h4 class="mb-3">Campos da Fatura</h4>

    <div class="mb-3">
        <label class="form-label">Preço:</label>
        <input type="text" class="form-control" name="preco" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Quantidade:</label>
        <input type="text" class="form-control" name="quantidade" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Desconto (€):</label>
        <input type="text" class="form-control" name="desconto" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Despesas de transporte:</label>
        <select name="transporte" class="form-select">
            <option value="5">Até 5Kg</option>
            <option value="8">Até 10Kg</option>
            <option value="15">Mais de 10Kg</option>
        </select>
    </div>

    <button class="btn btn-primary">Calcular</button>
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $preco = $_POST["preco"];
    $quant = $_POST["quantidade"];
    $desc  = $_POST["desconto"];
    $trans = $_POST["transporte"];

    if(!is_numeric($preco) || !is_numeric($quant) || !is_numeric($desc)){
        echo "<div class='alert alert-danger mt-4'>Introduz apenas números válidos.</div>";
    } else {
        $preco = floatval($preco);
        $quant = intval($quant);
        $desc  = floatval($desc);
        $trans = floatval($trans);

        $iliq = ($preco * $quant) + $trans - $desc;
        $liq  = $iliq * 1.23;
        $sorte = rand(1,99999);

        echo "
        <div class='card mt-4 p-3 shadow-sm'>
            <p><b>Detalhes da compra:</b></p>
            <p>$quant produtos, cada um custa $preco €.</p>
            <p>O transporte custa $trans €.</p>
            <p>IVA: 23%</p>
            <p>Desconto: $desc €</p>
            <p><b>Total da fatura: ".number_format($liq,2,",",".")." €</b></p>
            <p>A fatura da sorte é: <b>$sorte</b></p>
        </div>";
    }
}
?>

</div>
</body>
</html>
