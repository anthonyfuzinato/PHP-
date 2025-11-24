<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa no Texto</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        textarea { width: 420px; height: 200px; }
        form { width: 430px; }
        .resultado {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #888;
            width: 420px;
        }
    </style>
</head>
<body>
<script src="js/bootstrap.bundle.min.js"></script>
<?php
// Texto fornecido pelo exercício
$texto = "A notícia é do site de emprego “Manda-te” e dá conta de vagas para todo o mundo, incluindo em território nacional.
Só em Portugal, existem 18 oportunidades para os cargos de engenheiro de teste, especialista em segurança das tecnologias de informação, gestor de idiomas, especialistas em SAP e em desenvolvimento de software JAVA.
Já a nível internacional, a Siemens precisa de um engenheiro de projectos de eficiência energética e de um responsável de grandes contas para Espanha,
de um analista de investimentos e de um gestor de marketing para a Alemanha, assim como um analista de negócio para o Reino Unido, entre outras vagas.";

$pesquisa = "";
$posicao = "";
$totalPalavras = str_word_count($texto); // conta o nº de palavras

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pesquisa = $_POST["pesquisa"];

    if (!empty($pesquisa)) {

        // procura a posição da palavra (PHP começa no 0 → professor começa no 1)
        $pos = strpos(strtolower($texto), strtolower($pesquisa));

        if ($pos !== false) {
            $posicao = $pos + 1;
        } else {
            $posicao = "A palavra não existe no texto.";
        }
    }
}

// Mostrar o output como no enunciado
echo "<div class='resultado'>";
echo "O texto tem: <b>$totalPalavras</b> palavras.<br>";

if ($pesquisa != "") {
    echo "A palavra <b>$pesquisa</b> começa na posição: <b>$posicao</b>.";
}

echo "</div>";
?>

<form method="post">
    Pesquisa:<br>
    <input type="text" name="pesquisa" value="<?php echo $pesquisa; ?>" style="width: 200px;"><br><br>

    <textarea readonly><?php echo $texto; ?></textarea><br><br>

    <input type="submit" value="Enviar Dados">
</form>

</body>
</html>
