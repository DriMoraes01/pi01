<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Contas extends CI_Controller {	

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
			'titulo' => 'Contas cadastradas',
			'sub_titulo' => 'Listando todas as contas cadastradas no sistema',
			'icone_view' => 'fas fa-dollar-sign',			
			'mensalidades' => $this->core_model->get_all('mensalidades',array('ativa' => 1)),
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',							
			),	
		);				
		
		
		$this->load->view('layout/header',$data);
		$this->load->view('contas/index');
		$this->load->view('layout/footer');
		

	}	
		
		public function alterar($id_empresa = NULL){		

			if(!$this->core_model->get_by_id('mensalidades', array('id_empresa' => $id_empresa))){

				$this->session->set_flashdata('error', 'Conta não encontrada');
				redirect($this->router->fetch_class());

			}else{			
		
				$this->form_validation->set_rules('nome_empresa', 'Nome da Empresa', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('servico', 'Serviço', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('af', 'AF', 'trim|required');	
				$this->form_validation->set_rules('ativa', 'Ativa', 'trim|required|integer');			
				$this->form_validation->set_rules('data_vencto', 'Data de Vencimento', 'trim|required');
				$this->form_validation->set_rules('valor', 'Valor', 'trim|required');
				$this->form_validation->set_rules('tipo_documento', 'Tipo de Documento', 'trim|required');
				
				if($this->form_validation->run()){					 
					 $data = elements(
						array(
							'nome_empresa',
							'servico',
							'af',
							'ativa',
							'data_vencto',
							'valor',
							'tipo_documento'
						),$this->input->post()
					 );
	
					$data = html_escape($data);
	
					$this->core_model->update('mensalidades', $data, array('id_empresa' =>$id_empresa));
					redirect($this->router->fetch_class()); 

				}else{
					//erro de validação
					$data = array(

						'titulo' => 'Editar Conta',
						'sub_titulo' => 'Chegou a hora de editar a conta',
						'icone_view' => 'fas fa-dollar-sign',
						'styles' => array(
							'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
						),			
						'mensalidade' => $this->core_model->get_by_id('mensalidades', array('id_empresa' => $id_empresa)),	
					);						
	
					$this->load->view('layout/header',$data);
					$this->load->view('contas/alterar');
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

		$this->form_validation->set_rules('nome_empresa', 'Empresa', 'trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('servico', 'Serviço', 'trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('af', 'AF', 'trim|required');	
		$this->form_validation->set_rules('ativa', 'Ativa', 'trim|required|integer');			
		$this->form_validation->set_rules('data_vencto', 'Data de Vencimento', 'trim');
		$this->form_validation->set_rules('valor', 'Valor', 'trim|required');
		$this->form_validation->set_rules('tipo_documento', 'Tipo de Documento', 'trim|required');
		$this->form_validation->set_rules('processo', 'Processo', 'trim|required');
		$this->form_validation->set_rules('total_processo', 'Total do Processo', 'trim|required');
		$this->form_validation->set_rules('periodo', 'Período', 'trim|required');
		$this->form_validation->set_rules('contrato', 'Contrato', 'trim');
		

		if(!$this->form_validation->run()){

			$data = array(

				'titulo' => 'Cadastrar Conta',
				'sub_titulo' => 'Chegou a hora de cadastrar a precificação',
				'icone_view' => 'fas fa-dollar-sign',									
				'scripts' => array(
					'plugins/mask/jquery.mask.min.js',
					'plugins/mask/custom.js',
				),						

			);	

			$this->load->view('layout/header',$data);
			$this->load->view('contas/cadastrar');
			$this->load->view('layout/footer');

		}else{		

			$data = elements(
				array(
					'nome_empresa',
					'servico',
					'af',
					'ativa',
					'data_vencto',
					'valor',
					'tipo_documento',
					'processo',
					'total_processo',
					'periodo',
					'contrato'
				),$this->input->post()
			 );

			$data = html_escape($data);

			$this->core_model->insert('mensalidades', $data);
			$this->session->set_flashdata('sucesso', 'Conta cadastrada com sucesso!');
			redirect($this->router->fetch_class());
		}
	}

	public function del($id_empresa = Null){

		if(!$id_empresa || !$this->core_model->get_by_id('mensalidades', array('id_empresa' => $id_empresa))){

			$this->session->set_flashdata('error', 'Conta não encontrada!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			$data = array(
				'ativa' => 0
			);
	
			$this->db->where('id_empresa', $id_empresa);
			if ($this->db->update('mensalidades', $data)) {       
				$this->session->set_flashdata('sucesso', 'Conta excluída com sucesso!');				
			}	
						
		}

		redirect($this->router->fetch_class());
	}

	public function informacoes($id_empresa = NULL){		

		$data = array(

			'titulo' => 'Informações Detalhadas',
			'sub_titulo' => 'Informações detalhadas da conta',
			'icone_view' => 'fas fa-dollar-sign',			
			'conta' => $this->core_model->get_by_id('mensalidades', array('id_empresa' => $id_empresa, 'ativa' => 1)),				
		);	
		
		$this->load->view('layout/header',$data);		
		$this->load->view('contas/informacoes');
		$this->load->view('layout/footer'); 		
	}
}
	
		
	




		

		
	




