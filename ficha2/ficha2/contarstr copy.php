<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Exercício 4</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-light">

<div class="container mt-4" style="max-width: 700px;">

<?php
$texto = "A notícia é do site de emprego “Manda-te” e dá conta de vagas para todo o mundo, incluindo em território nacional.
Só em Portugal, existem 18 oportunidades para os cargos de engenheiro de teste, especialista em segurança das tecnologias de informação, gestor de idiomas, especialistas em SAP e em desenvolvimento de software JAVA.
Já a nível internacional, a Siemens precisa de um engenheiro de projectos de eficiência energética e de um responsável de grandes contas para Espanha,
de um analista de investimentos e de um gestor de marketing para a Alemanha, assim como um analista de negócio para o Reino Unido, entre outras vagas.";

$palavra = "";
$posicao = "";
$totalPalavras = str_word_count($texto);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $palavra = $_POST["pesquisa"];

    if (!empty($palavra)) {
        $p = strpos(strtolower($texto), strtolower($palavra));
        $posicao = ($p !== false) ? $p + 1 : "Não encontrada";
    }
}

echo "<div class='alert alert-info'>
        O texto tem <b>$totalPalavras</b> palavras.<br>";

if ($palavra != "") {
    echo "A palavra <b>$palavra</b> começa na posição: <b>$posicao</b>.";
}

echo "</div>";
?>

<form method="post" class="card p-4 shadow-sm">
    <label class="form-label">Pesquisa:</label>
    <input type="text" name="pesquisa" class="form-control" value="<?= $palavra ?>">

    <label class="form-label mt-3">Texto:</label>
    <textarea class="form-control" rows="7" readonly><?= $texto ?></textarea>

    <button class="btn btn-primary mt-3" type="submit">Enviar Dados</button>
</form>

</div>
</body>
</html>
