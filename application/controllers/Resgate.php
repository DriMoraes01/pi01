<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Resgate extends CI_Controller {	

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
			'titulo' => 'Resgates Cadastrados',
			'sub_titulo' => 'Listando as pessoas cadastradas no sistema',
			'icone_view' => 'ik ik-user',			
			'resgates' => $this->core_model->get_all(),				
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
			),	
		);
		
		/*echo '<pre>';
		print_r($data['pessoas']);
		exit();*/

		$this->load->view('layout/header',$data);
		$this->load->view('resgate/index');
		$this->load->view('layout/footer');		

	}
		
	public function cadastrar()
	{	
		$id =  $this->uri->segment(3);
		if (isset($id)){						
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());	
		}

		$this->form_validation->set_rules('animal', 'Tipo de Animal', 'trim|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('data_resgate', 'Data do Resgate', 'trim|min_length[1]|max_length[20]');		
		$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[9]');
		$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[8]|max_length[100]');		
		$this->form_validation->set_rules('localidade', 'Cidade', 'trim|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]');
		$this->form_validation->set_rules('obs', 'Observação', 'trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('complemento', 'Complemento', 'trim|min_length[1]|max_length[20]');
		
		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Resgate',				
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
			$this->load->view('resgate/cadastrar');
			$this->load->view('layout/footer');	
		}else{

			//cadastrar					
			$data['animal'] = $this->input->post('animal');				
			$data['data_resgate'] = $this->input->post('data_resgate');			
			$data['cep'] = $this->input->post('cep');		
			$data['logradouro'] = $this->input->post('logradouro');
			$data['numero'] = $this->input->post('numero');
			$data['bairro'] = $this->input->post('bairro');
			$data['localidade'] = $this->input->post('localidade');
			$data['uf'] = $this->input->post('uf');
			$data['obs'] = $this->input->post('obs');
			$data['sexo'] = $this->input->post('sexo');
			$data['complemento'] = $this->input->post('complemento');	
			$data['ultima_alteracao'] = $this->input->post('ultima_alteracao');					

			$data = html_escape($data);				

			$this->core_model->insert('resgate_animal', $data);
			$this->session->set_flashdata('sucesso', 'Resgate cadastrado com sucesso!');
			redirect($this->router->fetch_class());	
		}	

	}	


	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('resgate_animal', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());

		}else{
			$this->form_validation->set_rules('animal', 'Tipo de Animal', 'trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('data_resgate', 'Data do Resgate', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[9]');
			$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[8]|max_length[100]');
			$this->form_validation->set_rules('localidade', 'Cidade', 'trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]');
			$this->form_validation->set_rules('obs', 'Observação', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('complemento', 'Complemento', 'trim|min_length[1]|max_length[20]');
				
		
				
			if (!$this->form_validation->run()){

				$data = array(
					'titulo' => 'Editar Cadastro',					
					'icone_view' => 'ik ik-user',						
					'resgates' => $this->core_model->get_by_id('resgate_animal', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),					

				);			
				

				$this->load->view('layout/header',$data);
				$this->load->view('resgate/alterar');
				$this->load->view('layout/footer');

			}else{
				$data['animal'] = $this->input->post('animal');
				$data['data_resgate'] = $this->input->post('data_resgate');
				$data['cep'] = $this->input->post('cep');
				$data['logradouro'] = $this->input->post('logradouro');
				$data['numero'] = $this->input->post('numero');
				$data['bairro'] = $this->input->post('bairro');
				$data['localidade'] = $this->input->post('localidade');
				$data['uf'] = $this->input->post('uf');
				$data['obs'] = $this->input->post('obs');
				$data['sexo'] = $this->input->post('sexo');
				$data['complemento'] = $this->input->post('complemento');
				$data['ultima_alteracao'] = $this->input->post('ultima_alteracao');					

				$data = html_escape($data);				
	
				$this->core_model->update('resgate_animal', $data, array('id' => $id));


				$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
				redirect($this->router->fetch_class()); 				
			}		
		}	
		
	}

	
	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('resgate_animal', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('resgate_animal', $data)) {       
				$this->session->set_flashdata('sucesso', 'Cadastro excluído com sucesso!');				
			}
		}
		
		redirect($this->router->fetch_class());
	} 	

}
	
		
	




		

		
	




