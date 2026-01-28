<?php 

namespace App\Models;

Use PDO;

class Ticket {
    private $connection; 
    private $table = 'chamados';

    public function __construct($db){
        $this->connection = $db;
    }

    // método para criar um novo chamado
    public function create($usuario_id, $titulo, $categoria, $descricao){
        $query = "INSERT INTO " . $this->table . " 
                (usuario_id, titulo, categoria, descricao) 
                VALUES (:usuario_id, :titulo, :categoria, :descricao)";
        // avisa ao banco de dados que ele irá receber um comando (mas sem mostrar os dados)
        $statement = $this->connection->prepare($query);
        // preenche quais são os dados do comando (SEGURANÇA)
        $statement->bindValue(':usuario_id', $usuario_id);
        $statement->bindValue(':titulo', $titulo);
        $statement->bindValue(':categoria', $categoria);
        $statement->bindValue(':descricao', $descricao);
        // retorna uma confirmação se o chamado foi criado com sucesso
        if ($statement->execute()){
            return true;
        } 
        return false; 
    }

    // método para buscar os chamados de um usuário específico (para perfil comum de usuário)
    public function getTicketsByUserId($usuario_id) {
        $query = "SELECT c.*, u.nome as autor 
                  FROM " . $this->table . " c
                  INNER JOIN usuarios u ON c.usuario_id = u.id
                  WHERE c.usuario_id = :usuario_id 
                  ORDER BY c.id DESC";
        
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':usuario_id', $usuario_id);
        $statement->execute();

        // fetchAll traz TODAS as linhas encontradas (uma lista)
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // método para buscar todos os chamados (para perfil de administrador)
    public function getAllTickets() {
        $query = "SELECT c.*, u.nome as autor 
                  FROM " . $this->table . " c
                  INNER JOIN usuarios u ON c.usuario_id = u.id
                  ORDER BY c.id DESC";
        
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para encerrar (Soft Delete)
    public function closeTicket($id) {
        $query = "UPDATE " . $this->table . " SET status = 'fechado' WHERE id = :id";
        
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

?>