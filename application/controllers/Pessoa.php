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
		
		$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]|required');		
		$this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|min_length[1]|max_length[14]');
		$this->form_validation->set_rules('rg', 'RG', 'trim|min_length[1]|max_length[14]');
		$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('complemento', 'Complemento', 'trim|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('cidade', 'Cidade', 'trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]');		
		$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[9]');				
		$this->form_validation->set_rules('telefone', 'Telefone', 'trim|min_length[10]|max_length[14]');
		$this->form_validation->set_rules('celular', 'Celular', 'trim|min_length[9]|max_length[14]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|min_length[10]|max_length[255]');
		$this->form_validation->set_rules('data_cadastro', 'Data de Cadastro', 'trim|min_length[10]|max_length[20]');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]');	
					
		
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
			$data['nome'] = $this->input->post('nome');			
			$data['sobrenome'] = $this->input->post('sobrenome');
			$data['cpf'] = $this->input->post('cpf');
			$data['rg'] = $this->input->post('rg');
			$data['bairro'] = $this->input->post('bairro');
			$data['complemento'] = $this->input->post('complemento');
			$data['numero'] = $this->input->post('numero');
			$data['cidade'] = $this->input->post('cidade');
			$data['uf'] = $this->input->post('uf');	
			$data['cep'] = $this->input->post('cep');
			$data['telefone'] = $this->input->post('telefone');
			$data['celular'] = $this->input->post('celular');
			$data['email'] = $this->input->post('email');
			$data['sexo'] = $this->input->post('sexo');
			$data['logradouro'] = $this->input->post('logradouro');								
					

			$data = html_escape($data);				

			$this->core_model->insert('pessoa', $data);
			$this->session->set_flashdata('sucesso', 'Pessoa cadastrada com sucesso!');
			redirect($this->router->fetch_class());	
		}	

	}	

	/*parei aqui */
	/*
	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('telefonia', array('id' => $id))){

			$this->session->set_flashdata('error', 'Linha não encontrada!');
			redirect($this->router->fetch_class());

		}else{	

			$this->form_validation->set_rules('local', 'Local', 'trim|min_length[1]|max_length[255]');		
			$this->form_validation->set_rules('linha', 'Linha', 'trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[1]|max_length[255]');		
			$this->form_validation->set_rules('localidade', 'Cidade', 'trim|min_length[1]|max_length[255]');		
			$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]');		
			$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[9]');				
			$this->form_validation->set_rules('nrc', 'NRC', 'trim|min_length[8]|max_length[12]');	
			$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[6]');			

				
				
			if (!$this->form_validation->run()){

				$data = array(

					'titulo' => 'Editar Contrato',
					'sub_titulo' => 'Chegou a hora de editar o contrato',
					'icone_view' => 'ik ik-file-text',						
					'linhas' => $this->core_model->get_by_id('telefonia', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),					

				);			
				

				$this->load->view('layout/header',$data);
				$this->load->view('telefonia/alterar');
				$this->load->view('layout/footer');

			}else{
				$data['local'] = $this->input->post('local');			
				$data['linha'] = $this->input->post('linha');
				$data['nrc'] = $this->input->post('nrc');
				$data['cep'] = $this->input->post('cep');	
				$data['logradouro'] = $this->input->post('logradouro');	
				$data['numero'] = $this->input->post('numero');	
				$data['bairro'] = $this->input->post('bairro');	
				$data['localidade'] = $this->input->post('localidade');	
				$data['uf'] = $this->input->post('uf');					
				$data['excluido'] = 0;		

				$data = html_escape($data);				
	
				$this->core_model->update('telefonia', $data, array('id' => $id));
				$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
				redirect($this->router->fetch_class()); 				
			}		
		}	
		
	}		
	

	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('telefonia', array('id' => $id))){

			$this->session->set_flashdata('error', 'Linha não encontrada!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('telefonia', $data)) {       
				$this->session->set_flashdata('sucesso', 'Linha excluída com sucesso!');				
			}
		}
		*/
		/*redirect($this->router->fetch_class());*/
	/*} */	

}
	
		
	




		

		
	




