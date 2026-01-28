<?php 
namespace App\Controllers;

use App\Models\Database;
use App\Models\User;

class LoginController {

    public function login(){
        // verifica se os dados chegaram via POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
            
            // conecta ao banco de dados
            $db = new Database();
            $connection = $db->getConnection();

            // instância usuário 
            $userModel = new User($connection);

            // tenta autenticar 
            $usuario = $userModel->authenticate($email, $senha);

            if ($usuario) {
                // SUCESSO: Inicia a sessão e guarda os dados
                session_start();
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['perfil'] = $usuario['perfil'];

                $_SESSION['autenticado'] = true;
                // Redireciona para a home
                header('Location: ../home.php');
            } else {
                // FALHA: Redireciona de volta com erro
                header('Location: ../index.php?login=erro');
                exit;
            }
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: ../index.php');
        exit;
    }
}

?>