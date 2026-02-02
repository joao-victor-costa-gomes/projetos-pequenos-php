# 📧 Send Mail MVC

Um sistema para enviar e-mails e visualizar histórico de envios. Desenvolvido em PHP utilizando a arquitetura MVC. 

![Badge PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Badge MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Badge Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![Badge Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)

---

## 📸 Screenshots

### Tela Inicial (home.php)
![Home](./screenshots/home.png)

### Tela de Envio de E-mail (new_email.php)
![Novo Email](./screenshots/new_email.png)

### Tela de Histórico de E-mails (history.php)
![Histórico](./screenshots/history.png)

---

## 🚀 Funcionalidades

- **Envio de e-mails:** Integração segura com servidores reais (Gmail, Outlook, Mailtrap) usando PHPMailer.

- **Histórico de e-mails:** Armazenamento de todos os envios no banco de dados MySQL.


---

## 📂 Estrutura do Projeto

```text
/
├── composer.json       # Gerenciador de dependências (PHPMailer e PHPDoenv)
├── .env.example        # Modelo para suas variáveis de ambiente
├── database.sql        # Script SQL para criação da tabela
├── public/             # Ponto de entrada (index.php) e assets
├── src/
│   ├── Config/         # Configuração da conexão PDO com o Banco
│   ├── Controllers/    # Controladores que unem o Model e a View
│   ├── Models/         # Camada de acesso ao Banco de Dados (DAO)
│   └── Services/       # Serviço isolado para disparo de e-mail (Mailer)
├── views/              # Telas HTML/PHP (Templates e Partials)
├── screenshots/        # Imagens da documentação
└── vendor/             # Autoload do Composer
```

---

## 🛠️ Instalação e Execução

### Pré-requisitos

- **PHP** 8.0 ou superior.

- **MySQL** (via XAMPP, WAMP, Docker ou instalado nativamente).

- **Composer** instalado.

### Configuração e Instalação

**1. Clone o repositório e entre na pasta desse projeto**

**2. Instale as bibliotecas do PHP (PHPMailer e Dotenv)**
```bash
composer install
```

**3. Configure o Banco de Dados**
- Abra seu gerenciador de banco de dados
- Crie um novo banco de dados.
- Importe o arquivo `database.sql` (que está na raiz do projeto) para criar a tabela. `emails_enviados`.

**4. Configure as variáveis de ambiente**
- Na raiz do projeto, duplique o arquivo `.env.example` e renomeie a cópia para `.env`.
- Abra o `.env` e configure suas credenciais.

**5. Rode o projeto**
Para iniciar o projeto, use o servidor embutido do PHP apontando para a pasta `public/`:
```bash
cd public
php -S localhost:8080
```
---