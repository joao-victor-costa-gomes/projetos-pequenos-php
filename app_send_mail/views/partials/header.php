<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Send Mail</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
            cursor: pointer;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="bi bi-send-fill me-2"></i>App Send Mail
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/"><u>Home</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/nova_email"><u>Novo E-mail</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/history"><u>Histórico</u></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-wrapper py-4">