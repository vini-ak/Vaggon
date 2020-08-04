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
	<h2>MINHAS TAREFAS</h2>

	<div id="tasks-container" class="d-flex flex-column align-items-center pt-5">
		<a href="" class="btn btn-success" title="">Adicionar tarefa</a>

		<table class="table mt-4">
			<thead>
				<tr>
					<th colspan="1" class="col">ID</th>
					<th colspan="5" class="col">Titulo</th>
					<th colspan="7" class="col">Descrição</th>
					<th colspan="4" class="col">Data Início</th>
					<th colspan="4" class="col">Data Término</th>
					<th colspan="3" class="col">Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if($tarefas) {
					foreach ($tarefas as $c) { 
					?>
						<tr>
							<td><?php echo $c->id_tarefa ?></td>
							<td><?php echo $c->titulo ?></td>
							<td colspan="5"><?php echo $c->descricao; ?></td>
							<td ><?php echo $c->data_inicio; ?></td>
							<td><?php echo $c->data_termino; ?></td>
							<td>
								<a href="<?php echo base_url('public/index.php/tarefas/editar/' . $c->id_tarefa) ?>" title="">Editar</a>
								<a href="<?php echo base_url('public/index.php/tarefas/deletar/' . $c->id_tarefa) ?>" title="">Excluir</a>
							</td>
						</tr>
					<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>