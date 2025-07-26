🛡️ Painel de Controle de Usuários com Autenticação
📝 Descrição do Projeto
Este projeto implementa um painel de controle completo para gerenciamento de usuários, desenvolvido utilizando o framework CodeIgniter 3 (PHP 7+) e a biblioteca de interface Bootstrap 5. O sistema oferece funcionalidades essenciais de CRUD (Criar, Ler, Atualizar e Excluir) para um cadastro de usuários, além de um sistema de autenticação robusto para proteger o acesso administrativo.

✨ Funcionalidades Principais
Listagem de Usuários Ativos: Exibe uma tabela responsiva com todos os usuários cadastrados e ativos no sistema.

Cadastro Simplificado de Usuários: Formulário intuitivo para adicionar novos usuários, com validação abrangente de campos obrigatórios, formato de email e garantia de unicidade para CPF e endereço de email.

Edição Detalhada de Usuários: Permite a modificação dos dados de usuários existentes através de um formulário pré-populado, mantendo as mesmas regras de validação do cadastro.

Exclusão Lógica Inteligente: Implementa a exclusão lógica de usuários, preservando a integridade dos dados ao invés da remoção física. Os registros são marcados como excluídos através da coluna deleted_at.

Sistema de Autenticação Seguro: Protege o acesso ao painel administrativo por meio de um sistema de login baseado em email e senha, com armazenamento seguro de senhas utilizando criptografia.

Funcionalidade de Logout: Permite que o administrador encerre a sessão de forma segura.

Validação de Formulários Integrada: Utilização da poderosa biblioteca de validação do CodeIgniter para assegurar a consistência e a integridade dos dados submetidos.

Máscaras de Input para Usabilidade: Aplicação de máscaras nos campos de CPF e celular, proporcionando uma experiência de entrada de dados mais fluida e prevenindo erros comuns.

⚙️ Pré-requisitos
PHP: Versão 7.0 ou superior.

Composer: Gerenciador de dependências do PHP (geralmente instalado por padrão).

Servidor Web: Apache ou Nginx (configurado para processar arquivos PHP).

Banco de Dados: MySQL (ou outro banco de dados compatível com CodeIgniter).

CodeIgniter 3: O framework PHP utilizado na construção do projeto.

🚀 Instalação e Configuração
Obtenha o Código Fonte:
Clone este repositório para o seu ambiente de desenvolvimento local:
```bash
git clone URL_DO_SEU_REPOSITORIO.git
```

Configure o Banco de Dados:

Crie um novo banco de dados no seu servidor MySQL (ou similar) com o nome de sua preferência (ex: painel_controle_db).

Importe o conteúdo do arquivo database.sql, localizado na raiz do projeto, para dentro do banco de dados recém-criado. Este script contém a estrutura das tabelas usuarios e admins.

Ajustes de Configuração do CodeIgniter:

Navegue até o diretório application/config/ dentro da pasta do seu projeto.

config.php: Edite este arquivo para definir a base_url com o endereço URL do seu projeto no ambiente local (ex: http://localhost/painel-controle/).

database.php: Configure as credenciais de conexão com o seu banco de dados:

hostname: localhost (valor padrão)

username: SEU_USUARIO_DO_BANCO

password: SUA_SENHA_DO_BANCO

database: NOME_DO_BANCO_DE_DADOS

dbdriver: mysqli (para MySQL)

Execute a Aplicação:

Garanta que o seu servidor web (Apache ou Nginx) esteja em execução e configurado para apontar para a pasta raiz do seu projeto.

Acesse o painel de controle através do seu navegador utilizando a base_url configurada no passo anterior.

🔑 Acesso ao Painel Administrativo
Para acessar a área de login do painel de controle, direcione seu navegador para o URL da sua aplicação (ex: http://localhost/painel-controle/).

Utilize as seguintes credenciais padrão para o administrador:

Email: admin@painel.com

Senha: admin123
(A senha é armazenada de forma segura e criptografada no banco de dados.)

📂 Estrutura de Pastas do Projeto
application/controllers/: Contém os controladores (Auth.php, Usuarios.php) que orquestram a lógica da aplicação e a interação com o Model e as Views.

application/models/: Armazena os models (Usuario_model.php) responsáveis pela comunicação e manipulação dos dados no banco de dados.

application/views/: Organiza os arquivos de visualização (HTML) da aplicação, separados em diretórios como auth (para autenticação), usuarios (para gerenciamento de usuários) e templates (para layouts reutilizáveis).

application/config/: Contém os arquivos de configuração do framework CodeIgniter.

database.sql: Script SQL para a criação das tabelas usuarios e admins no banco de dados.

README.md: Este arquivo, fornecendo informações essenciais sobre o projeto.

.htaccess: Arquivo de configuração para o servidor Apache (pode ser utilizado para remover a necessidade de index.php nas URLs).

📌 Observações Importantes
Este projeto foi desenvolvido com fins educacionais e demonstra a implementação de um conjunto básico de funcionalidades CRUD com autenticação, utilizando o framework CodeIgniter 3 e o framework de interface Bootstrap 5.

Em um ambiente de produção real, é crucial implementar medidas de segurança adicionais para proteger a aplicação contra vulnerabilidades.
