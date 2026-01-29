<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Abertura de Chamado</h5>
            </div>
            <div class="card-body">
                <form action="/ticket/store" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Título</label>
                        <input name="titulo" type="text" class="form-control" placeholder="Resumo do problema" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoria</label>
                        <select name="categoria" class="form-select">
                            <option>Criação Usuário</option>
                            <option>Impressora</option>
                            <option>Hardware</option>
                            <option>Software</option>
                            <option>Rede</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="4" placeholder="Descreva detalhadamente o que aconteceu..." required></textarea>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="/home" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-success px-4">Abrir Chamado</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>