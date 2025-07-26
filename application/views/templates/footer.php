</div> <footer class="text-center mt-5 mb-3">
        <p>&copy; <?php echo date('Y'); ?> - Painel de Controle</p>
    </footer>

    <?php
    /**
     * Scripts JavaScript são carregados no final do body para otimizar o tempo de carregamento da página.
     * O navegador renderiza o HTML/CSS primeiro, proporcionando uma experiência mais rápida para o usuário.
     */
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <?php
    /**
     * Script customizado para inicializar plugins e máscaras no site.
     * Envolvido em $(document).ready() para garantir que o DOM esteja totalmente carregado antes de manipular os elementos.
     */
    ?>
    <script>
        $(document).ready(function(){
            // Aplica as máscaras aos inputs que possuem as classes correspondentes.
            $('.celular').mask('(00) 00000-0000');
            $('.phone').mask('(00) 0000-0000');
            $('.cpf').mask('000.000.000-00', {reverse: true});
        });
    </script>
</body>
</html>