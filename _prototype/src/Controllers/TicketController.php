<?php 

namespace App\Controllers;

use App\Models\Database;
use App\Models\Ticket;

class TicketController {

    public function store(){
        session_Start();

        // SEGURANÇA: Se não estiver logado, manda pro login
        if (!isset($_SESSION['autenticado']) || !$_SESSION['autenticado']) {
            header('Location: ../index.php?login=semsessao');
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // coleta de dados via POST
            $titulo = $_POST['titulo'] ?? null;
            $categoria = $_POST['categoria'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $usuario_id = $_SESSION['id']; // pega o ID de quem está logado 
            
           if ($titulo && $categoria && $descricao) {
                // conecta e salva chamado no banco de dados
                $db = new Database();
                $connection = $db->getConnection();

                $ticketModel = new Ticket($connection);

                if ($ticketModel->create($usuario_id, $titulo, $categoria, $descricao)) {
                    // Sucesso: Volta para abrir chamado com mensagem verde
                    header('Location: ../abrir_chamado.php?status=sucesso');
                    exit;
                }
            }

        // em caso de erro
        header('Location: ../abrir_chamado.php?status=erro');
        exit;
        }
    }

    public function close() {
        session_start();

        // verifica se está logado
        if (!isset($_SESSION['autenticado']) || !$_SESSION['autenticado']) {
            header('Location: ../index.php?login=semsessao');
            exit;
        }

        // SEGURANÇA: verifica se é ADMIN (Impedir que usuários comuns forcem a URL)
        if ($_SESSION['perfil'] !== 'admin') {
            header('Location: ../home.php');
            exit;
        }

        // pega o ID via GET (ex: resolve_chamado.php?id=5)
        $id = $_GET['id'] ?? null;

        if ($id) {
            $db = new Database();
            $ticketModel = new Ticket($db->getConnection());

            $ticketModel->closeTicket($id);
        }

        header('Location: ../consultar_chamado.php');
        exit;
    }

}

?>