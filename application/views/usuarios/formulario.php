<h2><?php echo $title; ?></h2>

<?php
/**
 * O formulário é aberto de forma dinâmica.
 * A variável $action define se o formulário será submetido para o método 'cadastrar' ou 'editar',
 * tornando esta view reutilizável para ambas as operações.
 */
$action = 'usuarios/cadastrar';
if (isset($usuario['id'])) {
    $action = 'usuarios/editar/' . $usuario['id'];
}
echo form_open($action);
?>

<div class="row">
    <div class="col-md-8 mb-3">
        <label for="nome" class="form-label">Nome <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo set_value('nome', $usuario['nome'] ?? ''); ?>" required>
        <div class="text-danger"><?php echo form_error('nome'); ?></div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento <span class="text-danger">*</span></label>
        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="<?php echo set_value('data_nascimento', $usuario['data_nascimento'] ?? ''); ?>" required>
        <div class="text-danger"><?php echo form_error('data_nascimento'); ?></div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email', $usuario['email'] ?? ''); ?>" required>
        <div class="text-danger"><?php echo form_error('email'); ?></div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="celular" class="form-label">Celular <span class="text-danger">*</span></label>
        <input type="text" class="form-control celular" name="celular" id="celular" value="<?php echo set_value('celular', $usuario['celular'] ?? ''); ?>" placeholder="(00) 00000-0000" required>
        <div class="text-danger"><?php echo form_error('celular'); ?></div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control phone" name="telefone" id="telefone" value="<?php echo set_value('telefone', $usuario['telefone'] ?? ''); ?>" placeholder="(00) 0000-0000">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label for="cpf" class="form-label">CPF <span class="text-danger">*</span></label>
        <input type="text" class="form-control cpf" name="cpf" id="cpf" value="<?php echo set_value('cpf', $usuario['cpf'] ?? ''); ?>" placeholder="000.000.000-00" required>
        <div class="text-danger"><?php echo form_error('cpf'); ?></div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="rg" class="form-label">RG</label>
        <input type="text" class="form-control" name="rg" id="rg" value="<?php echo set_value('rg', $usuario['rg'] ?? ''); ?>">
    </div>
     <div class="col-md-4 mb-3">
        <label for="data_emissao_rg" class="form-label">Data de Emissão RG</label>
        <input type="date" class="form-control" name="data_emissao_rg" id="data_emissao_rg" value="<?php echo set_value('data_emissao_rg', $usuario['data_emissao_rg'] ?? ''); ?>">
    </div>
</div>

 <div class="row">
    <div class="col-md-4 mb-3">
        <label for="estado_civil" class="form-label">Estado Civil <span class="text-danger">*</span></label>
        <select class="form-select" name="estado_civil" id="estado_civil" required>
            <?php $estado_civil_val = set_value('estado_civil', $usuario['estado_civil'] ?? ''); ?>
            <option value="">Selecione...</option>
            <option value="Solteiro(a)" <?php if($estado_civil_val == 'Solteiro(a)') echo 'selected'; ?>>Solteiro(a)</option>
            <option value="Casado(a)" <?php if($estado_civil_val == 'Casado(a)') echo 'selected'; ?>>Casado(a)</option>
            <option value="Divorciado(a)" <?php if($estado_civil_val == 'Divorciado(a)') echo 'selected'; ?>>Divorciado(a)</option>
            <option value="Viúvo(a)" <?php if($estado_civil_val == 'Viúvo(a)') echo 'selected'; ?>>Viúvo(a)</option>
            <option value="União Estável" <?php if($estado_civil_val == 'União Estável') echo 'selected'; ?>>União Estável</option>
        </select>
        <div class="text-danger"><?php echo form_error('estado_civil'); ?></div>
    </div>
</div>

<div class="mb-3">
    <label for="observacoes" class="form-label">Observações</label>
    <textarea class="form-control" name="observacoes" id="observacoes" rows="3"><?php echo set_value('observacoes', $usuario['observacoes'] ?? ''); ?></textarea>
</div>

<a href="<?php echo base_url('usuarios'); ?>" class="btn btn-secondary">Cancelar</a>
<button type="submit" class="btn btn-primary">Salvar</button>

<?php echo form_close(); ?>