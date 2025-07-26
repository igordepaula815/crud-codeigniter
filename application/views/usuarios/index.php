<?php
/**
 * View: Lista de Usuários (index.php)
 *
 * Esta view renderiza a tabela principal com a lista de todos os usuários ativos.
 * Ela recebe os dados do método 'index' do controller 'Usuarios'.
 *
 * @var string $title    O título da página.
 * @var array  $usuarios Um array contendo os dados dos usuários vindos do banco.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><?php echo html_escape($title); ?></h2>
    <a href="<?php echo base_url('usuarios/cadastrar'); ?>" class="btn btn-primary">Novo Usuário</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Celular</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php // Verifica se o array de usuários não está vazio. ?>
            <?php if (!empty($usuarios)): ?>

                <?php // Loop para percorrer cada usuário e criar uma linha na tabela. ?>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo html_escape($usuario['nome']); ?></td>
                    <td><?php echo html_escape($usuario['email']); ?></td>
                    <td><?php echo html_escape($usuario['celular']); ?></td>
                    <td class="text-center">
                        <a href="<?php echo base_url('usuarios/editar/' . $usuario['id']); ?>" class="btn btn-sm btn-warning">Editar</a>
                        
                        <a href="<?php echo base_url('usuarios/excluir/' . $usuario['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            <?php else: ?>
                <?php // Caso não existam usuários, exibe uma mensagem na tabela. ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhum usuário cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>