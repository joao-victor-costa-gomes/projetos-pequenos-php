<?php 

namespace App\Models;

use PDO;

class User {
    private $connection;
    private $table = 'usuarios';

    public function __construct($db){
        $this->connection = $db;
    }

    // procura usuário no banco de dados pelo email informado
    public function findByEmail($email){
        $query = "SELECT * FROM " . $this->table .
                " WHERE email = :email LIMIT 1"; 
        // prepara banco de dados para receber comando com valores pendentes
        $statement = $this->connection->prepare($query);
        // preenche os valores pendentes
        $statement->bindValue(':email', $email);
        // executa comando
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // cria um usuário (processo de registro)
    public function create($username, $email, $password, $profile){
        $query = "INSERT INTO " . $this->table . 
                " (nome, email, senha, perfil) 
                VALUES (:nome, :email, :senha, :perfil)";
        // prepara banco de dados para receber comando com valores pendentes
        $statement = $this->connection->prepare($query);
        // cria um hash para a senha 
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // preenche os valores pendentes
        $statement->bindValue(':nome', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':senha', $passwordHash);
        $statement->bindValue(':perfil', $profile);
        
        // executa comando e retorna se registro deu certo
        if ($statement->execute()){
            return true;
        } 
        return false;
    }
}
?>