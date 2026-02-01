# Send Mail MVC

Um sistema para enviar e-mails e visualizar histórico de envios. Desenvolvido em PHP utilizando a arquitetura MVC.

---

## Estrutura do Projeto

```text
/
├── composer.json     # PHPMailer e PHPDoenv
├── .env.example      # Para colocar credenciais de email
├── database.sql      # O script de criação do Banco de Dados
├── public/           # Arquivos públicos (index.php e arquivos estáticos)
├── src/
│   ├── Config/       # Configuração do Banco de Dados
│   ├── Controllers/  # Lógica de controle (Auth, Ticket)
│   ├── Models/       # Classe para salvar/buscar emails no Banco de Dados
│   └── Services/     # Código para enviar o email
├── views/            # Telas do sistema
├── screenshots/      # Imagens do README
└── vendor/           # Autoload do Composer
```

---