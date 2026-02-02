<?php 

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class Mailer {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        // configurações técnicas
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP(); 
        $this->mail->SMTPDebug = $_ENV['SMTP_DEBUG'];

        // configurações do servidor                                   
        $this->mail->Host       = $_ENV['SMTP_HOST']; 
        $this->mail->SMTPAuth   = (bool)$_ENV['SMTP_AUTH']; 
        $this->mail->Username   = $_ENV['SMTP_USER']; 
        $this->mail->Password   = $_ENV['SMTP_PASS']; 
        $this->mail->SMTPSecure = $_ENV['SMTP_SECURE']; 
        $this->mail->Port       = $_ENV['SMTP_PORT'];                              

    }

    public function send_email($para, $assunto, $mensagem){
        try {
            // remetente e destinário
            $this->mail->setFrom($_ENV['SMTP_USER'], $_ENV['SMTP_SENDER_NAME']);
            $this->mail->addAddress($para);     

            // conteúdo do e-mail
            $this->mail->isHTML(true);                                  
            $this->mail->Subject = $assunto;
            $this->mail->Body    = $mensagem;
            // strip_tags limpa o HTML para a versão em texto puro
            $this->mail->AltBody = strip_tags($mensagem);

            $this->mail->send();

            // SUCESSO: e-mail enviado
            return [
                'sucesso' => true, 
                'erro' => null
            ];

        } catch (Exception $e){
            // FRACASSO: ocorreu algum erro no envio
            return [
                'sucesso' => false, 
                'erro' => $this->mail->ErrorInfo
            ];
        }
    }
}

?>