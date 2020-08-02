<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class TarefasModel extends Model
{
	protected $table = 'tasks';
	protected $primaryKey = 'id_tarefa';
	protected $allowedFields = ['titulo', 'descricao', 'data_inicio', 'data_termino', 'ativo', 'id_user'];
	protected $returnType = 'object';
}