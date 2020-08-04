<?php namespace App\Controllers;

/**
 * 
 */
class Tarefas extends BaseController
{
	public function index() {
		session_start();
		if(isset($_SESSION['id_user'])) {
			$tarefasModel = new \App\Models\TarefasModel();

			$db = \Config\Database::connect();
			
			$sql = "SELECT * FROM tasks WHERE id_user = ? AND ativo = 1 ORDER BY data_inicio";
		    $query = $db->query($sql, [$_SESSION['id_user']]);

		    $data['tarefas'] = $query->getResult();

		    echo view('tarefas_index', $data);
		} else {
			$url = "Location: " . base_url('/');
			header($url);
			exit;
		}
	}

	public function inserir() {
		if($this->request->getMethod() === 'post') {
			print_r($this->request->getPost()) ;


			$tarefasModel = new \App\Models\TarefasModel();

			$tarefasModel->set('titulo', $this->request->getPost('titulo'));
			$tarefasModel->set('descricao', $this->request->getPost('descricao'));

			// Tratando o datetime
			$data_inicio = $this->request->getPost('data_inicio_dia') . " " . $this->request->getPost('data_inicio_hora') .":00";

			$data_termino = $this->request->getPost('data_termino_dia') . " " . $this->request->getPost('data_termino_hora') .":00";


			$tarefasModel->set('data_inicio', $data_inicio);
			$tarefasModel->set('data_termino', $data_termino);

			// Passando o id do usuario
			session_start();
			$tarefasModel->set('id_user', $_SESSION['id_user']);

			if($tarefasModel->insert()) {
				$url = 'Location: ' . base_url('public/dashboard/');
				header($url);
				exit;
			} else {
				echo "nao funcionou";;
			}
		}
	}

	public function editar($id_tarefa) 
	{
		$data['msg'] = '';

		$tarefasModel = new \App\Models\TarefasModel();
		$tarefa = $tarefasModel->find($id_tarefa);

		// Tratando o datetime
		$data_inicio = $this->request->getPost('data_inicio_dia') . " " . $this->request->getPost('data_inicio_hora') .":00";

		$data_termino = $this->request->getPost('data_termino_dia') . " " . $this->request->getPost('data_termino_hora') .":00";

		if ($this->request->getMethod() === 'post') {
			// Verifica se o título está vazio dps de ser atualizado.
			// Caso o título nao tenha sido passado na atualização, o título anterior será mantido.
			$tarefa->titulo = strlen($this->request->getPost('titulo')) > 0 ? $this->request->getPost('titulo') : $tarefa->titulo;

			// Verifica a descricao está vazia. Se tiver sido passado algum texto, entao o campo será atualizado. 
			// Caso contrario, o valor anterior será mantido.
			$tarefa->descricao = strlen($this->request->getPost('descricao')) > 0 ? $this->request->getPost('titulo') : $tarefa->descricao;

			// A mesma lógica acima serve para as datas
			$tarefa->data_inicio = strlen($data_inicio) ? $data_inicio : $tarefa->data_inicio;

			$tarefa->data_termino = strlen($data_termino) ? $data_termino : $tarefa->data_termino;

			if ($tarefasModel->update($id, $tarefa)) {
				$url = 'Location: ' . base_url('public/dashboard/');
				header($url);
				exit;
			} else {
				echo "deu errado o update";
			}
		}

		$data['tarefa'] = $tarefa;
		echo view('tarefas_index', $data);
	}

	public function deletar($id_tarefa) {
		// Em vez de excluid, estou atualizando inativando a visibilidade por meio do coluna 'ativo', setando o valor para 0;
		$tarefasModel = new \App\Models\TarefasModel();
		if($tarefasModel->update($id_tarefa, ['ativo' => 0])) {
			$url = 'Location: ' . base_url('public/dashboard/');
			header($url);
			exit;
		}
	}

}