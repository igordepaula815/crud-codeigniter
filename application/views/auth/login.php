<?php
/**
 * View: Login (login.php)
 *
 * Esta view renderiza o formulário de autenticação para o painel de controle.
 *
 * @var string $title           O título da página.
 * @var string|null $error_message Mensagem de erro em caso de falha no login.
 * @var string|null $email_attempt O email digitado pelo usuário em uma tentativa falha.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: 10vh auto;
            padding: 2rem;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb-4">Painel de Controle</h2>

            <?php // Exibe a mensagem de erro de login, se houver uma. ?>
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <?php echo form_open('auth/login', array('autocomplete' => 'off')); ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo isset($email_attempt) ? html_escape($email_attempt) : ''; ?>" required>
                    <div class="text-danger"><?php echo form_error('email'); ?></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="text-danger"><?php echo form_error('password'); ?></div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>