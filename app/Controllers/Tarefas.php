<?php namespace App\Controllers;

/**
 * 
 */
class Tarefas extends BaseController
{
	public function index() {
		session_start();
		if($_SESSION['id_user']) {
			$tarefasModel = new \App\Models\TarefasModel();

			$db = \Config\Database::connect();
			
			$sql = "SELECT * FROM tasks WHERE id_user = ?";
		    $query = $db->query($sql, [$_SESSION['id_user']]);

		    $data['tarefas'] = $query->getResult();

		    echo view('tarefas_index', $data);
		}
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