<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Home extends CI_Controller {

	
	public function __construct()
	{
		parent:: __construct();
		
		//chama o controller login se o usuário não estiver logado
		if (!$this->ion_auth->logged_in())
		{
			redirect('login');
		}
	

	}

	public function index()
	{
		$this->load->model('home_model');
		$data = array(
			'titulo' => 'Home',
			'totContas' => $this->home_model->totContas(),
			'totUsers' => $this->home_model->totUsers(),
			'totSistema' => '1',
			'total_mensalidades' => $this->home_model->valorContas(),				
			
			'icone_view' => 'fas fa-dollar-sign',
			'styles' => array(
				'calendario/css/main.min.css',	
				'calendario/css/personalizado.css',			
			),

			'scripts' =>array(
				'calendario/js/main.min.js',
				'calendario/js/personalizado.js',				
			),		
			
			'mensalidades' => $this->core_model->get_all('mensalidades'),
			
		);		

		
		$this->load->view('layout/header',$data);		
		$this->load->view('home/index');
		$this->load->view('layout/footer'); 
	}


	
}
