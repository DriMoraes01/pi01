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
			'voluntarios' => $this->core_model->get_by_id('pessoas', array('excluido' => 0)),				
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

	}
		
	public function cadastrar()
	{	
		$id =  $this->uri->segment(3);
		if (isset($id)){						
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());	
		}

		$this->form_validation->set_rules('cpf', 'CPF', 'trim|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('nome_adotante', 'Nome do Adotante', 'trim|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', 'trim|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('celular', 'Celular', 'trim|min_length[1]|max_length[20]');		
		$this->form_validation->set_rules('nome_animal', 'Nome de Animal', 'trim|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('sexo_animal', 'Sexo do Animal', 'trim|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('tipo_animal', 'Tipo de Animal', 'trim|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('data_adocao', 'Data da Adoção', 'trim|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[10]');
		$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[1]|max_length[100]');		
		$this->form_validation->set_rules('localidade', 'Cidade', 'trim|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]');
		$this->form_validation->set_rules('observacao', 'Observação', 'trim|min_length[1]|max_length[255]');
		
		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Adoção',				
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
			$this->load->view('adocao/cadastrar');
			$this->load->view('layout/footer');	
		}else{

			//cadastrar	
			$data['cpf'] = $this->input->post('cpf');
			$data['nome_adotante'] = $this->input->post('nome_adotante');
			$data['email'] = $this->input->post('email');
			$data['celular'] = $this->input->post('celular');
			$data['nome_animal'] = $this->input->post('nome_animal');
			$data['sexo_animal'] = $this->input->post('sexo_animal');
			$data['tipo_animal'] = $this->input->post('tipo_animal');
			$data['data_adocao'] = $this->input->post('data_adocao');
			$data['cep'] = $this->input->post('cep');
			$data['logradouro'] = $this->input->post('logradouro');
			$data['numero'] = $this->input->post('numero');				
			$data['bairro'] = $this->input->post('bairro');			
			$data['localidade'] = $this->input->post('localidade');
			$data['uf'] = $this->input->post('uf');
			$data['observacao'] = $this->input->post('observacao');
									

			$data = html_escape($data);				

			$this->core_model->insert('adocao', $data);
			$this->session->set_flashdata('sucesso', 'Adoção cadastrada com sucesso!');
			redirect($this->router->fetch_class());	
		}	

	}	


	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('adocao', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());

		}else{

			$this->form_validation->set_rules('cpf', 'CPF', 'trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('nome_adotante', 'Nome do Adotante', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('email', 'Email', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('celular', 'Celular', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('nome_animal', 'Nome de Animal', 'trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('sexo_animal', 'Sexo do Animal', 'trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('tipo_animal', 'Tipo de Animal', 'trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('data_adocao', 'Data da Adoção', 'trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[10]');
			$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('localidade', 'Cidade', 'trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]');
			$this->form_validation->set_rules('observacao', 'Observação', 'trim|min_length[1]|max_length[255]');
				
		
				
			if (!$this->form_validation->run()){

				$data = array(
					'titulo' => 'Editar Cadastro',					
					'icone_view' => 'ik ik-user',						
					'adocoes' => $this->core_model->get_by_id('adocao', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),					

				);		
				

				$this->load->view('layout/header',$data);
				$this->load->view('adocao/alterar');
				$this->load->view('layout/footer');

			}else{
				$data['cpf'] = $this->input->post('cpf');
				$data['nome_adotante'] = $this->input->post('nome_adotante');
				$data['email'] = $this->input->post('email');
				$data['celular'] = $this->input->post('celular');
				$data['nome_animal'] = $this->input->post('nome_animal');
				$data['sexo_animal'] = $this->input->post('sexo_animal');
				$data['tipo_animal'] = $this->input->post('tipo_animal');
				$data['data_adocao'] = $this->input->post('data_adocao');
				$data['cep'] = $this->input->post('cep');
				$data['logradouro'] = $this->input->post('logradouro');
				$data['numero'] = $this->input->post('numero');
				$data['bairro'] = $this->input->post('bairro');
				$data['localidade'] = $this->input->post('localidade');
				$data['uf'] = $this->input->post('uf');
				$data['observacao'] = $this->input->post('observacao');								

				$data = html_escape($data);				
	
				$this->core_model->update('adocao', $data, array('id' => $id));

				$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
				redirect($this->router->fetch_class()); 				
			}		
		}	
		
	}
	
	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('adocao', array('id' => $id))){

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('adocao', $data)) {       
				$this->session->set_flashdata('sucesso', 'Cadastro excluído com sucesso!');				
			}
		}
		
		redirect($this->router->fetch_class());
	} 	

}
	
		
	




		

		
	




