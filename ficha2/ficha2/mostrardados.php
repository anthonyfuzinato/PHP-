<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Dados Recebidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<h4>Dados recebidos:</h4>

<table class="table table-bordered table-striped mt-3 bg-white">
    <tr><th>Email</th><td><?php echo $_GET["email"] ?? ""; ?></td></tr>
    <tr><th>Senha</th><td><?php echo $_GET["password"] ?? ""; ?></td></tr>
    <tr><th>Endereço 1</th><td><?php echo $_GET["endereco1"] ?? ""; ?></td></tr>
    <tr><th>Endereço 2</th><td><?php echo $_GET["endereco2"] ?? ""; ?></td></tr>
    <tr><th>Cidade</th><td><?php echo $_GET["cidade"] ?? ""; ?></td></tr>
    <tr><th>Distrito</th><td><?php echo $_GET["distrito"] ?? ""; ?></td></tr>
    <tr><th>Código Postal</th><td><?php echo $_GET["codigo"] ?? ""; ?></td></tr>
    <tr><th>Lembrar</th><td><?php echo isset($_GET["lembrar"]) ? "on" : "off"; ?></td></tr>
</table>

</div>
</body>
</html>
