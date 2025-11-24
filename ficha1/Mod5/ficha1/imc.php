<?php

// Valores de entrada
$peso = 80;      
$altura = 1.75;  

$imc = $peso / ($altura * $altura);
$imcFormatado = number_format($imc, 3, ',', '.');

if ($imc < 18.5) {
    echo '<font color="red"><p>Abaixo do peso</p></font>';
} elseif ($imc < 25) {
    echo '<font color="green"><p>Peso normal</p></font>';
} elseif ($imc < 30) {
    echo '<font color="red"><p>Sobrepeso</p></font>';
} elseif ($imc < 35) {
    echo '<font color="red"><p>Obesidade Grau I</p></font>';
} elseif ($imc < 40) {
    echo '<font color="red"><p>Obesidade Grau II</p></font>';
} else {
    echo '<font color="red"><p>Obesidade Grau III</p></font>';
}
echo $imcFormatado

?>
