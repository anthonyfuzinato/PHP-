<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<form method="post" class="card p-4 shadow-sm">
    <h4 class="mb-3">Preencha o formulário</h4>

    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password:</label>
        <input type="password" class="form-control" name="pass1" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Confirme Password:</label>
        <input type="password" class="form-control" name="pass2" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Ano de nascimento:</label>
        <input type="text" class="form-control" name="ano" placeholder="YYYY" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Cor favorita:</label>
        <select name="cor" class="form-select" required>
            <option value="">Escolha...</option>
            <option value="vermelho">Vermelho</option>
            <option value="azul">Azul</option>
            <option value="amarelo">Amarelo</option>
            <option value="verde">Verde</option>
            <option value="laranja">Laranja</option>
            <option value="roxo">Roxo</option>
        </select>
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="aceito" class="form-check-input">
        <label class="form-check-label">Aceito o termo de responsabilidade</label>
    </div>

    <button class="btn btn-primary">Registar</button>
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $email = $_POST["email"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $ano   = $_POST["ano"];
    $cor   = $_POST["cor"];
    $aceito = isset($_POST["aceito"]);
    
    $erros = [];
    $anoAtual = date("Y");

    if($pass1 !== $pass2) $erros[] = "As passwords não coincidem.";
    if(!is_numeric($ano) || $ano < 1900 || $ano > $anoAtual) $erros[] = "Ano inválido.";
    if(!$aceito) $erros[] = "Tem de aceitar o termo de responsabilidade.";

    if(!empty($erros)){
        echo "<div class='alert alert-danger mt-3'><b>Erros:</b><br>".implode("<br>", $erros)."</div>";
    } else {
        $idade = $anoAtual - intval($ano);

        // IF + SWITCH para cor
        if($cor=="vermelho" || $cor=="azul" || $cor=="amarelo"){
            $tipo = "primária";
        } else {
            switch($cor){
                case "verde":
                case "laranja":
                case "roxo":
                    $tipo = "secundária";
                    break;
                default:
                    $tipo = "desconhecida";
            }
        }

        echo "
        <div class='alert alert-success mt-3'>
            Operação com sucesso!<br>
            Tem $idade anos e a sua cor favorita é $cor, uma cor $tipo.
        </div>";
    }
}
?>

</div>
</body>
</html>
