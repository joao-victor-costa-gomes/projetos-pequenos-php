# 🚀 Help Desk MVC

Um sistema de gerenciamento de chamados (Ticket System) desenvolvido em PHP utilizando a arquitetura MVC.

## Funcionalidades

### Autenticação & Segurança
- **Login e Cadastro:** Sistema completo de registro de usuários.
- **Hash de Senha:** Utilização de `password_hash` (Bcrypt) para segurança.
- **Sessões Seguras:** Proteção contra sequestro de sessão e acesso direto a arquivos.
- **Feedback Visual:** Mensagens de erro/sucesso (Flash Messages) para o usuário.

### Perfil Usuário
- Abrir novos chamados de suporte.
- Consultar histórico de chamados próprios.
- Excluir chamados que ainda estão "Abertos".
- Visualizar status (Aberto, Resolvido, Excluído).

### Perfil Administrador
- Visualizar chamados de **todos** os usuários.
- Responder chamados (a resposta fecha o ticket automaticamente).
- Identificação visual facilitada do status dos tickets.

---

## Screenshots

### 1. Login e Autenticação
![Tela de Login](./screenshots/login.png)

### 2. Dashboard do Usuário (Meus Chamados)
![Dashboard User](./screenshots/home_user.png)

### 3. Abertura de Chamado
![Abrir Chamado](./screenshots/create_ticket.png)

### 4. Visão do Admin (Respondendo)
![Admin Action](./screenshots/admin_response.png)

---

## Tecnologias Utilizadas

- **Back-end:** PHP 8+ (Sem frameworks).
- **Banco de Dados:** MySQL / MariaDB.
- **Front-end:** HTML5, CSS3, Bootstrap 5.
- **Gerenciador de Dependências:** Composer (para Autoload).
- **Servidor Local:** PHP Built-in Server.

---

## Estrutura do Projeto (MVC)

O projeto segue uma estrutura organizada para facilitar a manutenção:

```text
/
├── public/           # Arquivos públicos (index.php, CSS, JS)
├── src/
│   ├── Config/       # Configuração do Banco de Dados
│   ├── Controllers/  # Lógica de controle (Auth, Ticket)
│   └── Models/       # Acesso ao Banco (User, Ticket)
├── views/            # Telas do sistema (HTML/PHP)
├── screenshots/      # Imagens do README
└── vendor/           # Autoload do Composer
```

---