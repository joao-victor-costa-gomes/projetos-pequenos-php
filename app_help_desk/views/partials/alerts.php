<?php if(!defined('CONTROLADO')) die('Acesso direto negado'); ?>

<?php
// MENSAGENS DE ERRO 
if (isset($_GET['erro'])) {
    $msg = '';
    $cor = 'danger'; // padrão vermelho

    switch ($_GET['erro']) {
        case 'dados_invalidos':
            $msg = 'E-mail ou senha incorretos. Tente novamente.';
            break;
        case 'acesso_negado':
            $msg = 'Por favor, faça login para acessar o sistema.';
            $cor = 'warning'; // amarelo
            break;
        case 'falha':
            $msg = 'Ocorreu um erro ao processar sua solicitação. Tente novamente.';
            break;
    }

    if ($msg) {
        echo "<div class='alert alert-{$cor} alert-dismissible fade show text-center shadow-sm' role='alert'>
                {$msg}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
}

// MENSAGENS DE SUCESSO 
if (isset($_GET['msg'])) {
    $msg = '';
    $cor = 'success'; // padrão verde

    switch ($_GET['msg']) {
        case 'cadastro_sucesso':
            $msg = 'Cadastro realizado com sucesso! Faça seu login.';
            break;
        case 'criado':
            $msg = 'Chamado aberto com sucesso!';
            break;
        case 'excluido':
            $msg = 'Chamado excluído com sucesso.';
            $cor = 'secondary'; 
            break;
        case 'resolvido':
            $msg = 'Chamado resolvido e finalizado!';
            $cor = 'primary'; 
            break;
    }

    if ($msg) {
        echo "<div class='alert alert-{$cor} alert-dismissible fade show text-center shadow-sm' role='alert'>
                {$msg}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
}
?>