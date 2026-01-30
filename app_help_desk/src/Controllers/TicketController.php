<?php 

namespace App\Controllers;

use App\Config\Database;
use App\Models\Ticket;

class TicketController {

    // recebe dados do formulário e cria um chamado com eles
    public function store(){
        // SEGURANÇA: redireciona para a tela de login se o usuário não tiver uma sessão
        if (!isset($_SESSION['usuario'])){
            header('Location: /');
            exit;
        }   
        // recebe dados via requisição POST
        $titulo = $_POST['titulo'] ?? null;
        $categoria = $_POST['categoria'] ?? null;
        $descricao = $_POST['descricao'] ?? null;
        $usuario_id = $_SESSION['usuario']['id'];

        if ($titulo && $categoria && $descricao){
            // faz conexão com banco de dados 
            $db = new Database(); 
            $ticketModel = new Ticket($db->getConnection());
            // tenta registrar chamado no banco de dados
            // SUCESSO: vai para a tela de login com mensagem de sucesso
            if($ticketModel->create($usuario_id, $titulo, $categoria, $descricao)){
                header('Location: /?msg=cadastro_sucesso');
                exit;
            }
        }
        // FRACASSO: retorna a tela de abrir chamado com mensagem de erro
        header('Location: /abrir_chamado?erro=falha');
        exit;
    }

    // método para exibir os chamados registros baseados nos tipos de perfis 
    // 'user' -> só vê os que ele abriu, 'admin' -> vê todos
    public function list(){
        $db = new Database(); 
        $ticketModel = new Ticket($db->getConnection());

        $profile = $_SESSION['usuario']['perfil'];
        $id = $_SESSION['usuario']['id'];

        if ($profile == 'admin') {
            return $ticketModel->findAll();
        } else {
            return $ticketModel->findByUserId($id);
        }
    }

    // método para resolver chamado
    public function resolve() {
        session_start();
        // SEGURANÇA: só Admin pode entrar aqui
        if ($_SESSION['usuario']['perfil'] !== 'admin') {
            header('Location: /home');
            exit;
        }

        $id = $_POST['id'] ?? null;
        $resposta = $_POST['resposta'] ?? null;

        if ($id && $resposta) {
            $db = new Database();
            $ticket = new Ticket($db->getConnection());
            $ticket->resolve($id, $resposta);
        }

        header('Location: /consultar_chamado');
        exit;
    }

    // método para deletar chamado
    public function delete() {
        session_start();
        // SEGURANÇA: tem que estar logado
        if (!isset($_SESSION['usuario'])) {
            header('Location: /');
            exit;
        }

        $id = $_POST['id'] ?? null;
        $usuario_id = $_SESSION['usuario']['id'];

        if ($id) {
            $db = new Database();
            $ticket = new Ticket($db->getConnection());
            // passado o usuario_id para garantir que ele não exclua o chamado do vizinho
            $ticket->delete($id, $usuario_id);
        }

        header('Location: /consultar_chamado');
        exit;
    }

}

?>