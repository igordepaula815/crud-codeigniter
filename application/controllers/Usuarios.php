<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Usuarios
 * Gerencia o CRUD para os usuários e é protegida por autenticação.
 */
class Usuarios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        
        // Trava de Segurança: redireciona para o login se não houver sessão.
        if ( ! $this->session->userdata('is_logged_in')) {
            redirect('auth');
        }
        
        $this->load->model('usuario_model');
        $this->load->library('form_validation');
    }

    /**
     * Lista todos os usuários ativos.
     */
    public function index()
    {
        $data['usuarios'] = $this->usuario_model->get_users();
        $data['title'] = 'Lista de Usuários';
        $this->load->view('templates/header', $data);
        $this->load->view('usuarios/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Exibe e processa o formulário de cadastro de um novo usuário.
     */
    public function cadastrar()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[usuarios.email]');
        $this->form_validation->set_rules('celular', 'Celular', 'required|trim');
        $this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required');
        $this->form_validation->set_rules('estado_civil', 'Estado Civil', 'required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|trim|is_unique[usuarios.cpf]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Cadastrar Novo Usuário';
            $this->load->view('templates/header', $data);
            $this->load->view('usuarios/formulario', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array('nome' => $this->input->post('nome'),'email' => $this->input->post('email'),'telefone' => $this->input->post('telefone'),'celular' => $this->input->post('celular'),'data_nascimento' => $this->input->post('data_nascimento'),'estado_civil' => $this->input->post('estado_civil'),'cpf' => $this->input->post('cpf'),'rg' => $this->input->post('rg'),'data_emissao_rg' => $this->input->post('data_emissao_rg') ? $this->input->post('data_emissao_rg') : NULL,'observacoes' => $this->input->post('observacoes'));
            if ($this->usuario_model->insert_user($data)) {
                $this->session->set_flashdata('success_message', 'Usuário cadastrado com sucesso!');
            }
            redirect('usuarios');
        }
    }

    /**
     * Exibe e processa o formulário de edição de um usuário.
     * @param int $id O ID do usuário.
     */
    public function editar($id)
    {
        $data['usuario'] = $this->usuario_model->get_users($id);
        if (empty($data['usuario'])) { show_404(); }

        $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
        
        // Validação condicional para campos únicos (email e cpf)
        if ($this->input->post('email') != $data['usuario']['email']) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[usuarios.email]');
        }
        if ($this->input->post('cpf') != $data['usuario']['cpf']) {
            $this->form_validation->set_rules('cpf', 'CPF', 'required|trim|is_unique[usuarios.cpf]');
        }
        
        $this->form_validation->set_rules('celular', 'Celular', 'required|trim');
        $this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required');
        $this->form_validation->set_rules('estado_civil', 'Estado Civil', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Editar Usuário';
            $this->load->view('templates/header', $data);
            $this->load->view('usuarios/formulario', $data);
            $this->load->view('templates/footer');
        } else {
            $update_data = array('nome' => $this->input->post('nome'),'email' => $this->input->post('email'),'telefone' => $this->input->post('telefone'),'celular' => $this->input->post('celular'),'data_nascimento' => $this->input->post('data_nascimento'),'estado_civil' => $this->input->post('estado_civil'),'cpf' => $this->input->post('cpf'),'rg' => $this->input->post('rg'),'data_emissao_rg' => $this->input->post('data_emissao_rg') ? $this->input->post('data_emissao_rg') : NULL,'observacoes' => $this->input->post('observacoes'));
            if ($this->usuario_model->update_user($id, $update_data)) {
                $this->session->set_flashdata('success_message', 'Usuário atualizado com sucesso!');
            }
            redirect('usuarios');
        }
    }

    /**
     * Realiza a exclusão lógica de um usuário.
     * @param int $id O ID do usuário.
     */
    public function excluir($id)
    {
        $usuario = $this->usuario_model->get_users($id);
        if (empty($usuario)) { show_404(); }

        if ($this->usuario_model->soft_delete_user($id)) {
            $this->session->set_flashdata('success_message', 'Usuário excluído com sucesso!');
        } else {
            $this->session->set_flashdata('error_message', 'Ocorreu um erro ao excluir o usuário.');
        }
        redirect('usuarios');
    }
}