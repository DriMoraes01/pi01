<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Animal extends CI_Controller {	

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
			'titulo' => 'Animais Cadastrados',
			'sub_titulo' => 'Listando os animais cadastrados no sistema',
			'icone_view' => 'ik ik-user',			
			'animais' => $this->core_model->getAnimais(),			
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
			),	
		);
		
		/*echo '<pre>';
		print_r($data['resgates']);
		exit();*/
		
		$this->load->view('layout/header',$data);
		$this->load->view('animal/index');
		$this->load->view('layout/footer');	

	}
		
	public function cadastrar()
	{	
		$id =  $this->uri->segment(3);
		if (isset($id)){						
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());	
		}

		$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]');		
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('raca', 'Raça', 'trim|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('porte', 'Porte', 'trim|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('cor', 'Cor', 'trim|min_length[1]|max_length[9]');
		$this->form_validation->set_rules('data_cadastro', 'Data de Cadastro', 'trim|min_length[1]|max_length[10]|required');
		$this->form_validation->set_rules('observacao', 'Observação', 'trim|min_length[1]|max_length[255]');
		//$this->form_validation->set_rules('excluido', 'Excluido', 'exact_length[1]');
		
		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Animal',				
				'icone_view' => 'ik ik-user',	
				'styles' => array(
					'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
				),
				'scripts' =>array(
					'plugins/datatables.net/js/jquery.dataTables.min.js',
					'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
				),												
			);				
			
			$this->load->view('layout/header',$data);
			$this->load->view('animal/cadastrar');
			$this->load->view('layout/footer');	
		}else{

			//cadastrar					
			$data['nome'] = $this->input->post('nome');			
			$data['sexo'] = $this->input->post('sexo');
			$data['raca'] = $this->input->post('raca');
			$data['porte'] = $this->input->post('porte');
			$data['cor'] = $this->input->post('cor');
			$data['data_cadastro'] = $this->input->post('data_cadastro');
			$data['observacao'] = $this->input->post('observacao');
			$data['castrado'] = $this->input->post('castrado');
			$data['tipo_animal'] = $this->input->post('tipo_animal');
			//$data['ultima_alteracao'] = $this->input->post('ultima_alteracao');
			//$data['excluido'] = $this->input->post('excluido');			

			$data = html_escape($data);				

			$this->core_model->insert('animal', $data);
			$this->session->set_flashdata('sucesso', 'Animal cadastrado com sucesso!');
			redirect($this->router->fetch_class());	
		}	

	}	

	
	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('animal', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());

		}else{

			$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[5]|max_length[10]');
			$this->form_validation->set_rules('raca', 'Raça', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('porte', 'Porte', 'trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('cor', 'Cor', 'trim|min_length[1]|max_length[9]');
			$this->form_validation->set_rules('observacao', 'Observação', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('foto_animal', 'Foto do Animal', 'trim|min_length[1]|max_length[255]');
				
			if (!$this->form_validation->run()){

				$data = array(
					'titulo' => 'Editar Cadastro',					
					'icone_view' => 'ik ik-user',						
					'animais' => $this->core_model->get_by_id('animal', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),					

				);							

				$this->load->view('layout/header',$data);
				$this->load->view('animal/alterar');
				$this->load->view('layout/footer');

			}else{

				$data['nome'] = $this->input->post('nome');
				$data['sexo'] = $this->input->post('sexo');
				$data['raca'] = $this->input->post('raca');
				$data['porte'] = $this->input->post('porte');
				$data['cor'] = $this->input->post('cor');				
				$data['observacao'] = $this->input->post('observacao');
				$data['foto_animal'] = $this->input->post('foto_animal');				
				
				$data = html_escape($data);			
				
	
				$this->core_model->update('animal', $data, array('id' => $id));

				$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
				redirect($this->router->fetch_class()); 				
			}		
		}	
		
	}

	
	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('animal', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('animal', $data)) {       
				$this->session->set_flashdata('sucesso', 'Cadastro excluído com sucesso!');				
			}
		}
		
		redirect($this->router->fetch_class());
	} 	

}
	
		
	




		

		
	




