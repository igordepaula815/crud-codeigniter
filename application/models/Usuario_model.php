<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Usuario_model
 *
 * Esta classe é o Model de dados para a tabela 'usuarios'.
 * Ela lida com todas as interações diretas com o banco de dados (leitura, inserção, atualização e exclusão).
 */
class Usuario_model extends CI_Model {

    private $table = 'usuarios';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Busca usuários no banco de dados.
     * Retorna todos os usuários ativos se nenhum ID for especificado.
     * Retorna um usuário específico se um ID for fornecido.
     * Implementa a exclusão lógica ao buscar apenas registros onde 'deleted_at' é nulo.
     *
     * @param int|null $id O ID do usuário a ser buscado (opcional).
     * @return array Retorna um array de usuários ou um único array de usuário.
     */
    public function get_users($id = null) {
        // Condição para exclusão lógica: sempre busca apenas usuários não deletados.
        $this->db->where('deleted_at', null);

        if ($id === null) {
            // Se nenhum ID foi passado, retorna todos os usuários.
            $query = $this->db->get($this->table);
            return $query->result_array();
        } else {
            // Se um ID foi passado, busca apenas por aquele usuário.
            $this->db->where('id', $id);
            $query = $this->db->get($this->table);
            return $query->row_array();
        }
    }

    /**
     * Insere um novo usuário no banco de dados.
     * Realiza a normalização dos dados (remove máscaras) antes da inserção.
     *
     * @param array $data Dados do usuário a serem inseridos.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function insert_user($data) {
        // Normalização de dados: remove caracteres não numéricos de campos formatados.
        if (isset($data['cpf'])) $data['cpf'] = preg_replace('/[^0-9]/', '', $data['cpf']);
        if (isset($data['celular'])) $data['celular'] = preg_replace('/[^0-9]/', '', $data['celular']);
        if (isset($data['telefone'])) $data['telefone'] = preg_replace('/[^0-9]/', '', $data['telefone']);
        
        return $this->db->insert($this->table, $data);
    }

    /**
     * Atualiza os dados de um usuário existente.
     * Realiza a normalização dos dados (remove máscaras) antes da atualização.
     *
     * @param int $id ID do usuário a ser atualizado.
     * @param array $data Dados a serem atualizados.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function update_user($id, $data) {
        // Normalização de dados: remove caracteres não numéricos de campos formatados.
        if (isset($data['cpf'])) $data['cpf'] = preg_replace('/[^0-9]/', '', $data['cpf']);
        if (isset($data['celular'])) $data['celular'] = preg_replace('/[^0-9]/', '', $data['celular']);
        if (isset($data['telefone'])) $data['telefone'] = preg_replace('/[^0-9]/', '', $data['telefone']);
        
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Realiza a "exclusão lógica" (soft delete) de um usuário.
     * Em vez de apagar o registro, este método preenche a coluna 'deleted_at' com a data e hora atuais.
     *
     * @param int $id ID do usuário a ser "excluído".
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function soft_delete_user($id) {
        $data = array('deleted_at' => date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}