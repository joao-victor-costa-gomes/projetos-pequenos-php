<div class="row">
    <div class="card-login"> <div class="card">
            <div class="card-header text-center">
                Criar Nova Conta
            </div>
            <div class="card-body">
                <form action="/auth/cadastrar" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input name="nome" type="text" class="form-control" placeholder="Ex: João Silva" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input name="email" type="email" class="form-control" placeholder="seu@email.com" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input name="senha" type="password" class="form-control" placeholder="Mínimo 6 caracteres" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-lg btn-success text-white" type="submit">Cadastrar</button>
                    </div>

                    <div class="mt-3 text-center">
                        <small>Já tem conta? <a href="/">Voltar para o Login</a></small>
                    </div>

                </form>
            </div>
        </div>

        <div class='mb-5' ></div>
    </div>
</div>