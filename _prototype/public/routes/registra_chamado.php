<?php 

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\TicketController;

$controller = new TicketController();
$controller->store();

?>