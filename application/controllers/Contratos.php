<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Contratos extends CI_Controller {	

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
			'titulo' => 'Contratos cadastrados',
			'sub_titulo' => 'Listando os contratos cadastrados no sistema',
			'icone_view' => 'ik ik-file-text',			
			'cts' => $this->core_model->getContratos(),				
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
			),	
		);			

		$this->load->view('layout/header',$data);
		$this->load->view('contratos/index');
		$this->load->view('layout/footer');		

	}
		
	public function cadastrar()
	{	
		$id =  $this->uri->segment(3);
		if (isset($id)){						
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());			
		}
		
		$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('servico', 'Serviço', 'trim|min_length[1]|max_length[255]');	
		$this->form_validation->set_rules('af', 'AF', 'trim|min_length[1]|max_length[20]');		
		$this->form_validation->set_rules('data_inicio', 'Data');
		$this->form_validation->set_rules('data_fim', 'Data');		
		$this->form_validation->set_rules('nome_empresa', 'Empresa', 'trim|min_length[1]|max_length[255]');		
			
		
		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Contrato',
				'sub_titulo' => 'Chegou a hora de cadastrar o contrato',
				'icone_view' => 'ik ik-file-text',	
				'styles' => array(
					'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
				),
				'scripts' =>array(
					'plugins/datatables.net/js/jquery.dataTables.min.js',
					'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
				),				
												
			);		
			

			$this->load->view('layout/header',$data);
			$this->load->view('contratos/cadastrar');
			$this->load->view('layout/footer');	
		}else{
			//cadastrar	
					
			$data['nome_empresa'] = $this->input->post('nome_empresa');			
			$data['numero'] = $this->input->post('numero');
			$data['servico'] = $this->input->post('servico');
			$data['af'] = $this->input->post('af');
			$data['data_inicio'] = $this->input->post('data_inicio');
			$data['data_fim'] = $this->input->post('data_fim');			
			$data['excluido'] = 0;					

			$data = html_escape($data);				

			$this->core_model->insert('contratos', $data);
			$this->session->set_flashdata('sucesso', 'Contrato cadastrado com sucesso!');
			redirect($this->router->fetch_class());	
		}	

	}	

	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('contratos', array('id' => $id))){

			$this->session->set_flashdata('error', 'Contrato não encontrado!');
			redirect($this->router->fetch_class());

		}else{	

			$this->form_validation->set_rules('numero', 'Número', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('servico', 'Serviço', 'trim|min_length[1]|max_length[255]');	
			$this->form_validation->set_rules('af', 'AF', 'trim|min_length[1]|max_length[20]');		
			$this->form_validation->set_rules('data_inicio', 'Data');
			$this->form_validation->set_rules('data_fim', 'Data');		
			$this->form_validation->set_rules('nome_empresa', 'Empresa', 'trim|min_length[1]|max_length[255]');		
				
				
			if (!$this->form_validation->run()){

				$data = array(

					'titulo' => 'Editar Contrato',
					'sub_titulo' => 'Chegou a hora de editar o contrato',
					'icone_view' => 'ik ik-file-text',						
					'cts' => $this->core_model->get_by_id('contratos', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),					

				);			
				

				$this->load->view('layout/header',$data);
				$this->load->view('contratos/alterar');
				$this->load->view('layout/footer');

			}else{
				$data['nome_empresa'] = $this->input->post('nome_empresa');			
				$data['numero'] = $this->input->post('numero');
				$data['servico'] = $this->input->post('servico');
				$data['af'] = $this->input->post('af');
				$data['data_inicio'] = $this->input->post('data_inicio');
				$data['data_fim'] = $this->input->post('data_fim');			
				$data['excluido'] = 0;	

				$data = html_escape($data);				
	
				$this->core_model->update('contratos', $data, array('id' => $id));
				$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
				redirect($this->router->fetch_class()); 				
			}		
		}	
		
	}		
	

	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('contratos', array('id' => $id))){

			$this->session->set_flashdata('error', 'Contrato não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('contratos', $data)) {       
				$this->session->set_flashdata('sucesso', 'Contrato excluído com sucesso!');				
			}
		}

		redirect($this->router->fetch_class());
	}	

}
	
		
	




		

		
	




