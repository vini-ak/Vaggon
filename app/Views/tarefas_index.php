<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<h2>MINHAS TAREFAS</h2>
	<a href="" title="">Adicionar tarefa</a>

	<table>
		<thead>
			<tr>
				<th colspan="1" rowspan="1">ID</th>
				<th colspan="3" rowspan="1">Titulo</th>
				<th colspan="5" rowspan="2">Descrição</th>
				<th colspan="2" rowspan="1">Data Início</th>
				<th colspan="2" rowspan="1">Data Término</th>
				<th colspan="2" rowspan="2">Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($tarefas as $c) { 
			?>
				<tr>
					<td colspan="1" rowspan="1"><?php echo $c->id_tarefa ?></td>
					<td colspan="3" rowspan="1"><?php echo $c->titulo ?></td>
					<td colspan="5" rowspan="2"><?php echo $c->descricao; ?></td>
					<td colspan="2" rowspan="1"><?php echo $c->data_inicio; ?></td>
					<td colspan="2" rowspan="1"><?php echo $c->data_termino; ?></td>
					<td colspan="2" rowspan="2">
						<a href="<?php echo base_url('public/index.php/tarefas/editar/' . $c->id_tarefa) ?>" title="">Editar</a>
						<a href="<?php echo base_url('public/index.php/tarefas/deletar/' . $c->id_tarefa) ?>" title="">Excluir</a>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>