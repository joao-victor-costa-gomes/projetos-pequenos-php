<?php 

namespace App\Controllers;

use App\Config\Database;
use App\Models\User;

class AuthController {

    public function login(){
        // recebe dados via requisição POST
        $email = $_POST['email'] ?? null; 
        $password = $_POST['senha'] ?? null;

        if ($email && $password){
            // faz conexão com banco de dados 
            $db = new Database(); 
            // busca usuário no banco de dados 
            $userModel = new User($db->getConnection());
            $user = $userModel->findByEmail($email);
            // verifica se o usuário existe
            // verifica se o hash da senha digitada bate com a do banco de dados 
            if ($user && password_verify($password, $user['senha'])){
                // Deleta o arquivo de sessão antigo do servidor
                session_regenerate_id(true); 
                
                // SUCESSO: salva na sessão os dados do usuário
                session_start();
                $_SESSION['usuario'] = [
                    'id' => $user['id'],
                    'nome' => $user['nome'],
                    'email' => $user['email'],
                    'perfil' => $user['perfil'],
                ];
                header('Location: /home');
            }
        }
        // FRACASSO: volta para o login com mensagem de erro
        header('Location: /?erro=dados_invalidos');
        exit;
    }


    public function logout(){
        session_start();
        session_destroy();
        header('Location: /');
        exit();
    }


    public function register(){
        // recebe dados via requisição POST
        $username = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['senha'] ?? null;

        if ($username && $email && $password) {
            // faz conexão com banco de dados 
            $db = new Database(); 
            $userModel = new User($db->getConnection());
            // tenta criar usuário
            // SUCESSO: vai para a tela de login com mensagem de sucesso
            if($userModel->create($username, $email, $password, 'user')){
                header('Location: /?msg=cadastro_sucesso');
                exit;
            }
        }
        // FRACASSO: retorna a tela de cadastro com mensagem de erro
        header('Location: /cadastro?erro=falha');
        exit;
    }
}

?>