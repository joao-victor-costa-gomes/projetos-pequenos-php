<?php

require_once __DIR__  . '/../../vendor/autoload.php';

use App\Controllers\LoginController;

// Instancia o controlador e chama o método de login
$controller = new LoginController();
$controller->login();

?>