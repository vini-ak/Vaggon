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

	<div id="tasks-container" class="d-flex flex-column align-items-center pt-5">
		<button href="" type="button" class="btn btn-lg btn-primary" title="" data-toggle="modal" data-target="#add-modal">Adicionar tarefa</button>

		<table class="table table-striped table-bordered mt-4">
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
								<a class="btn btn-sm btn-warning" href="<?php echo base_url('public/index.php/tarefas/editar/' . $c->id_tarefa) ?>" title="">Editar</a>
								<a class="btn btn-sm btn-outline-danger" href="<?php echo base_url('public/index.php/tarefas/deletar/' . $c->id_tarefa) ?>" title="">Excluir</a>
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
						        <input type="date" name="data_inicio_dia" class="mr-3">
					        </div>
					        <div class="form-group">
					    	    <input type="time" name="data_inicio_hora">
					        </div>
						</div>
						
					</div>
					<div>
						<h6>Término</h6>
						<div class="d-flex flex-row">
							<div class="form-group">
						        <input type="date" name="data_termino_dia" class="mr-3">
					        </div>
					        <div class="form-group">
					    	    <input type="time" name="data_termino_hora">
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
	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



</body>
</html>