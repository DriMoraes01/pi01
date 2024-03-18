<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Ramais extends CI_Controller {	

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
			'titulo' => 'Ramais do paço',
			'sub_titulo' => 'Listando os ramais cadastrados no sistema',
			'icone_view' => 'ik ik-phone',			
			'ramais' => $this->core_model->getRamais(),				
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
			),	
		);
		
		/*echo '<pre>';
		print_r($data['ramais']);
		exit();*/

		$this->load->view('layout/header',$data);
		$this->load->view('ramais/index');
		$this->load->view('layout/footer');		

	}
		
	public function cadastrar()
	{	
		$id =  $this->uri->segment(3);
		if (isset($id)){						
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());	
		}
		
		$this->form_validation->set_rules('departamento', 'Departamento', 'trim|min_length[1]|max_length[255]');		
		$this->form_validation->set_rules('ramal', 'Ramal', 'trim|min_length[1]|max_length[10]');				

		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Ramal do Paço',
				'sub_titulo' => 'Chegou a hora de cadastrar o ramal',
				'icone_view' => 'ik ik-phone',	
				'styles' => array(
					'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
				),
				'scripts' =>array(
					'plugins/datatables.net/js/jquery.dataTables.min.js',
					'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
				),												
			);				

			$this->load->view('layout/header',$data);
			$this->load->view('ramais/cadastrar');
			$this->load->view('layout/footer');	
		}else{
			//cadastrar						
			$data['departamento'] = $this->input->post('departamento');			
			$data['ramal'] = $this->input->post('ramal');								
			$data['excluido'] = 0;				

			$data = html_escape($data);				

			$this->core_model->insert('ramais_paco', $data);
			$this->session->set_flashdata('sucesso', 'Ramal cadastrado com sucesso!');
			redirect($this->router->fetch_class());	
		}	

	}	

	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('ramais_paco', array('id' => $id))){

			$this->session->set_flashdata('error', 'Ramal não encontrado!');
			redirect($this->router->fetch_class());

		}else{	

			$this->form_validation->set_rules('departamento', 'Departamento', 'trim|min_length[1]|max_length[255]');		
			$this->form_validation->set_rules('ramal', 'Ramal', 'trim|min_length[1]|max_length[10]');	
				
				
			if (!$this->form_validation->run()){

				$data = array(
					'titulo' => 'Editar Ramal',
					'sub_titulo' => 'Chegou a hora de editar o ramal',
					'icone_view' => 'ik ik-file-text',						
					'ramais' => $this->core_model->get_by_id('ramais_paco', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),				

				);			
				

				$this->load->view('layout/header',$data);
				$this->load->view('ramais/alterar');
				$this->load->view('layout/footer');

			}else{
				$data['departamento'] = $this->input->post('departamento');			
				$data['ramal'] = $this->input->post('ramal');								
				$data['excluido'] = 0;				


				$data = html_escape($data);				
	
				$this->core_model->update('ramais_paco', $data, array('id' => $id));
				$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
				redirect($this->router->fetch_class()); 				
			}		
		}	
		
	}		
	

	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('ramais_paco', array('id' => $id))){

			$this->session->set_flashdata('error', 'Ramal não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('ramais_paco', $data)) {       
				$this->session->set_flashdata('sucesso', 'Ramal excluído com sucesso!');				
			}
		}

		redirect($this->router->fetch_class());
	}	

}
	
		
	




		

		
	




