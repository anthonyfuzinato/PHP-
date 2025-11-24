<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/pergunta1Ficha2.css">
</head>
<body>

<form method="post">
    <fieldset>
        <legend>Preencha o formulário:</legend>
        Email:<br>
        <input type="email" name="email" required><br>
        Password:<br>
        <input type="password" name="pass1" required><br>
        Confirme Password:<br>
        <input type="password" name="pass2" required><br>
        Ano de nascimento:<br>
        <input type="text" name="ano" placeholder="YYYY" required><br>
        Cor favorita:<br>
        <select name="cor" required>
            <option value="">Escolha ...</option>
            <option value="vermelho">Vermelho</option>
            <option value="azul">Azul</option>
            <option value="amarelo">Amarelo</option>
            <option value="verde">Verde</option>
            <option value="laranja">Laranja</option>
            <option value="roxo">Roxo</option>
        </select><br>
        <input type="checkbox" name="aceito"> Aceito o termo de responsabilidade.<br><br>
        <input type="submit" value="Registar">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $ano = $_POST["ano"];
    $cor = $_POST["cor"];
    $aceito = isset($_POST["aceito"]);

    $anoAtual = date("Y");
    $erros = [];

    // validações
    if (empty($email) || empty($pass1) || empty($pass2) || empty($ano) || empty($cor)) {
        $erros[] = "Preencha todos os campos.";
    }
    if ($pass1 !== $pass2) {
        $erros[] = "As passwords não são iguais.";
    }
    if (!is_numeric($ano) || $ano < 1900 || $ano > $anoAtual) {
        $erros[] = "Ano de nascimento inválido.";
    }
    if (!$aceito) {
        $erros[] = "Tem de aceitar o termo de responsabilidade.";
    }

    if (!empty($erros)) {
        echo "<div class='erro'><b>Erros:</b><br>" . implode("<br>", $erros) . "</div>";
    } else {
        $idade = $anoAtual - intval($ano);
        $tipoCor = "";

        // determinar cor primária/secundária com IF + SWITCH
        if ($cor == "vermelho" || $cor == "azul" || $cor == "amarelo") {
            $tipoCor = "primária";
        } else {
            switch ($cor) {
                case "verde":
                case "laranja":
                case "roxo":
                    $tipoCor = "secundária";
                    break;
                default:
                    $tipoCor = "indefinida";
            }
        }

        echo "<div class='resultado'>";
        echo "Operação com sucesso...<br><br>";
        echo "Tem $idade anos e a sua cor favorita é $cor, uma cor $tipoCor.";
        echo "</div>";
    }
}
?>

</body>
</html>
