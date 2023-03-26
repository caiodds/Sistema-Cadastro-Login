<?php
include('config.php');
if ((isset($_POST["acao"]))) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["email"])||isset($_POST["senha"])) {
	  $email = mysqli_real_escape_string($con, $_POST["email"] );
	  $senha = mysqli_real_escape_string($con, $_POST["senha"] );
	} 
	$query = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
  	$result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    // Redirecionar para uma página de boas-vindas ou executar ação desejada
	print "<script>window.location.href='perfil.php'</script>";
	exit();
  } else {
    // Exibir mensagem de erro
    print "<script>alert('erro')</script>";
  }
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form method="POST">
		<h2>Login</h2>
		<label for="email">E-mail:</label>
		<input type="email" id="email" name="email" required>
		<label for="senha">Senha:</label>
		<input type="password" id="senha" name="senha" required>
		<button name="acao" type="submit">Entrar</button>
	</form>
</body>
</html>
