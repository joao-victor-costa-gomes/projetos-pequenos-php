<?php 

namespace App\Controllers;

use App\Config\Database;
use App\Models\EmailLog;
use App\Services\Mailer;

class EmailController {
    public function send(){
        $para = $_POST['para'] ?? null; 
        $assunto = $_POST['assunto'] ?? null; 
        $mensagem = $_POST['mensagem'] ?? null; 

        // caso algum dado esteja faltando
        if (!$para || !$assunto || !$mensagem) {
            header('Location: /new_email?erro=dados_invalidos');
            exit;
        }

        // tenta enviar email primeiro
        $mailer = new Mailer();
        $resultado = $mailer->send_email($para, $assunto, $mensagem);

        $db = new Database();
        $emailModel = new EmailLog($db->getConnection());

        // define o status baseado na resposta do Mailer
        $statusParaBanco = $resultado['sucesso'] ? 'sucesso' : 'erro';
        $logErro = $resultado['erro'];

        // registra tentativa de envio de email
        $emailModel->create($para, $assunto, $mensagem, $statusParaBanco, $logErro);
        
        // redireciona o usuário
        if ($resultado['sucesso']) {
            // SUCESSO: vai para o histórico mostrar que deu certo
            header('Location: /history?msg=sucesso');
        } else {
            // ERRO: Volta para o formulário avisando que falhou
            header('Location: /new_email?msg=erro_envio');
        }
        exit;
    }

    public function history(){
        $db = new Database();
        $emailModel = new EmailLog($db->getConnection());
        // carrega a página history.php com a variável $emails incluída
        $emails = $emailModel->findAll();
        require __DIR__ . '/../../views/history.php';
    }

}

?>