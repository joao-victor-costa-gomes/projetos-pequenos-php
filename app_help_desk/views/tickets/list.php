<?php if(!defined('CONTROLADO')) die('Acesso direto negado'); ?>

<div class="row justify-content-center">
    <div class="col-md-10">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Chamados</h2>
            <a href="/home" class="btn btn-outline-secondary">Voltar</a>
        </div>

        <?php require __DIR__ . '/../partials/alerts.php'; ?>

        <!-- caso não tenha nenhum chamado -->
        <?php if (count($chamados) == 0): ?>
            <div class="alert alert-info text-center">
                Nenhum chamado encontrado. <a href="/abrir_chamado">Abra o primeiro!</a>
            </div>
        <?php else: ?>

            <?php foreach($chamados as $chamado): ?>
                
                <?php 
                    // cores baseada no status
                    $borderClass = 'border-warning';
                    $badgeClass = 'bg-warning text-dark';
                    $bgClass = ''; 

                    if ($chamado['status'] == 'resolvido') {
                        $borderClass = 'border-success';
                        $badgeClass = 'bg-success';
                        $bgClass = 'bg-light';
                    } elseif ($chamado['status'] == 'excluido') {
                        $borderClass = 'border-secondary';
                        $badgeClass = 'bg-secondary';
                        $bgClass = 'bg-light text-muted';
                    }
                ?>

                <div class="card mb-3 border-start border-4 <?php echo $borderClass; ?> <?php echo $bgClass; ?> shadow-sm">
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title"><?php echo htmlspecialchars($chamado['titulo']); ?></h5>
                            <span class="badge <?php echo $badgeClass; ?>"><?php echo strtoupper($chamado['status']); ?></span>
                        </div>
                        
                        <h6 class="card-subtitle mb-2 text-muted">
                            <small>
                                Categoria: <?php echo htmlspecialchars($chamado['categoria']); ?> | 
                                Autor: <?php echo htmlspecialchars($chamado['autor']); ?>
                            </small>
                        </h6>
                        
                        <p class="card-text mt-3"><?php echo nl2br(htmlspecialchars($chamado['descricao'])); ?></p> 
                        
                        <?php if (!empty($chamado['resposta_admin'])): ?>
                            <hr>
                            <div class="alert alert-info mb-0">
                                <strong>Resposta do Administrador:</strong><br>
                                <?php echo nl2br(htmlspecialchars($chamado['resposta_admin'])); ?>
                            </div>
                        <?php endif; ?>

                        <div class="mt-3">
                            
                            <?php if ($_SESSION['usuario']['perfil'] != 'admin' && $chamado['status'] == 'aberto'): ?>
                                <form action="/ticket/delete" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este chamado?');">
                                    <input type="hidden" name="id" value="<?php echo $chamado['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Excluir Chamado
                                    </button>
                                </form>
                            <?php endif; ?>

                            <?php if ($_SESSION['usuario']['perfil'] == 'admin' && $chamado['status'] == 'aberto'): ?>
                                <div class="card card-body bg-light mt-2">
                                    <form action="/ticket/resolve" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $chamado['id']; ?>">
                                        
                                        <div class="mb-2">
                                            <label class="form-label small fw-bold">Responder e Finalizar:</label>
                                            <textarea name="resposta" class="form-control form-control-sm" rows="2" placeholder="Digite a solução técnica aqui..." required></textarea>
                                        </div>
                                        
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                Resolver Chamado
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>