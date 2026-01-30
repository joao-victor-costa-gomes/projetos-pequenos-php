<?php if(!defined('CONTROLADO')) die('Acesso direto negado'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm px-4">
  
  <div class="container-fluid position-relative">
    
    <a class="navbar-brand d-flex align-items-center" href="/home">
      <img src="assets/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
      <span class="ms-2">App Help Desk</span>
    </a>

    <!-- se tiver algum usuário logado, mostrar nome no header e botão de logout -->
    <?php if (isset($_SESSION['usuario'])): ?>
        
        <div class="position-absolute start-50 translate-middle-x text-white text-center d-none d-md-block">
            <div class="fw-bold mb-1">
                Olá, <?php echo explode(' ', $_SESSION['usuario']['nome'])[0]; ?> 
            </div>
            <span class="badge rounded-pill bg-info text-dark badge-profile">
                <?php echo ucfirst($_SESSION['usuario']['perfil']); ?>
            </span>
        </div>

        <div class="ms-auto d-flex align-items-center">
            <a href="/logout" class="btn btn-outline-danger btn-sm">
                Sair
            </a>
        </div>

    <?php endif; ?>

  </div>
</nav>

<div class="container mt-5 main-content">
    
