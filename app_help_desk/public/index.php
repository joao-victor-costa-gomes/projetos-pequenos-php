<?php 
// VARIÁVEL DE SEGURANÇA
define('CONTROLADO', true);

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\TicketController;

// pega caminho atual da URL, sem parâmetros e sem nome do domínio
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// router de URLS de ação
if ($url == '/login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    (new AuthController())->login();
    exit; // mata o script aqui para não carregar HTML
}

if ($url == '/logout') {
    (new AuthController())->logout();
    exit;
}

if ($url == '/auth/cadastrar' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    (new AuthController())->register();
    exit;
}

if ($url == '/ticket/store' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    (new TicketController())->store();
    exit;
}

if ($url == '/ticket/resolve' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    (new TicketController())->resolve();
    exit;
}

// User Exclui
if ($url == '/ticket/delete' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    (new TicketController())->delete();
    exit;
}

require __DIR__ . '/../views/partials/header.php';

// router de URLs
switch ($url) {
    case '/': 
    case '/index.php':
        // se já tiver uma sessão, vai direto pra home
        if (isset($_SESSION['usuario'])){
            header('Location: /home');
            exit;
        }
        require __DIR__ . '/../views/auth/login.php';
        break;
        
    case '/cadastro':
        require __DIR__ . '/../views/auth/register.php';
        break;

    case '/home':
        // se NÃO estive logado, joga para o login
        if (!isset($_SESSION['usuario'])){
            header('Location: /?erro=acesso_negado');
            exit;
        }
        require __DIR__ . '/../views/home/home.php';
        break;

    case '/abrir_chamado':
        if (!isset($_SESSION['usuario'])) { header('Location: /?erro=acesso_negado'); exit; }
        require __DIR__ . '/../views/tickets/create.php';
        break;

    case '/consultar_chamado':
        if (!isset($_SESSION['usuario'])) { header('Location: /?erro=acesso_negado'); exit; }
        $controller = new TicketController();
        $chamados = $controller->list();
        require __DIR__ . '/../views/tickets/list.php';
        break;

    default:
        echo "<div class='alert alert-warning text-center'>Página não encontrada (404)</div>";
        break;
}

require __DIR__ . '/../views/partials/footer.php';

?>