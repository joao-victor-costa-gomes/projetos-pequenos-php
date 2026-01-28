<?php 

namespace App\Models; 

// importando biblioteca nativa para conexão com o banco de dados
use PDO;
use PDOException; 

class Database {
    // variáveis de banco de dados
    private $host = 'localhost';
    private $db_name = 'help_desk';
    private $username = 'root';
    private $password = '';
    public $connection;

    // metódo para realizar conexão com banco de dados
    public function getConnection(){
        $this->connection = null;

        // primeiro tenta estabelecer uma conexão
        try {
            $this->connection = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,  
                $this->username, 
                $this->password,
            );
        
        // utiliza PDOException como modo de erro
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // define charset para aceitar pontuação correta
        $this->connection->exec('set names utf8');
        
        // retorna o erro caso haja algum 
        } catch (PDOException $exception){
            echo "Erro na conexão: " . $exception->getMessage();
        }

        return $this->connection;
    }

}

?>