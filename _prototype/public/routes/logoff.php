<?php 

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\LoginController;

$controller = new LoginController();
$controller->logout();

?>