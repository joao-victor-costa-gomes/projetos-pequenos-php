<div class="row">
    <div class="card-login">
        <div class="card">
            <div class="card-header text-center">
                Login
            </div>
            <div class="card-body">
                <form action="/login" method="POST">
                    
                    <div class="mb-3">
                        <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    
                    <div class="mb-3">
                        <input name="senha" type="password" class="form-control" placeholder="Senha" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-lg btn-info text-white" type="submit">Entrar</button>
                    </div>

                    <div class="mt-3 text-center">
                        <small>Não tem conta? <a href="/cadastro">Cadastre-se aqui</a></small>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>