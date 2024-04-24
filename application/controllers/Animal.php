<?php
defined('BASEPATH') or exit('Ação não permitida');

class Animal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		//chama o controller login se o usuário não estiver logado
		if (!$this->ion_auth->logged_in())
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'titulo' => 'Animais Cadastrados',
			'sub_titulo' => 'Listando os animais cadastrados no sistema',
			'icone_view' => 'ik ik-star-on',
			'animais' => $this->core_model->getAnimais(),			
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
			),
			'scripts' => array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
			),
		);
		
		$this->load->view('layout/header', $data);
		$this->load->view('animal/index');
		$this->load->view('layout/footer');
	}

		/*
	public function cadastrar1()
	{
		$id =  $this->uri->segment(3);
		if (isset($id)) {
			$this->session->set_flashdata('error', 'O campo ID deve estar em branco');
			redirect($this->router->fetch_class());
		}
		/*
		$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]|required');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[5]|max_length[10]|required');
		$this->form_validation->set_rules('raca', 'Raça', 'trim|min_length[1]|max_length[20]|required');
		$this->form_validation->set_rules('porte', 'Porte', 'trim|min_length[1]|max_length[10]|required');
		$this->form_validation->set_rules('cor', 'Cor', 'trim|min_length[1]|max_length[9]|required');
		$this->form_validation->set_rules('data_cadastro', 'Data de Cadastro', 'trim|min_length[1]|max_length[10]|required');
		$this->form_validation->set_rules('observacao', 'Observação', 'trim|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('tipo_animal ', 'Tipo de Animal', 'trim|min_length[1]|max_length[255]|required');
		$this->form_validation->set_rules('castrado ', 'Castrado', 'exact_lenght[1]|required');
		

		if (!$this->form_validation->run()) {

			$data = array(
				'titulo' => 'Cadastrar Animal',
				'icone_view' => 'ik ik-star-on',
				'styles' => array(
					'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
				),
				'scripts' => array(
					'plugins/datatables.net/js/jquery.dataTables.min.js',
					'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				),
			);

			$this->load->view('layout/header', $data);
			$this->load->view('animal/cadastrar');
			$this->load->view('layout/footer');
		} else {
			//cadastrar					
			$data['nome'] = $this->input->post('nome');
			$data['sexo'] = $this->input->post('sexo');
			$data['raca'] = $this->input->post('raca');
			$data['porte'] = $this->input->post('porte');
			$data['cor'] = $this->input->post('cor');
			$data['data_cadastro'] = $this->input->post('data_cadastro');
			$data['observacao'] = $this->input->post('observacao');
			$data['castrado'] = $this->input->post('castrado');
			$data['tipo_animal'] = $this->input->post('tipo_animal');			

			$data = html_escape($data);

			/*
			$foto = $this->do_upload();
			if (array_key_exists('error', $foto)) {

				$data = array(
					'titulo' => 'Cadastrar Animal',
					'icone_view' => 'ik ik-user',
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
					),
					'scripts' => array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
					),
				);
				/*$this->session->set_flashdata('error', 'Erro no upload da foto!' . trim($foto['error']));
				$this->load->view('layout/header', $data);
				$this->load->view('animal/cadastrar');
				$this->load->view('layout/footer');
				return;
			/*$data['foto_animal'] = '/uploads/' . $foto['upload_data']['file_name'];

			
			
			$this->core_model->insert('animal', $data);
			$this->session->set_flashdata('sucesso', 'Animal cadastrado com sucesso!');
			redirect($this->router->fetch_class());
		}
	} */

	
	public function cadastrar() {
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('raca', 'Raça', 'trim|required');
		$this->form_validation->set_rules('cor','Cor', 'trim|required');
		$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required');
		$this->form_validation->set_rules('porte', 'Porte', 'trim|required');
		$this->form_validation->set_rules('data_cadastro', 'Data de Cadastro', 'trim|required');
		$this->form_validation->set_rules('observacao', 'Observação', 'trim');
		$this->form_validation->set_rules('castrado', 'Castrado', 'trim|required');
		$this->form_validation->set_rules('tipo_animal', 'Tipo de Animal', 'trim|required');
		//$this->form_validation->set_rules('foto', 'Foto do Animal', 'trim|required');


		if (!$this->form_validation->run()){
			$data = array(
				'titulo' => 'Cadastrar Animal',
				'icone_view' => 'ik ik-star-on',
				'styles' => array(
					'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
				),
				'scripts' => array(
					'plugins/datatables.net/js/jquery.dataTables.min.js',
					'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				),
			);

			$this->load->view('layout/header', $data);
			$this->load->view('animal/cadastrar');
			$this->load->view('layout/footer');

		}else{
			$data['nome'] = $this->input->post('nome');
			$data['sexo'] = $this->input->post('sexo');
			$data['raca'] = $this->input->post('raca');
			$data['porte'] = $this->input->post('porte');
			$data['cor'] = $this->input->post('cor');
			$data['data_cadastro'] = $this->input->post('data_cadastro');
			$data['observacao'] = $this->input->post('observacao');
			$data['castrado'] = $this->input->post('castrado');
			$data['tipo_animal'] = $this->input->post('tipo_animal');
			//$data['foto']  =  $this->input->post('foto');

			$data = html_escape($data);
			/*
			echo '<pre>';
			print_r($data);
			exit; */

				

				$this->core_model->insert('animal', $data);
				$this->session->set_flashdata('sucesso', 'Animal cadastrado com sucesso!');
				redirect($this->router->fetch_class());	
			}

		}
	



	public function alterar($id = NULL)
	{
		//atualizando
		if (!$this->core_model->get_by_id('animal', array('id_animal' => $id))) {

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());
		} else {

			$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('sexo', 'Sexo', 'trim|min_length[5]|max_length[10]');
			$this->form_validation->set_rules('raca', 'Raça', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('porte', 'Porte', 'trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('cor', 'Cor', 'trim|min_length[1]|max_length[20]');
			$this->form_validation->set_rules('observacao', 'Observação', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('data_cadastro', 'Data de Cadastro', 'trim|min_length[1]|max_length[255]');
			$this->form_validation->set_rules('castrado', 'castrado', 'exact_length[1]');
			//$this->form_validation->set_rules('foto', 'Foto do Animal', 'trim');

			if (!$this->form_validation->run()) {

				$data = array(
					'titulo' => 'Editar Cadastro',
					'icone_view' => 'ik ik-star-on',
					'animais' => $this->core_model->get_by_id('animal', array('id_animal' => $id)),
					'styles' => array(
						'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
					),
					'scripts' => array(
						'plugins/datatables.net/js/jquery.dataTables.min.js',
						'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
					),

				);

				$this->load->view('layout/header', $data);
				$this->load->view('animal/alterar');
				$this->load->view('layout/footer');
			} else {

				$data['nome'] = $this->input->post('nome');
				$data['sexo'] = $this->input->post('sexo');
				$data['raca'] = $this->input->post('raca');
				$data['porte'] = $this->input->post('porte');
				$data['cor'] = $this->input->post('cor');
				$data['observacao'] = $this->input->post('observacao');
				$data['castrado'] = $this->input->post('castrado');
				$data['data_cadastro'] = $this->input->post('data_cadastro');
				$data['tipo_animal'] = $this->input->post('tipo_animal');
				$data['foto']  =  $this->input->post('foto');
				

				$data = html_escape($data);

				$foto = $this->do_upload();

				$data['foto'] = '/uploads/' . $foto['upload_data']['file_name'];
				
				$this->core_model->update('animal', $data, array('id_animal' => $id));

				$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
				redirect($this->router->fetch_class());
			}
		}
	}


	public function del($id = Null)
	{

		if (!$id || !$this->core_model->get_by_id('animal', array('id_animal' => $id))) {

			$this->session->set_flashdata('error', 'Cadastro não encontrado!');
			redirect($this->router->fetch_class());
		} else {
			//deleta

			$data = array(
				'excluido' => 1
			);			

			$this->db->where('id_animal', $id);
			
			if ($this->db->update('animal', $data)) {
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


	public function visualizar($id_animal = NULL)
	{

		if (!$id_animal) {
			$this->session->set_flashdata('error', 'Cadastro não existe!');
			redirect($this->router->fetch_class());
		}

		//carrega a página de visualização do animal

		$data = array(
			'titulo' => 'Visualizar animal',
			'sub_titulo' => 'Chegou a hora de visualizar o cadastro',
			'icone_view' => 'ik ik-star-on',
			'animais' => $this->core_model->get_by_id('animal', array('id_animal' => $id_animal)),
			'fotos' => $this->core_model->visualizar('foto_animal', array('id_animal' => $id_animal))
		);
		
		if (!isset($data['animais'])) {
			$this->session->set_flashdata('error', 'Animal não encontrado!');
			redirect('home');
		}

		$this->load->view('layout/header', $data);
		$this->load->view('animal/visualizar');
		$this->load->view('layout/footer');
	}
	
}
