<?php 

namespace App\Models;

use PDO;
    
class Ticket {
    private $connection;
    private $table = 'chamados';

    public function __construct($db){
        $this->connection = $db;
    }

    // função para criar um chamado
    public function create($usuario_id, $titulo, $categoria, $descricao){
        $query = "INSERT INTO " . $this->table . " 
                (usuario_id, titulo, categoria, descricao) 
                VALUES (:usuario_id, :titulo, :categoria, :descricao)";
        // prepara banco de dados para receber comando com valores pendentes
        $statement = $this->connection->prepare($query);
        // preenche os valores pendentes
        $statement->bindValue(':usuario_id', $usuario_id);
        $statement->bindValue(':titulo', $titulo);
        $statement->bindValue(':categoria', $categoria);
        $statement->bindValue(':descricao', $descricao);
        
        return $statement->execute();
    }

    // função para retornar os chamados feitos por um usuário específico
    public function findByUserId($usuario_id){
        $query = "SELECT c.*, u.nome as autor 
                  FROM " . $this->table . " c
                  INNER JOIN usuarios u ON c.usuario_id = u.id
                  WHERE c.usuario_id = :usuario_id 
                  ORDER BY c.created_at DESC";
        // prepara banco de dados para receber comando com valores pendentes
        $statement = $this->connection->prepare($query);
        // preenche os valores pendentes
        $statement->bindValue(':usuario_id', $usuario_id);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // função para retornar todos os chamados
    public function findAll(){
        $query = "SELECT c.*, u.nome as autor 
                        FROM " . $this->table . " c
                        INNER JOIN usuarios u ON c.usuario_id = u.id
                        ORDER BY c.created_at DESC";
        // prepara banco de dados para receber comando com valores pendentes
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // função marcar chamado como resolvido e colocar comentário
    public function resolve($id, $resposta) {
        $query = "UPDATE " . $this->table . " 
                  SET status = 'resolvido', resposta_admin = :resposta, updated_at = NOW() 
                  WHERE id = :id";
        
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':resposta', $resposta);
        
        return $statement->execute();
    }

    // função para excluir um chamado
    public function delete($id, $usuario_id) {
        // SEGURANÇA: o WHERE garante que só o dono pode excluir
        $query = "UPDATE " . $this->table . " 
                  SET status = 'excluido', updated_at = NOW() 
                  WHERE id = :id AND usuario_id = :usuario_id AND status = 'aberto'";
        
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':usuario_id', $usuario_id);
        
        return $statement->execute();
    }
}

?>