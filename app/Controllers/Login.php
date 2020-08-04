<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index() 
	{
		return view('login_index');
	}

	public function validar() {
		if($this->request->getMethod() === 'post') {
			$data['msg'] = '';

			$loginModel = new \App\Models\LoginModel();

			$user_email = $this->request->getPost('user_email'); #EMAIL DO USUÁRIO
			$password = $this->request->getPost('password'); # SENHA DO USUÁRIO

			$db = \Config\Database::connect();
			$sql = "SELECT id_user, password FROM users WHERE user_email = ?";
			$query = $db->query($sql, [$user_email]);
			$result = $query->getResult();

			// Verificando se o email consta no BD
			// Verificar se a senha está correta
			if($result && $result[0]->password === $password) {
				// Iniciando a sessão do usuário passando o ID
				session_start();
				$_SESSION['id_user'] = $result[0]->id_user;

				// Acessando o dashboard desse usuário
				$url = 'Location: ' . base_url('public/dashboard/');
				header($url);
				exit;
				
			} else {
				base_url('/');				
				$data['msg'] = "O email não está cadastrado na nossa base de dados";
			}
		}
	}

	public function inserir() 
	{
		$data['titulo'] = "Cadastrar Usuário";
		$data['acao'] = "Inserir";
		$data['msg'] = '';

		if ($this->request->getMethod() === 'post') {
			$loginModel = new \App\Models\LoginModel();

			$user_email = $this->request->getPost('user_email'); # EMAIL DO USUÁRIO
			$pwd = $this->request->getPost('password'); # SENHA DO USUÁRIO

			if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
				// Verificando se o email do usuário é válido
				$data['msg'] = "Oops... O formato de email está inválido.";
			} 

			else if (strlen($pwd) < 8) {
				// Verificando se a senha tem 8 ou mais caracteres
				$data['msg'] = "A senha precisa ter no mínimo 8 caracteres.";
			}

			
			else {
				// Verificando se o email já está cadastrado no banco de dados.
				$db = \Config\Database::connect();

				$sql = "SELECT id_user FROM users WHERE user_email = ?";
				$query = $db->query($sql, [$user_email])->getResult();

				// Caso não esteja ele será adicionado. 
				// Se o email já estiver cadastrado, então será mostrada uma mensagem de erro.

				if (!$query) {
					$loginModel->set('user_email', $this->request->getPost('user_email'));
					$loginModel->set('password', $this->request->getPost('password'));

					if ($loginModel->insert()) {
						// a inserção ocorreu com sucesso
						$data['msg'] = "Usuário cadastrado com sucesso";
					} else {
						$data['msg'] = "Erro ao cadastrar usuário.";
					}
				}

				else {
					$data['msg'] = "O email já consta no nosso banco de dados.";
				}
			}			
		}

		echo view('signin_index', $data);
	}

}