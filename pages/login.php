<main id="main">
    <section class="mt-5">
        <div class="container mb-3">
            <div class="row">
                <div class="col-12">
                    <p class="text-center fs-1 fw-bold mb-0 baloo" id="ll1">
                        ACESSAR
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-center fs-4 baloo" id="ll2">
                        Entre com seu email e senha e clique em "Entrar"
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <form action="javascript:;" id="form_login" method="post">
                        <!-- parâmetros adicionais -->
                        <input type="hidden" name="evento" id="evento" value="<?= $_SESSION[NOME_SESSAO]['id'] ?>">
                        <input type="hidden" name="language" id="language" value="pt">
                        <input type="hidden" name="pagina" id="pagina" value="<?= $configuracao->getVivo() == "s" ? "live" : "on-demand" ?>">
                        <input type="hidden" name="tipoLogin" id="tipoLogin" value="authentication">
                        <!-- fim parâmetros adicionais -->
                        <div class="row py-1">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email" id="ll3">
                                        Seu email:
                                    </label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row py-1">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="senha" id="ll4">
                                        Sua senha:
                                    </label>
                                    <input type="password" name="senha" class="form-control" id="senha">
                                </div>
                            </div>
                        </div> -->
                        <div class="row py-3">
                            <div class="col-6 d-grid">
                                <a href="https://eventos.tbr.com.br/<?php echo $site; ?>/?page=home" class="btn btn-secondary bg-gradient" id="ll5">Cancelar</a>
                            </div>
                            <div class="col-6 d-grid">
                                <button type="submit" id="btn-submit" class="btn btn-principal bg-gradient">Entrar</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-3">
                    <p class="text-center baloo fs-6" id="ll7">
                        Ainda não se cadastrou? Faça seu cadastro clicando <a class="text-primary text-decoration-underline" href="https://eventos.tbr.com.br/<?= $site; ?>/?page=subscribe">aqui</a>.
                    </p>
                    <p class="text-center baloo fs-6" id="ll8">
                        Esqueceu sua senha? <a class='text-primary text-decoration-underline' href='https://eventos.tbr.com.br/<?= $site; ?>/?page=senha'>Clique aqui</a> para redefinir.
                    </p>
                    <p class="text-center baloo fs-6" id="ll9">
                        Precisa de ajuda? <a class='text-primary text-decoration-underline' href='https://eventos.tbr.com.br/<?= $site; ?>/?page=suporte'>Clique aqui</a> para entrar em contato com o suporte.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>