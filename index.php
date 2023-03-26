<?php
include('config.php');
if ((isset($_POST["acao"]))) {
	$nome = $_POST["nome"];
    $email = $_POST["email"];
	$senha = $_POST["senha"];

	$sql = "INSERT INTO usuarios(nome,email,senha) VALUES ('{$nome}','{$email}','{$senha}')";
    $res = $con->query($sql);


	if (empty($_POST) or (empty($_POST["nome"])or (empty($_POST["email"]))or (empty($_POST["senha"])))) {
		echo "Campos vazios";
	}else{
		print "<script>alert('cadastrado com sucesso!')</script>";
		print "<script>window.location.href='login.php'</script>";
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$senha = md5($_POST["senha"]);
	
		$sql = "INSERT INTO usuarios(nome,email,senha) VALUES ('{$nome}','{$email}','{$senha}')";
		$res = $con->query($sql);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form method="POST">
		<h2>Cadastro</h2>
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="nome" required>
		<label for="email">E-mail:</label>
		<input type="email" id="email" name="email" required>
		<label for="senha">Senha:</label>
		<input type="password" id="senha" name="senha" required>
		<label for="confirma_senha">Confirmar senha:</label>
		<input type="password" id="confirma_senha" name="confirma_senha" required>
		<button name="acao" type="submit">Cadastrar</button>
	</form>
</body>
</html>
