<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Alterar senha</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<div id="form-config" class="d-flex flex-column p-4">
		<h2>Nova Senha</h2>
		<small class="my-3"><b>* A senha deve conter no  mínimo oito caracteres entre.</b></small>
		<div>
			<form id="form-senha" action="<?php echo base_url('public/validarsenha'); ?>" method="post">
				<div class="d-flex flex-column mb-2">
					<label for="#senha1">Nova senha</label>	
					<input type="password" name="senha1" id="senha1">
				</div>
				<div class="d-flex flex-column mb-2">
					<label for="#senha2">Digite a nova senha novamente</label>	
					<input type="password" name="senha2" id="senha2">
				</div>
				<div class="d-flex flex-row align-items-center justify-content-end mt-4">
					<a href="<?php echo base_url('public/') ?>" title="">Voltar</a>
					<input type="submit" name="submit" value="Alterar senha" id="submit-senha" class="btn btn-primary ml-2">
				</div>
			</form>

		</div>
	</div>

	<div class="modal" id="modal-senha" tabindex="-1">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary">OK</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	$('#form-senha').submit(function(e) {
    		e.preventDefault();

    		let value1 = document.querySelector('#senha1').value;
    		let value2 = document.querySelector('#senha2').value;

    		console.log(document.querySelector('#senha1'));
    		console.log(document.querySelector('#senha2'));
    		if(value1 != value2) {
    			$('.modal-body > p').html("As senhas precisam ser iguais");
    		} else if (value1.length < 8) {
				$('.modal-body > p').html("As senhas precisam ter no mínimo oito digitos.");
    		} else {
    			let url = $(this).attr('action');
    			console.log(url);
    			let data = {
    				'senha1': value1,
    				'senha2': value2
    			}

    			$.ajax({
					type: 'ajax',
					url: url,
					data: data,
					method: 'post',
					async: true,
					dataType: 'json',
					success: function(data) {
						$('.modal-body > p').html(data['msg']);

					},
					error: function() {
						$('.modal-body > p').html("Não foi possível conectar ao banco de dados. Tente novamente mais tarde :/");
					}
				});
    		}
    		setTimeout(() => {
    			$('#modal-senha').modal('show');
    		}, 1000);


    		setTimeout(() => {
    			$('#modal-senha').modal('hide');
    		}, 4000);

    		setTimeout(() => {
    			window.location = 'https://localhost/Vaggon/public/dashboard';
    		}, 4800);

    	});
    </script>
	
</body>
</html>