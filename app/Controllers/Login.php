<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index() 
	{
		return view('login_index');
	}

	public function inserir() 
	{
		$data['titulo'] = "Cadastrar Usuário";
		$data['acao'] = "Inserir";
		$data['msg'] = '';

		if ($this->request->getMethod() === 'post') {
			$loginModel = new \App\Models\LoginModel();
			$loginModel->set('user_email', $this->request->getPost('user_email'));
			$loginModel->set('password', $this->request->getPost('password'));

			
			if ($loginModel->insert()) {
				// a inserção ocorreu com sucesso
				$data['msg'] = "Usuário cadastrado com sucesso";
			} else {
				$data['msg'] = "Erro ao cadastrar usuário.";
			}
		}

		echo View('signin_index', $data);
	}

}