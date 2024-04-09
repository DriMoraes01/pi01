<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Sistema extends CI_Controller {


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
		$this->form_validation->set_rules('sistema_nome', 'Nome','trim|min_length[5]|max_length[100]');	
		$this->form_validation->set_rules('sistema_site_url', 'URL do site','trim|valid_url|max_length[100]');	
		$this->form_validation->set_rules('sistema_email', 'E-mail de contato','trim|valid_email|max_length[255]');		
		

		if($this->form_validation->run()){
			
			$data = elements(
				array(
					'sistema_nome',
					'sistema_site_url',
					'sistema_email'					
				),$this->input->post()
			);

			//Sanitizar Dados
			$data = html_escape($data);

			$this->core_model->update('sistema', $data, array('sistema_id' => 1));

			redirect($this->router->fetch_class());

		}else{
			//Erro de validação

			$data = array(

				'titulo' => 'Editar informações do sistema',
				'sub_titulo' => 'Chegou a hora de editar as informações do sistema',
				'icone_view' => 'ik ik-settings',
				
				'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),			
			);		
	
	
			$this->load->view('layout/header', $data);
			$this->load->view('sistema/index');
			$this->load->view('layout/footer');

		}

	}

	
}
