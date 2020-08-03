<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h2>LOGIN</h2>
	<p>Organize suas tarefas e aumente a produtividade.</p>
	<form action="" method="post" accept-charset="utf-8">
		<div>
			<label for="#email">Email</label>
			<input id="email" type="text" name="user_email">
		</div>

		<div>
			<label for="#password">Senha</label>
			<input id="#password" type="password" name="password">
		</div>

		<a href="<?php echo base_url('public/index.php/login/inserir') ?>" title="">Cadastro</a>
		<input type="submit" name="Login" value="Entrar">

	</form>
</body>
</html>	