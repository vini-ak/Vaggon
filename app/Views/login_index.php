<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class="d-flex flex-column">
	<form id="form-login" action="validar" method="post" accept-charset="utf-8" class="d-flex flex-column align-items-center py-2 px-4">
		<img src="vaggon-logo.png">
		<p>Organize suas tarefas e aumente a produtividade.</p>
		<h5 class="mt-3"><?php echo $msg ?></h5>

		<div class="d-flex flex-column mb-2">
			<label for="#email">Email</label>
			<input id="email" type="text" name="user_email">
		</div>

		<div class="d-flex flex-column">
			<label for="#password">Senha</label>
			<input id="#password" type="password" name="password">
		</div>
		<div class="d-flex flex-row justify-content-end align-items-center mt-4">
			<a href="<?php echo base_url('public/cadastro') ?>" title="">Cadastro</a>
			<input class="btn btn-primary ml-2" type="submit" name="Login" value="Entrar">
		</div>

	</form>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>	