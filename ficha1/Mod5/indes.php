<?php
require 'config.php';
echo "IVA: " . taxa_iva;
echo"<br>";
var_dump(taxa_iva);

$produto = "portatil";
$precoBase = 1000;
$tipoCliente = "premium";
echo"<br>";
var_dump($produto, $precoBase, $tipoCliente);

$valorIVA = $precoBase * taxa_iva;
$precoComIVA = $precoBase + $valorIVA;

if ($tipoCliente === "premium") {
    $desconto = $precoComIVA * desconto_cliente_premium;
}elseif ($tipoCliente == "regular"){
    $desconto = $precoComIVA * desconto_cliente_regular;
}else {
    $desconto = 0;
}

$precofinal = $precoComIVA - $desconto;

echo "p $produto";
echo "p $precoBase";
echo "p $valorIVA";
echo "p $precoComIVA";
echo "p $desconto";
echo "p $precofinal";

?>