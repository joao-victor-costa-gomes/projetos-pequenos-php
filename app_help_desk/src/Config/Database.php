<?php 

namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $db_name = 'help_desk';
    private $username = 'root';
    private $password = '';

    public $connection; 

    public function getConnection(){
        $this->connection = null;

        try {
            // string de conexão
            // mysql:host=localhost;dbname=help_desk;charset=utf8
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8";
            // cria conexão
            $this->connection = new PDO($dsn, $this->username, $this->password);
            // configuração de erros e segurança
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // configuração para trazer dados em array associativo
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $exception){
            // se der erro, mata execução e mostra a mensagem
            die("Erro de conexão com o banco de dados:" . $exception->getMessage());
        }

        return $this->connection;
    }
}

?>