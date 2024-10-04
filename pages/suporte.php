<main id="main">
    <section class="mt-5">
        <div class="container mb-3">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-auto mx-auto">
                            <p class="fs-1 fw-bold mb-0 text-center baloo">
                                SUPORTE
                            </p>
                            <p class="fs-4">
                                Entre em contato preenchendo o formulário abaixo
                            </p>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-lg-12">
                            <p class="baloo">
                                <span>Preencha os campos e clique em enviar:</span>
                                <br>
                                <small>
                                    Campos marcados com * são obrigatórios.
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-lg-12">
                            <form id="form-contato" name="form-contato" action="javascript:;">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="row gap-2">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="tratamento">
                                                        Tratamento*:
                                                    </label>
                                                    <select name="tratamento" class="form-select" required>
                                                        <option value="" disabled selected>Selecione</option>
                                                        <option value="Dr.">Dr.</option>
                                                        <option value="Dra.">Dra.</option>
                                                        <option value="Prof.">Prof.</option>
                                                        <option value="Profa.">Profa.</option>
                                                        <option value="Sr.">Sr.</option>
                                                        <option value="Sra.">Sra.</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nome">
                                                        Nome*:
                                                    </label>
                                                    <input type="text" name="nome" id="nome" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 mb-lg-0">
                                                <div class="form-group">
                                                    <label for="email">Email*:</label>
                                                    <input type="text" name="email" id="email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="mensagem">
                                                Mensagem*:
                                            </label>
                                            <textarea name="mensagem" id="mensagem" rows="7" class="form-control" required></textarea>
                                            <input type="hidden" name="pagina" id="pagina" value="<?php echo $_SESSION[NOME_SESSAO]['pagina']; ?>">
                                            <input type="hidden" name="idevento" id="idevento" value="<?php echo $_SESSION[NOME_SESSAO]['id']; ?>">
                                            <input type="hidden" name="language" id="language" value="pt">
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3 justify-content-center">
                                    <div class="col-6 col-md-3">
                                        <div class="form-group d-grid">
                                            <input type="submit" id="submit_button" value="Enviar" class="btn btn-principal bg-gradient">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>