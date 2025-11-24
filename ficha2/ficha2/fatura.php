<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Fatura</title>
</head>
<body>

<form method="post">
    <p>Preço: <input type="text" name="preco" required></p>
    <p>Quantidade: <input type="text" name="quantidade" required></p>
    <p>Desconto (€): <input type="text" name="desconto" required></p>
    <p>Despesas de transporte:
        <select name="transporte">
            <option value="5">Até 5Kg</option>
            <option value="8">Até 10Kg</option>
            <option value="15">Mais de 10Kg</option>
        </select>
    </p>
    <input type="submit" value="Calcular">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $preco = $_POST["preco"];
    $qtd = $_POST["quantidade"];
    $desc = $_POST["desconto"];
    $trans = $_POST["transporte"];

    if(!is_numeric($preco) || !is_numeric($qtd) || !is_numeric($desc)){
        echo "<p>Insere só números, sff.</p>";
    } else {
        $preco = floatval($preco);
        $qtd = intval($qtd);
        $desc = floatval($desc);
        $trans = floatval($trans);

        $iva = 0.23;
        $total_iliq = ($preco * $qtd) + $trans - $desc;
        $total = $total_iliq * (1 + $iva);
        $fatura = rand(1, 99999);

        echo "<div style='margin-top:20px;border:1px solid #aaa;padding:10px;width:300px;'>";
        echo "Detalhes da compra:<br>";
        echo "$qtd produtos, cada um custa $preco €.<br>";
        echo "Transporte: $trans €<br>";
        echo "IVA: 23%<br>";
        echo "Desconto: $desc €<br>";
        echo "<b>Total da fatura: " . number_format($total, 2, ',', '.') . " €</b><br>";
        echo "Fatura da sorte: <b>$fatura</b>";
        echo "</div>";
    }
}
?>
</body>
</html>
