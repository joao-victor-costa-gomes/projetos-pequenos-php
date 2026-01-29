<?php 
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

if (!isset($_SESSION['usuario'])){
    $_SESSION['usuario'] = ['nome'=>'Usuário Teste', 'perfil'=>'user'];
}

// pega caminho atual da URL, sem parâmetros e sem nome do domínio
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require __DIR__ . '/../views/partials/header.php';

switch ($url) {
    case '/': 
    case '/index.php':
        require __DIR__ . '/../views/auth/login.php';
        break;
        
    case '/cadastro':
        require __DIR__ . '/../views/auth/register.php';
        break;

    case '/home':
        require __DIR__ . '/../views/dashboard/home.php';
        break;

    case '/abrir_chamado':
        require __DIR__ . '/../views/tickets/create.php';
        break;

    case '/consultar_chamado':
        require __DIR__ . '/../views/tickets/list.php';
        break;

    default:
        echo "<div class='alert alert-warning text-center'>Página não encontrada (404)</div>";
        break;
}

require __DIR__ . '/../views/partials/footer.php';

?>