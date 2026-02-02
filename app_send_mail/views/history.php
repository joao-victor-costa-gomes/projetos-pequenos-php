<div class="container">
    
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'sucesso'): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Sucesso!</strong> E-mail enviado e registrado no histórico.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-clock-history me-2"></i>Histórico de Envios</h2>
        <div>
            <a href="/new_email" class="btn btn-primary btn-sm me-2"><i class="bi bi-plus-lg"></i> Novo</a>
            <a href="/" class="btn btn-outline-secondary btn-sm">Voltar</a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-4">#ID</th>
                            <th scope="col">Destinatário</th>
                            <th scope="col">Assunto</th>
                            <th scope="col">Data de Envio</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-end pe-4">Ações</th>
                        </tr>
                    </thead>

        <tbody>
            <?php if (empty($emails)): ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        <i class="bi bi-inbox me-2"></i>Nenhum e-mail enviado ainda.
                    </td>
                </tr>
            <?php else: ?>
                
                <?php foreach ($emails as $email): ?>
                    <tr>
                        <td class="ps-4 fw-bold text-muted">#<?php echo $email['id']; ?></td>
                        <td><?php echo htmlspecialchars($email['destinatario']); ?></td>
                        <td><?php echo htmlspecialchars($email['assunto']); ?></td>
                        
                        <td>
                            <?php echo date('d/m/Y \à\s H:i', strtotime($email['created_at'])); ?>
                        </td>

                        <td class="text-center">
                            <?php if ($email['status'] == 'sucesso'): ?>
                                <span class="badge bg-success rounded-pill">
                                    <i class="bi bi-check-circle me-1"></i>Enviado
                                </span>
                            <?php else: ?>
                                <span class="badge bg-danger rounded-pill" title="<?php echo htmlspecialchars($email['log_erro']); ?>">
                                    <i class="bi bi-x-circle me-1"></i>Erro
                                </span>
                            <?php endif; ?>
                        </td>

                        <td class="text-end pe-4">
                            <button type="button" class="btn btn-sm btn-outline-info" 
                                    data-bs-toggle="tooltip" title="Mensagem: <?php echo substr(strip_tags($email['mensagem']), 0, 50); ?>...">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>
        </tbody>

                </table>
            </div>
        </div>
    </div>
</div>