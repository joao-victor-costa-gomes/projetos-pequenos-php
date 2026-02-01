<?php 

require_once __DIR__ . '/../vendor/autoload.php';
use App\Controllers\EmailController;

// pega caminho atual da URL (sem domínio e sem parâmetros)
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// ROTAS DE AÇÃO
if ($url == '/new_email/send' && $_SERVER['REQUEST_METHOD'] == 'POST'){
	(new EmailController())->send();
	// exit;
}

// ROTAS PÚBLICAS
// carrega conteúdo das páginas públicas (com header e footer)

require __DIR__ . '/../views/partials/header.php';

switch ($url) {
	case '/':
		require __DIR__ . '/../views/home.php';
		break;

	case '/new_email':
		require __DIR__ . '/../views/new_email.php';
		break;

	case '/history':
		require __DIR__ . '/../views/history.php';
		break;

	default:
		echo "<h1>PÁGINA NÃO ENCONTRADA (ERRO 404)</h1>";
		break;
}

require __DIR__ . '/../views/partials/footer.php';

?>