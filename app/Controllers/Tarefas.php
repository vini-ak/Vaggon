<?php namespace App\Controllers;

/**
 * 
 */
class Tarefas extends BaseController
{
	public function index() {
		$tarefasModel = new \App\Models\TarefasModel();
		$data['categorias'] = $tarefasModel->find();

		echo view('tarefas_index', $data);
	}

	public function editar($id_tarefa) 
	{
		$data['msg'] = '';

		$tarefasModel = new \App\Models\TarefasModel();
		$tarefa = $tarefasModel->find($id_tarefa);

		if ($this->request->getMethod() === 'post') {
			# code...
		}

		$data['tarefa'] = $tarefa;
		echo view('tarefas_index', $data);
	}

	public function deletar() {

	}

}