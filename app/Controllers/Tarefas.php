<?php namespace App\Controllers;

/**
 * 
 */
class Tarefas extends BaseController
{
	public function index() {
		return view('tarefas_index');
	}
}