<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<h2 class="my-4"><i>Opa, bem vindo! Vamos ser produtivos?</i></h2>

	<div id="tasks-container" class="d-flex flex-column align-items-center pt-4">
		<button href="" type="button" id="create-task" class="btn btn-lg btn-primary" title="" data-toggle="modal" data-target="#add-modal">Adicionar tarefa</button>

		<table class="table table-striped table-bordered mt-5">
			<thead>
				<tr>
					<th>Titulo</th>
					<th colspan="7">Descrição</th>
					<th>Data Início</th>
					<th>Data Término</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if($tarefas) {
					foreach ($tarefas as $c) { 
					?>
						<tr>
							<td><?php echo $c->titulo ?></td>
							<td colspan="7"><?php echo $c->descricao; ?></td>
							<td ><?php echo $c->data_inicio; ?></td>
							<td><?php echo $c->data_termino; ?></td>
							<td class="d-flex flex-column justify-content-between align-items-center">
								<input type="hidden" name="" value="<?php echo $c->id_tarefa; ?>">
								<a class="btn btn-sm btn-warning editar" href="<?php echo base_url('public/index.php/tarefas/gettarefa/' . $c->id_tarefa) ?>" title="">Editar</a>
								<!-- data-toggle="modal" data-target="#add-modal"  -->
								<a class="btn btn-sm btn-outline-danger mt-2" href="<?php echo base_url('public/index.php/tarefas/deletar/' . $c->id_tarefa) ?>" title="">Excluir</a>
							</td>
						</tr>
					<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>

    <!--MODAL -->
	<div class="modal fade" id="add-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Adicionar </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<form id="form-tarefas" action="<?php echo base_url('public/inserirtarefa'); ?>" method="post">
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" name="titulo" id="titulo" class="form-control">
					</div>
					<div class="form-group">
					    <label for="descricao">Descrição</label>
					    <textarea name="descricao" id="descricao" class="form-control" placeholder="Fale um pouco sobre o que precisa ser feito..."></textarea>
					</div>
					
					<div>
						<h6>Início</h6>
						<div class="d-flex flex-row">
							<div class="form-group">
						        <input type="date" id="data_inicio_dia" name="data_inicio_dia" class="mr-3">
					        </div>
					        <div class="form-group">
					    	    <input type="time" id="data_inicio_hora" name="data_inicio_hora">
					        </div>
						</div>
						
					</div>
					<div>
						<h6>Término</h6>
						<div class="d-flex flex-row">
							<div class="form-group">
						        <input type="date" id="data_termino_dia" name="data_termino_dia" class="mr-3">
					        </div>
					        <div class="form-group">
					    	    <input type="time" id="data_termino_hora" name="data_termino_hora">
					        </div>
						</div>
						
					</div>
					<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input  type="submit" class="btn btn-primary" value="Adicionar"></input>
                    </div>
				</form>
            </div>
            
          </div>
        </div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

 

	<script type="text/javascript" charset="utf-8">

		$("#create-task").click(function(e) {
			e.preventDefault();
			$('.modal-title').html('Adicionar');
			$("#titulo").attr("placeholder", " ");
			$("#descricao").attr("placeholder", "Fale um pouco sobre o que precisa ser feito...");
			$('#form-tarefasl').attr("action", "<?php echo base_url('public/inserirtarefa'); ?>");
		});



		$(".editar").click(function(e) {
			e.preventDefault();

			let url = $(this).attr("href");


			$.ajax({
				type: 'ajax',
				url: url,
				method: 'post',
				async: true,
				dataType: 'json',
				success: function(data) {

					$('.modal-title').html('Editar Tarefa');
					$("#titulo").attr("placeholder", data['titulo']);
					$("#descricao").attr("placeholder", data['descricao']);
					
					data_inicio = data['data_inicio'].split();
					let data_inicio_dia = data_inicio[0];
					let data_inicio_hora = data_inicio[1];

					$('data_inicio_dia').attr("placeholder", data_inicio_dia);
					$('data_inicio_hora').attr("placeholder", data_inicio_hora);

					let link = url.replace('gettarefa', 'editar');
					$('#form-tarefas').attr("action", link);


					$('#add-modal').modal('show');

				},
				error: function() {
					console.log("Não foi possível conectar ao banco de dados");
				}
			});
		})

	</script>



</body>
</html>