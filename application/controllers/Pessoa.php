<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Pessoa extends CI_Controller {	

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
			'titulo' => 'Pessoas Cadastradas',
			'sub_titulo' => 'Listando as pessoas cadastradas no sistema',
			'icone_view' => 'ik ik-user',			
			'pessoas' => $this->core_model->getPessoas(),				
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
		$this->load->view('pessoa/index');
		$this->load->view('layout/footer');		

	}
		
	public function cadastrar()
	{	
		$id =  $this->uri->segment(3);
		if (isset($id)){						
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());	
		}

		$this->form_validation->set_rules('cpf', 'CPF', 'trim|min_length[1]|max_length[14]|required');
		$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]|required');		
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[5]|max_length[10]|required');
		$this->form_validation->set_rules('celular', 'Celular', 'trim|min_length[9]|max_length[14]|required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[9]|required');
		$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]|required');
		$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[50]|required');
		$this->form_validation->set_rules('complemento', 'Complemento', 'trim|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[1]|max_length[100]|required');
		$this->form_validation->set_rules('localidade', 'Cidade', 'trim|min_length[1]|max_length[50]|required');
		$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]|required');		
		$this->form_validation->set_rules('data_cadastro', 'Data de Cadastro', 'trim|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'trim|min_length[1]|max_length[20]');
		
		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Pessoa',				
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
			$this->load->view('pessoa/cadastrar');
			$this->load->view('layout/footer');	
		}else{

			//cadastrar					
			$data['cpf'] = $this->input->post('cpf');				
			$data['nome'] = $this->input->post('nome');			
			$data['sexo'] = $this->input->post('sexo');
			$data['celular'] = $this->input->post('celular');
			$data['email'] = $this->input->post('email');
			$data['cep'] = $this->input->post('cep');
			$data['logradouro'] = $this->input->post('logradouro');
			$data['numero'] = $this->input->post('numero');
			$data['complemento'] = $this->input->post('complemento');			
			$data['bairro'] = $this->input->post('bairro');			
			$data['localidade'] = $this->input->post('localidade');
			$data['uf'] = $this->input->post('uf');
			$data['data_cadastro'] = $this->input->post('data_cadastro');
			$data['data_nascimento'] = $this->input->post('data_nascimento');
			$data['voluntario'] = $this->input->post('voluntario');			
			//$data['ultima_alteracao'] = $this->input->post('ultima_alteracao');					

			$data = html_escape($data);				

			$this->core_model->insert('pessoa', $data);
			$this->session->set_flashdata('sucesso', 'Pessoa cadastrada com sucesso!');
			redirect($this->router->fetch_class());	
		}	

	}	


	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('pessoa', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());

		}else{
			
			$this->form_validation->set_rules('cpf', 'CPF', 'trim|min_length[1]|max_length[14]|required');
			$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]|required');
			$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[5]|max_length[10]|required');
			$this->form_validation->set_rules('celular', 'Celular', 'trim|min_length[9]|max_length[14]|required');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[9]|required');
			$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]|required');
			$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[50]|required');
			$this->form_validation->set_rules('complemento', 'Complemento', 'trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[1]|max_length[100]|required');
			$this->form_validation->set_rules('localidade', 'Cidade', 'trim|min_length[1]|max_length[50]|required');
			$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]|required');
			$this->form_validation->set_rules('data_cadastro', 'Data de Cadastro', 'trim|min_length[1]|max_length[20]|required');
			$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('observacao', 'Observacao', 'trim|min_length[1]|max_length[3000]');
			
			if (!$this->form_validation->run()){
						
				
				$data = array(
					'titulo' => 'Editar Cadastro',					
					'icone_view' => 'ik ik-user',						
					'pessoas' => $this->core_model->get_by_id('pessoa', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),					

				);		
				

				$this->load->view('layout/header', $data);
				$this->load->view('pessoa/alterar');
				$this->load->view('layout/footer');

			}else{
				$data['cpf'] = $this->input->post('cpf');
				$data['nome'] = $this->input->post('nome');				
				$data['sexo'] = $this->input->post('sexo');
				$data['celular'] = $this->input->post('celular');
				$data['email'] = $this->input->post('email');
				$data['cep'] = $this->input->post('cep');
				$data['logradouro'] = $this->input->post('logradouro');
				$data['numero'] = $this->input->post('numero');
				$data['complemento'] = $this->input->post('complemento');
				$data['bairro'] = $this->input->post('bairro');
				$data['localidade'] = $this->input->post('localidade');
				$data['uf'] = $this->input->post('uf');
				$data['data_cadastro'] = $this->input->post('data_cadastro');
				$data['voluntario'] = $this->input->post('voluntario');
				$data['data_nascimento'] = $this->input->post('data_nascimento');	
				$data['ultima_alteracao'] = $this->input->post('ultima_alteracao');						
				
				$data = html_escape($data);				
	
				if (!$this->core_model->update('pessoa', $data, array('id' => $id))){
					$this->session->set_flashdata('erro', 'Dados  não foram atualizados');
					redirect($this->router->fetch_class()); 	
				} else {
					$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
					redirect($this->router->fetch_class());
				}
								 				
			}		
		}	
		
	}

	
	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('pessoa', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('pessoa', $data)) {       
				$this->session->set_flashdata('sucesso', 'Cadastro excluído com sucesso!');				
			}
		}
		
		redirect($this->router->fetch_class());
	}

	private function do_upload()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5000;
		$config['overwrite']             = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());

			return $error;
		} else {
			$data = array('upload_data' => $this->upload->data());

			return $data;
		}
	}

}
	
		
	




		

		
	




