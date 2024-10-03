<main id="main">
    <section class="mt-5">
        <div class="container mb-3">
            <div class="row">
                <div class="col-12">
                    <p class="text-center fs-1 fw-bold mb-0 titillium" id="prl1">
                        REDEFINIÇÃO DE SENHA
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-center fs-4 titillium" id="prl2">
                        Insira e repita sua nova senha e clique em "salvar"
                    </p>
                </div>
            </div>
            <div class="row">
                <form action="javascript:;" method="post" id="form-newpassword">
                    <div class="col-md-8 col-lg-4 mx-auto">
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="senha" id="prl3">
                                    Insira sua nova senha:
                                </label>
                                <input type="password" name="senha" id="senha" class="form-control" required>
                                <input type="hidden" name="key" id="key" value="<?= $_GET['key'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="rsenha" id="prl4">
                                    Repita sua nova senha:
                                </label>
                                <input type="password" name="rsenha" id="rsenha" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 d-grid">
                                <a href="./?page=home" class="btn btn-secondary" id="prl5">Cancelar</a>
                            </div>
                            <div class="col-6 d-grid">
                                <!-- <input type="submit" id="submit_button" class="btn btn-principal" value="Salvar"> -->
                                <button type="submit" class="btn btn-principal bg-gradient" id="prl6">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>