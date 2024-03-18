<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Af extends CI_Controller {	

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
			'titulo' => 'Autorizações de fornecimento cadastradas',
			'sub_titulo' => 'Listando todas as Af(s) cadastradas no sistema',
			'icone_view' => 'fas fa-file',			
			'afs' => $this->core_model->get_all('af', array('excluido' => 0)),
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',							
			),	
		);		
		
		
		$this->load->view('layout/header',$data);
		$this->load->view('af/index');
		$this->load->view('layout/footer');
		

	}
		
	public function cadastrar()
	{	
		$id =  $this->uri->segment(3);
		if (isset($id)){						
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());			
		}
		
		$this->form_validation->set_rules('numero', 'Número', 'trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('data', 'Data', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[1]|max_length[200]');	
		$this->form_validation->set_rules('fornecedor', 'Situação', 'trim|min_length[1]|max_length[100]');	
		$this->form_validation->set_rules('ano', 'Ano', 'trim|numeric|required|exact_length[4]');
		
		if ($this->form_validation->run()) {
			//cadastrar		
			$data = elements(
				array(
					'numero',
					'data',
					'descricao',
					'fornecedor',					
					'ano',					
				),$this->input->post()
			);

			$data = html_escape($data);

			$this->core_model->insert('af', $data);
			$this->session->set_flashdata('sucesso', 'AF cadastrada com sucesso!');
			redirect($this->router->fetch_class());	
		}

		$data = array(
			'titulo' => 'Cadastrar Autorização de Fornecimento',
			'sub_titulo' => 'Chegou a hora de cadastrar a AF',
			'icone_view' => 'fas fa-file',	
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
			),									
		);	
		
		$this->load->view('layout/header',$data);
		$this->load->view('af/cadastrar');
		$this->load->view('layout/footer');	

	}	

	public function alterar($id = NULL)
	{
		//atualizando
		if(!$this->core_model->get_by_id('af', array('id' => $id))){

			$this->session->set_flashdata('error', 'AF não encontrada!');
			redirect($this->router->fetch_class());

		}else{					
		
			$this->form_validation->set_rules('numero', 'Número', 'trim|required|min_length[3]|max_length[10]');
			$this->form_validation->set_rules('data', 'Data', 'required');
			$this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[1]|max_length[200]');	
			$this->form_validation->set_rules('fornecedor', 'Situação', 'trim|min_length[1]|max_length[100]');			
			$this->form_validation->set_rules('ano', 'Ano', 'trim|numeric|required|exact_length[4]');				
				
			if (!$this->form_validation->run()){

				$data = array(

					'titulo' => 'Editar Autorização de Fronecimento',
					'sub_titulo' => 'Chegou a hora de editar a autorização de fornecimento',
					'icone_view' => 'fas fa-file',						
					'afs' => $this->core_model->get_by_id('af', array('id' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
					),
					'scripts' =>array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',				
					),					

				);				

				$this->load->view('layout/header',$data);
				$this->load->view('af/alterar');
				$this->load->view('layout/footer');

			}else{
				$data = elements(
					array(
							'numero',
							'data',
							'descricao',
							'fornecedor',								
							'ano'						
						),$this->input->post()
					 );
	
					$data = html_escape($data);
	
					$this->core_model->update('af', $data, array('id' => $id));
					$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
					redirect($this->router->fetch_class()); 				
			}		
		}	
		
	}		
	

	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('af', array('id' => $id))){

			$this->session->set_flashdata('error', 'AF não encontrada!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('af', $data)) {       
				$this->session->set_flashdata('sucesso', 'AF excluída com sucesso!');				
			}
		}

		redirect($this->router->fetch_class());
	}	

}
	
		
	




		

		
	




