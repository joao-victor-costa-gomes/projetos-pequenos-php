<?php 

namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;

    public $connection;

    public function getConnection(){
        $this->connection = null;

        $this->host     = $_ENV['DB_HOST'] ?? '';
        $this->db_name  = $_ENV['DB_NAME'] ?? '';
        $this->username = $_ENV['DB_USER'] ?? '';
        $this->password = $_ENV['DB_PASS'] ?? '';
    
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
                
        } catch (PDOException $e){
            // em caso de erro, mata execução e exibe mensagem
            die("<strong>Erro de conexão com o Banco de Dados: </strong>" . $e->getMessage());
        }

        return $this->connection;
    }
}

?>