<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <?php if (isset($_GET['erro']) && $_GET['erro'] == 'dados_invalidos'): ?>
                <div class="alert alert-warning alert-dismissible fade show shadow-sm mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Atenção!</strong> Por favor, preencha todos os campos antes de enviar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'erro_envio'): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                    <i class="bi bi-x-circle-fill me-2"></i>
                    <strong>Ops!</strong> Não foi possível enviar o e-mail. Tente novamente mais tarde.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-pencil-square me-2"></i>Nova Mensagem</h2>
                <a href="/" class="btn btn-outline-secondary btn-sm">Voltar</a>
            </div>

            <div class="card shadow border-0">
                <div class="card-body p-4">
                    
                    <form action="/new_email/send" method="POST">
                        
                        <div class="mb-3">
                            <label for="para" class="form-label fw-bold">Para:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                <input type="email" name="para" class="form-control" id="para" placeholder="exemplo@dominio.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="assunto" class="form-label fw-bold">Assunto:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-chat-left-text"></i></span>
                                <input type="text" name="assunto" class="form-control" id="assunto" placeholder="Título do e-mail" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="mensagem" class="form-label fw-bold">Mensagem:</label>
                            <textarea name="mensagem" class="form-control" id="mensagem" rows="6" placeholder="Escreva sua mensagem aqui..."></textarea>
                            <div class="form-text">Você pode usar formatação HTML se desejar.</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reset" class="btn btn-light me-md-2">Limpar</button>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-send me-1"></i> Enviar E-mail
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>