<main id="main">
    <section class="mt-5">
        <div class="container mb-3">
            <div class="row">
                <div class="col-12">
                    <p class="text-center fs-1 fw-bold mb-0 baloo" id="sel1">
                        REDEFINIÇÃO DE SENHA
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-center fs-4 baloo" id="sel2">
                        Insira seu e-mail cadastrado e clique em "verificar":
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <ul class="list-unstyled">
                        <li class="baloo fs-6" id="sel3"><i class="bi bi-caret-right"></i> Tenha certeza de estar previamente cadastrado. Caso queira se increver, clique <a href="./?page=cadastro" class="text-primary">aqui</a>.</li>
                        <li class="baloo fs-6" id="sel4"><i class="bi bi-caret-right"></i> Caso não recorde o email cadastrado, envie uma mensagem para o suporte clicando <a href="./?page=suporte" class="text-primary">aqui</a>.</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <form action="javascript:;" method="post" id="form_consulta">
                    <div class="col-md-8 col-lg-4 mx-auto">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="email" id="sel5">
                                    Insira aqui o seu e-mail:
                                </label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                <input type="hidden" name="language_consulta" id="language_consulta" value="pt">
                                <input type="hidden" name="evento" id="evento" value="<?= $_SESSION[NOME_SESSAO]['id']; ?>">
                                <input type="hidden" name="pagina" id="pagina" value="<?= $_SESSION[NOME_SESSAO]['pagina']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 d-grid">
                                <a href="./?page=home" class="btn btn-secondary bg-gradient" id="sel6">Cancelar</a>
                            </div>
                            <div class="col-6 d-grid">
                                <!-- <input type="submit" id="submit_button" class="btn btn-principal bg-gradient" value="Verificar"> -->
                                <button class="btn btn-principal bg-gradient" type="submit" id="sel7">Verificar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>