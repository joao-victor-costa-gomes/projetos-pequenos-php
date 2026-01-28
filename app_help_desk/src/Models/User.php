<?php 

namespace App\Models; 

Use PDO;

class User { 
    private $connection;
    private $table = 'usuarios'; 

    public function __construct($db){
        $this->connection = $db; 
    }

    public function authenticate($email, $password){
        // 1. busca usuário pelo email
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
        // avisa ao banco de dados que ele irá receber um comando (mas sem mostrar os dados)
        $statement = $this->connection->prepare($query);
        // preenche quais são os dados do comando (SEGURANÇA)
        $statement->bindValue(':email', $email);
        // executa o comando com os dados 
        $statement->execute();
        // pega o resultado da consulta e retorna em um array associativo
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // 2. se o usuário existe, verifica senha informada
        if ($user) {
            if (password_verify($password, $user['senha'])){
                return $user; // SUCESSO
            }
        }

        return false; // FRACASSO
    }
}

?>