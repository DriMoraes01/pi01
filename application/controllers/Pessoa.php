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
			'linhas' => $this->core_model->getPessoas(),				
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
			),	
		);
		
		/*echo '<pre>';
		print_r($data['linhas']);
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
		/*
		$this->form_validation->set_rules('local', 'Local', 'trim|min_length[1]|max_length[255]');		
		$this->form_validation->set_rules('linha', 'Linha', 'trim|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('logradouro', 'Logradouro', 'trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('bairro', 'Bairro', 'trim|min_length[1]|max_length[255]');		
		$this->form_validation->set_rules('localidade', 'Cidade', 'trim|min_length[1]|max_length[255]');		
		$this->form_validation->set_rules('uf', 'Estado', 'trim|exact_length[2]');		
		$this->form_validation->set_rules('cep', 'CEP', 'trim|min_length[8]|max_length[9]');				
		$this->form_validation->set_rules('nrc', 'NRC', 'trim|min_length[8]|max_length[12]');	
		$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[6]');			
		
		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Linha Telefônica',
				'sub_titulo' => 'Chegou a hora de cadastrar a linha',
				'icone_view' => 'ik ik-phone',	
				'styles' => array(
					'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
				),
				'scripts' =>array(
					'plugins/datatables.net/js/jquery.dataTables.min.js',
					'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
				),												
			);				
			*/
			$this->load->view('layout/header',$data);
			$this->load->view('pessoa/cadastrar');
			$this->load->view('layout/footer');	
		}else{
			/*
			//cadastrar						
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

			$this->core_model->insert('telefonia', $data);
			$this->session->set_flashdata('sucesso', 'Linha cadastrada com sucesso!');
			redirect($this->router->fetch_class());	
		}	

	}	

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
		redirect($this->router->fetch_class());
	/*} */	

}
	
		
	




		

		
	




