<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Requisicoes extends CI_Controller {	

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
			'titulo' => 'Requisições cadastradas',
			'sub_titulo' => 'Listando todas as requisições cadastradas no sistema',
			'icone_view' => 'fas fa-file',			
			'requisicoes' => $this->core_model->get_all('requisicoes', array('excluido' => 0)),
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',							
			),	
		);		
		
		
		$this->load->view('layout/header',$data);
		$this->load->view('requisicoes/index');
		$this->load->view('layout/footer');
		

	}
		
		
		public function alterar($id = NULL)
	{
			//atualizando

			if(!$this->core_model->get_by_id('requisicoes', array('id' => $id))){

				$this->session->set_flashdata('error', 'Requisição não encontrada');
				redirect($this->router->fetch_class());

			}else{
				/*código para debug
				exit('Precificação pronta para ser editada');*/				
		
				$this->form_validation->set_rules('numero', 'Número', 'trim|required|min_length[3]|max_length[10]');
				$this->form_validation->set_rules('data', 'Data', 'required');
				$this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[1]|max_length[200]');	
				$this->form_validation->set_rules('situacao', 'Situação', 'trim|min_length[1]|max_length[100]');			
				$this->form_validation->set_rules('itens', 'Itens', 'trim|min_length[1]|max_length[100]');
				
				
				if($this->form_validation->run()){
					
					 $data = elements(
						array(
							'numero',
							'data',
							'descricao',
							'situacao',
							'itens'							
						),$this->input->post()
					 );
	
					$data = html_escape($data);
	
					$this->core_model->update('requisicoes', $data, array('id' => $id));
					redirect($this->router->fetch_class()); 

				}else{
					//erro de validação
					$data = array(

						'titulo' => 'Editar Requisição',
						'sub_titulo' => 'Chegou a hora de editar a requisição',
						'icone_view' => 'fas fa-file',					
						'requisicao' => $this->core_model->get_by_id('requisicoes', array('id' => $id)),				
	
					);					
	
					$this->load->view('layout/header',$data);
					$this->load->view('requisicoes/alterar');
					$this->load->view('layout/footer');
					
				}
			}		
		
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
		$this->form_validation->set_rules('situacao', 'Situação', 'trim|min_length[1]|max_length[100]');			
		$this->form_validation->set_rules('itens', 'Itens', 'trim|min_length[1]|max_length[100]');
		

		if(!$this->form_validation->run()){

			$data = array(
				'titulo' => 'Cadastrar Requisição',
				'sub_titulo' => 'Chegou a hora de cadastrar a requisição',
				'icone_view' => 'fas fa-file',										
				'scripts' => array(
					'plugins/mask/jquery.mask.min.js',
					'plugins/mask/custom.js',
				),						

			);	

			$this->load->view('layout/header',$data);
			$this->load->view('requisicoes/cadastrar');
			$this->load->view('layout/footer');

		}else{
			//cadastrar
			$data = elements(
				array(
					'numero',
					'data',
					'descricao',
					'situacao',
					'itens'	
				),$this->input->post()
			 );

			$data = html_escape($data);

			$this->core_model->insert('requisicoes', $data);
			redirect($this->router->fetch_class());
		}
	}

	public function del($id = Null){

		if(!$id || !$this->core_model->get_by_id('requisicoes', array('id' => $id))){

			$this->session->set_flashdata('error', 'Requisição não encontrada!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'excluido' => 1
			);
	
			$this->db->where('id', $id);
			if ($this->db->update('requisicoes', $data)) {       
				$this->session->set_flashdata('sucesso', 'Requisição excluída com sucesso!');				
			}
		}

		redirect($this->router->fetch_class());
	}


	
	public function informacoes($id = NULL){		

		$data = array(

			'titulo' => 'Informações Detalhadas',
			'sub_titulo' => 'Informações detalhadas da requisição',
			'icone_view' => 'fas fa-file',			
			'requisicao' => $this->core_model->get_by_id('requisicoes', array('id' => $id, 'ativa' => 1)),				
		);
		
		$this->load->view('layout/header',$data);		
		$this->load->view('requisicoes/informacoes');
		$this->load->view('layout/footer'); 
		
	}	

}
	
		
	




		

		
	




