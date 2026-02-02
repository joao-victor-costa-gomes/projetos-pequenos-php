<?php 

namespace App\Models;

use PDO; 

class EmailLog {
    private $connection; 
    private $table = 'emails';

    public function __construct($db){
        $this->connection = $db;
    }

    // função para registrar envio (ou tentativa de envio) de emails
    public function create($para, $assunto, $mensagem, $status, $logErro = null){
        $query = "INSERT INTO " . $this->table . " 
                (destinatario, assunto, mensagem, status, log_erro) 
                VALUES (:para, :assunto, :mensagem, :status, :log_erro)";
        // prepara banco de dados para receber comando com valores pendentes
        $statement = $this->connection->prepare($query);
        // preenche os valores pendentes
        $statement->bindValue(':para', $para);
        $statement->bindValue(':assunto', $assunto);
        $statement->bindValue(':mensagem', $mensagem);
        $statement->bindValue(':status', $status);
        $statement->bindValue(':log_erro', $logErro);

        return $statement->execute();
    }

    // função para pegar todos os emails
    public function findAll(){
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>