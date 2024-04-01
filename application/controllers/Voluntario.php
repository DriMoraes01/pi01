<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Voluntario extends CI_Controller {	

	public function __construct()
	{
		parent:: __construct();

		//chama o controller login se o usuário não estiver logado
		/*if (!$this->ion_auth->logged_in())
		{
			redirect('login');
		}*/

	}
	
	public function index()
	{			
		$data = array(
			'titulo' => 'Voluntários Cadastrados',
			'sub_titulo' => 'Listando os voluntários cadastrados no sistema',
			'icone_view' => 'ik ik-user',			
			'voluntarios' => $this->core_model->get_by_voluntario(),				
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
			),	
		);
		
		$this->load->view('layout/header',$data);
		$this->load->view('voluntario/index');
		$this->load->view('layout/footer');		

		/*echo "<pre>";
		var_dump('voluntarios');*/

	}
		
	
	


}
	
		
	




		

		
	




