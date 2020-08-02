<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h2><?php echo $titulo; ?></h2>
	<strong><?php echo $msg; ?></strong>

	<form method="post" accept-charset="utf-8">
		<div>
			<label for="">Email</label>
			<input type="text" name="user_email" placeholder="Insira seu email">
		</div>
		<div>
			<label for="">Nova Senha</label>
			<input type="password" name="password" placeholder="Escolha uma senha">
		</div>

		<input type="submit" name="" value="<?php echo $acao; ?>" >
	</form>
</body>
</html>