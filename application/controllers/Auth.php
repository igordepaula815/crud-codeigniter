<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Auth
 *
 * Gerencia a autenticação, login e logout dos administradores.
 */
class Auth extends CI_Controller {

    /**
     * Construtor da classe. Carrega as bibliotecas e helpers necessários para a autenticação.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    /**
     * Exibe a página de login. Se o usuário já estiver logado,
     * redireciona para o painel de usuários para evitar logins redundantes.
     */
    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            redirect('usuarios');
        }
        $data['title'] = 'Login - Painel de Controle';
        $this->load->view('auth/login', $data);
    }

    /**
     * Processa os dados enviados pelo formulário de login.
     * Valida os dados e verifica as credenciais no banco de dados.
     */
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Senha', 'required');

        // Se a validação falhar, recarrega o formulário de login.
        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Login - Painel de Controle';
            $data['email_attempt'] = $this->input->post('email');
            $this->load->view('auth/login', $data);
        } else {
            // Se a validação passar, continua com a verificação.
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Busca o administrador pelo email na tabela 'admins'.
            $admin = $this->db->get_where('admins', array('email' => $email))->row();

            // Verifica se um admin foi encontrado e se a senha corresponde ao hash.
            if ($admin && password_verify($password, $admin->password)) {
                // Senha correta, o login é bem-sucedido.
                $session_data = array(
                    'admin_id'   => $admin->id,
                    'admin_nome' => $admin->nome,
                    'admin_email'  => $admin->email,
                    'is_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect('usuarios');
            } else {
                // Credenciais inválidas, recarrega o formulário com uma mensagem de erro.
                $this->session->set_flashdata('error_message', 'Email ou senha inválidos.');
                $data['title'] = 'Login - Painel de Controle';
                $data['email_attempt'] = $email; // Mantém o email no campo para facilitar.
                $this->load->view('auth/login', $data);
            }
        }
    }

    /**
     * Realiza o logout do usuário, destruindo a sessão e redirecionando para a página de login.
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}