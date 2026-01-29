<?php 
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Database;
use App\Models\Ticket;

// SEGURANÇA DE SESSÃO
session_start();
// verifica se variável de autenticação existe
// se não, expulsa o usuário
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != true){
  header('Location: index.php?login=semsessao');
  exit();
}

// BUSCA DE DADOS
$db = new Database();
$connection = $db->getConnection();
// busca os chamados do usuário logado
$ticketModel = new Ticket($connection);

if ($_SESSION['perfil'] == 'admin') {
    // se for admin, pega TUDO
    $chamados = $ticketModel->getAllTickets();
} else {
    // se for usuário comum, pega só os DELE
    $chamados = $ticketModel->getTicketsByUserId($_SESSION['id']);
}
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="routes/logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
            
            <!-- LÓGICA PARA EXIBIR DADOS -->
            <?php foreach($chamados as $chamado) { ?>

              <?php 
                $cardClass = ($chamado['status'] == 'fechado') ? 'bg-secondary text-white' : 'bg-light';
                $statusText = ($chamado['status'] == 'fechado') ? '(ENCERRADO)' : '';
              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">

                  <h5 class="card-title">
                    <?php echo htmlspecialchars($chamado['titulo'])?>
                    <small><?php echo $statusText; ?></small>
                  </h5>

                  <h6 class="card-subtitle mb-2 text-muted">
                    <small>Aberto por: <?php echo htmlspecialchars($chamado['autor']); ?></small>
                  </h6>

                  <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($chamado['categoria'])?></h6>

                  <p class="card-text"><?php echo htmlspecialchars($chamado['descricao'])?></p>

                  <?php if ($_SESSION['perfil'] == 'admin' && $chamado['status'] == 'aberto') { ?>
                    <div class="text-right">
                          <a href="routes/resolve_chamado.php?id=<?php echo $chamado['id']; ?>" class="btn btn-sm btn-danger">
                              Encerrar Chamado
                          </a>
                    </div>
                  <?php } ?>

                </div>
              </div>

            <?php } ?>
            
            <!-- MENSAGEM PARA CASO NÃO TENHA NENHUM CHAMADO -->
            <?php if(count($chamados) == 0) { ?>
              <div class="text-center text-muted">
                  Você ainda não abriu nenhum chamado.
              </div>
            <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>