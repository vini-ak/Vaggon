<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo ?></title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<h2 class="mt-5"><?php echo $titulo; ?></h2>
	<h5 class="text-center mt-3"><?php echo $msg; ?></h5>

	<div id="form-config" class="d-flex flex-column pt-1 px-5">
		<img src="vaggon-logo.png" class="align-self-center"> 
		<form method="post" accept-charset="utf-8" class="d-flex flex-column align-items-end">
			<div class="d-flex flex-column mt-4 mb-2 w-100">
				<label for="">Email</label>
				<input type="text" name="user_email" placeholder="Insira seu email">
			</div>
			<div class="d-flex flex-column mb-2 w-100">
				<label for="">Senha</label>
				<input type="password" name="password" placeholder="Escolha uma senha">
			</div>
			<div class="d-flex flex-row align-items-center justify-content-end mt-4">
				<a href="<?php echo base_url('public/') ?>">Voltar</a>
				<input type="submit" name="" value="<?php echo $acao; ?>"  class="btn btn-primary ml-2">
			</div>
			
		</form>
	</div>


	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>