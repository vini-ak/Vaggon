<?php namespace App\Models;

use CodeIgniter\Model;

/**
 MODEL RESPONSÁVEL POR LOGIN E CADASTRO DO USUÁRIO. 
 */
class LoginModel extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id_user';
	protected $allowedFields = ['user_email', 'password'];
	protected $returnType = 'object';
}

