<?php
/**
 * Template: Cabeçalho (header.php)
 * * Este arquivo contém a estrutura inicial de todas as páginas do painel de controle,
 * incluindo o doctype, head, a barra de navegação (navbar) e a abertura do container principal.
 * * @var string $title O título da página, passado pelo controller.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($title) ? $title : 'Painel de Controle'; ?> - Painel de Controle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('usuarios'); ?>">Painel de Controle</a>
            
            <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-outline-light">Sair</a>
        </div>
    </nav>

    <div class="container">

    <?php
    /**
     * Bloco para exibição de mensagens de feedback (Flashdata).
     * Exibe mensagens de sucesso ou erro que são passadas entre as requisições.
     */
    ?>
    <?php if ($this->session->flashdata('success_message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success_message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_message')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('error_message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>