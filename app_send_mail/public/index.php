<?php 
require_once __DIR__ . '/../vendor/autoload.php';

// carregar variáveis de ambiente antes de tudo
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use App\Controllers\EmailController;

// pega caminho atual da URL (sem domínio e sem parâmetros)
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// ROTAS DE AÇÃO
if ($url == '/new_email/send' && $_SERVER['REQUEST_METHOD'] == 'POST'){
	(new EmailController())->send();
	exit;
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
		(new EmailController())->history();
		break;

	default:
		echo "<div class='container py-5 text-center'>";
        echo "<h1 class='display-1 text-muted'>404</h1>";
        echo "<p class='lead'>Ops! Página não encontrada.</p>";
        echo "</div>";
        break;
}

require __DIR__ . '/../views/partials/footer.php';

?>