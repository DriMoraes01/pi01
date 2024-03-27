<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Doacao extends CI_Controller {	

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
			'titulo' => 'Doações Cadastradas',
			'sub_titulo' => 'Listando os animais cadastrados no sistema',
			'icone_view' => 'ik ik-user',			
			'doacoes' => $this->core_model->get_all('doacao', array('excluido' => 0)),				
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
		$this->load->view('doacao/index');
		$this->load->view('layout/footer');	

	}
		
	public function cadastrar()
	{	
		$id =  $this->uri->segment(3);
		if (isset($id)){						
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());	
		}

		$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]|required');		
		$this->form_validation->set_rules('valor', 'Valor', 'trim|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|min_length[1]|max_length[20]|required');
		$this->form_validation->set_rules('email ', 'E-mail', 'trim|min_length[1]|max_length[10]');		
		$this->form_validation->set_rules('data_doacao', 'Data Da Doação', 'trim|min_length[1]|max_length[10]');
		//$this->form_validation->set_rules('excluido', 'Excluido', 'exact_length[1]');
		
		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Doação',				
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
			$this->load->view('doacao/cadastrar');
			$this->load->view('layout/footer');	
		}else{

			//cadastrar					
			$data['nome'] = $this->input->post('nome');			
			$data['valor'] = $this->input->post('valor');
			$data['cpf'] = $this->input->post('cpf');
			$data['email'] = $this->input->post('email');
			$data['data_doacao'] = $this->input->post('data_doacao');				

			$data = html_escape($data);				

			$this->core_model->insert('doacao', $data);
			$this->session->set_flashdata('sucesso', 'Doação cadastrada com sucesso!');
			redirect($this->router->fetch_class());	
		}	
	}	

	
	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('doacao', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());

		}else{

			$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('valor', 'Raça', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('cpf', 'CPF', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('data_doacao', 'Data da Doação', 'trim|min_length[1]|max_length[255]');
			
			if (!$this->form_validation->run()){

				$data = array(
					'titulo' => 'Editar Cadastro',					
					'icone_view' => 'ik ik-user',						
					'doacoes' => $this->core_model->get_by_id('doacao', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),			
				);							

				$this->load->view('layout/header',$data);
				$this->load->view('doacao/alterar');
				$this->load->view('layout/footer');

			}else{

				$data['nome'] = $this->input->post('nome');
				$data['valor'] = $this->input->post('valor');
				$data['cpf'] = $this->input->post('cpf');
				$data['email'] = $this->input->post('email');
				$data['data_doacao'] = $this->input->post('data_doacao');			
				
				$data = html_escape($data);					
	
				$this->core_model->update('doacao', $data, array('id' => $id));

				$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
				redirect($this->router->fetch_class()); 				
			}		
		}	
		
	}

	
	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('doacao', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('doacao', $data)) {       
				$this->session->set_flashdata('sucesso', 'Cadastro excluído com sucesso!');				
			}
		}
		
		redirect($this->router->fetch_class());
	} 	

}
	
		
	




		

		
	




