<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<link rel="stylesheet" href="">
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
			foreach ($categorias as $c) { 
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
</body>
</html>