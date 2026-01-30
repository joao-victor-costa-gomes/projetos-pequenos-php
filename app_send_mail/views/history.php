<div class="container">
    
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
                        
                        <tr>
                            <td class="ps-4 fw-bold text-muted">105</td>
                            <td>cliente@empresa.com</td>
                            <td>Orçamento Projeto Web</td>
                            <td>30/01/2026 às 14:30</td>
                            <td class="text-center">
                                <span class="badge bg-success rounded-pill">
                                    <i class="bi bi-check-circle me-1"></i>Enviado
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-info" title="Ver Detalhes">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-4 fw-bold text-muted">104</td>
                            <td>email.errado@teste</td>
                            <td>Teste de sistema</td>
                            <td>30/01/2026 às 14:25</td>
                            <td class="text-center">
                                <span class="badge bg-danger rounded-pill">
                                    <i class="bi bi-x-circle me-1"></i>Erro
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-danger" title="Ver Erro">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="ps-4 fw-bold text-muted">103</td>
                            <td>fornecedor@loja.com</td>
                            <td>Pedido de Compra #44</td>
                            <td>29/01/2026 às 09:15</td>
                            <td class="text-center">
                                <span class="badge bg-success rounded-pill">
                                    <i class="bi bi-check-circle me-1"></i>Enviado
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-info" title="Ver Detalhes">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>