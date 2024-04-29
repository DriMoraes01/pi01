<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		
		//chama o controller login se o usuário não estiver logado
		if (!$this->ion_auth->logged_in())
		{
			redirect('login');
		}
	}
	
	public function index()
	{		
		$data = array(
			'titulo' => 'Usuários cadastrados',
			'sub_titulo' => 'Listando todos os usuários cadastrados no sistema',	
			'usuarios' => $this->ion_auth->users()->result(),//get all users	
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',				
			),	
			'scripts' =>array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',							
			),			

		);	

		$this->load->view('layout/header',$data);
		$this->load->view('usuarios/index');
		$this->load->view('layout/footer');
	}

	public function cadastrar($usuario_id = NULL)
	{		
		$checkUser = $this->core_model->get_by_id('users', array('id' => $usuario_id));	

		if($checkUser){

			$this->session->set_flashdata('error', 'Usuário já existe!');
			redirect($this->router->fetch_class());
		}

		if($usuario_id == NULL){
			
			//cadastro de novo usuário		

			$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[40]');
			$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[5]|max_length[40]');
			$this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[40]|is_unique[users.username]');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required|min_length[5]|max_length[200]|callback_email_check');
			$this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirmacao', 'Confirmação de Senha', 'trim|required|matches[password]');
		}
			
			if($this->form_validation->run()){
				$username = html_escape($this->input->post('username'));
				$password = html_escape($this->input->post('password'));
				$email = html_escape($this->input->post('email'));
				$additional_data = array(
							'first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'active'  =>$this->input->post('active'),
							);
				$group = array($this->input->post('perfil')); //o que vier do post

				$additional_data = html_escape($additional_data);

    			if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
					$this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
				}else{
					$this->session->set_flashdata('error', 'Erro ao salvar os dados!');
				}
  
				redirect($this->router->fetch_class());	
			}		


			$data = array(
				'titulo' => 'Cadastrar usuário',
				'sub_titulo' => 'Chegou a hora de cadastrar um novo usuário',
				'icone_view' => 'ik ik-user',					
			);
			$this->load->view('layout/header',$data);
			$this->load->view('usuarios/cadastrar');
			$this->load->view('layout/footer');
		
	}

	public function editar($usuario_id = NULL)
	{
		//verifica a existência do id no banco
		$checkUser = $this->core_model->get_by_id('users', array('id' => $usuario_id));	
		if(!$checkUser){
			exit('Usuário não existe');
		}else{

		}
			//editar o usuário
			$perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();

			$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[40]');
			$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[5]|max_length[40]');
			$this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[5]|max_length[40]|callback_username_check');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required|min_length[5]|max_length[200]|callback_email_check');
			$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]');
			$this->form_validation->set_rules('confirmacao', 'Confirmação de Senha', 'trim|matches[password]');
			
			if($this->form_validation->run()){

				$data = elements(
					array(
						'first_name',
						'last_name',
						'username',
						'email',
						'password',
						'active',
					), $this->input->post()
				);
				
				$password = $this->input->post('password');

				//Não atualiza a senha e remove do array a referência a password
				if(!$password){

					unset($data['password']);
				}
				
				//Sanitizar array
				$data = html_escape($data);

				if($this->ion_auth->update($usuario_id, $data)){

					$perfil_post = $this->input->post('perfil');

					//Se for diferente, atualiza o grupo
					if($perfil_atual->id != $perfil_post ){

						$this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);
						$this->ion_auth->add_to_group($perfil_post, $usuario_id);

					}

					$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');

				}else{
					$this->session->set_flashdata('error', 'Não foi possível atualizar os dados!');

				}

				redirect($this->router->fetch_class());
			}		
		

		$data = array(
			'titulo' => 'Editar usuário',
			'sub_titulo' => 'Chegou a hora de editar o usuário',
			'icone_view' => 'ik ik-user',
			'usuarios' => $this->core_model->get_by_id('users', array('id' => $usuario_id)),//get user	
			'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),//traz os grupos que o usuário faz parte
			
		);	
		

		$this->load->view('layout/header',$data);
		$this->load->view('usuarios/editar');
		$this->load->view('layout/footer');	

	}



	public function visualizar($usuario_id = NULL)
	{
		if(!$usuario_id){
			$this->session->set_flashdata('error', 'Usuário não existe!');
			redirect($this->router->fetch_class());		
		}		

		//carrega a página de visualização do usuário

		$data = array(
			'titulo' => 'Visualizar usuário',
			'sub_titulo' => 'Chegou a hora de visualizar usuário',
			'icone_view' => 'ik ik-user',
			'usuario' => $this->core_model->get_by_id('users', array('id' =>$usuario_id)),										
		);
				
		$data['perfil_usuario'] = $this->ion_auth->get_users_groups($usuario_id)->row();
				
			if(!isset($data['usuario'])){
				$this->session->set_flashdata('error', 'Usuário não encontrado!');
				redirect('home');	
			}					

			$this->load->view('layout/header',$data);
			$this->load->view('usuarios/visualizar');
			$this->load->view('layout/footer');
			
	}
		


	public function username_check($username){

		$usuario_id = $this->input->post('usuario_id');

		if($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))){

			$this->form_validation->set_message('username_check', 'Esse usuário já existe!');

			return FALSE;
		}else{

			return TRUE;
		}

	}

	public function email_check($email){

		$usuario_id = $this->input->post('usuario_id');

		if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))){

			$this->form_validation->set_message('username_email', 'Esse e-mail já existe!');

			return FALSE;
		}else{

			return TRUE;
		}

	}

	public function del($usuario_id = Null){

		if(!$usuario_id || !$this->core_model->get_by_id('users', array('id' => $usuario_id))){

			$this->session->set_flashdata('error', 'Usuário não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			//deleta

			if($this->ion_auth->is_admin($usuario_id)){
				$this->session->set_flashdata('error', 'Administrador não pode ser excluído!');
				redirect($this->router->fetch_class());
			}

			if($this->ion_auth->delete_user($usuario_id)){
				$this->session->set_flashdata('sucesso', 'Dados excluídos com sucesso!');
				
			}else{
				$this->session->set_flashdata('error', 'Não foi possível excluir os dados!');
				
			}

			redirect($this->router->fetch_class());
		}
	}
}
