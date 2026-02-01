<?php 

namespace App\Models;

use PDO; 

class EmailLog {
    private $connection; 
    private $table = 'emails';

    public function __construct($db){
        $this->connection = $db;
    }

    public function send($para, $assunto, $mensagem){
        echo "Para: $para<br>Assunto: $assunto<br>Mensagem: $mensagem";
    }
}

?>