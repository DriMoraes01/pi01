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
			'totAnimais' => $this->home_model->totAnimais(),
			'totVoluntarios' => $this->home_model->totVoluntarios(),			
			'totDoacoes' => $this->home_model->totDoacoes(),
			'totAdocoes' => $this->home_model->totAdocoes(),
			'totResgates' => $this->home_model->totResgates(),
			'totUsers' => $this->home_model->totUsers(),				
			
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
