<?php
$stc = $configuracao->stcSearch($_SESSION[NOME_SESSAO]['id']);
?>
<main id="main">
    <section class="mt-5">
        <div class="container mb-3">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-auto mx-auto">
                            <p class="fs-1 fw-bold mb-0 text-center baloo">
                                CADASTRO
                            </p>
                            <!-- <p class="fs-4 text-center baloo">
                                <?= $_SESSION[NOME_SESSAO]['title'] ?>
                            </p> -->
                            <?php if(date('Y-m-d') <= date($_SESSION[NOME_SESSAO]['dataevento'])){ ?>
                            <p class="text-center baloo">
                                O evento será realizado no dia 29/10/2024
                            </p>
                            <?php }else{ ?>
                            <p class="text-center baloo">
                                O evento foi realizado no dia 29/10/2024
                            </p>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="javascript:;" method="post" id="formulary" class="mb-3 baloo">
                                <div class="row my-5">
                                    <div class="col-12">
                                        <div class="row g-3 baloo">
                                            <div class="col-md-6 col-lg-4 align-self-end">
                                                <label for="subscribe_training_center">* Minha Categoria:</label>
                                                <select name="subscribe_training_center" id="subscribe_training_center" class="form-select">
                                                    <?php foreach ($stc as $k => $v) { ?>
                                                        <option value="<?= $v['id'] ?>" data-valor="<?= $v['value'] ?>"><?= $v['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-4 align-self-end">
                                                <label for="subscribe_treatment">
                                                    * Como gostaria de ser tratado?
                                                </label>
                                                <select name="subscribe_treatment" id="subscribe_treatment" class="form-select" required>
                                                    <option value="" disabled selected>Selecione</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Dra.">Dra.</option>
                                                    <option value="Prof.">Prof.</option>
                                                    <option value="Profa.">Profa.</option>
                                                    <option value="Sr.">Sr.</option>
                                                    <option value="Sra.">Sra.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-4 align-self-end">
                                                <label for="partial_cellphone">
                                                    * Celular:
                                                </label>
                                                <input type="tel" name="partial_cellphone" id="partial_cellphone" onblur="verificaNumero($('#formLanguage').val())" maxlength="20" class="form-control" placeholder="(99)99999-9999" required>
                                                <input type="hidden" name="subscribe_cellphone" id="subscribe_cellphone" required>
                                            </div>
                                            <div class="col-12 align-self-end">
                                                <div class="form-group">
                                                    <label for="subscribe_name">* Nome completo:</label>
                                                    <input type="text" name="subscribe_name" id="subscribe_name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 align-self-end">
                                                <label for="subscribe_email">
                                                    * Email:
                                                </label>
                                                <input type="email" class="form-control" name="subscribe_email" id="email" required>
                                            </div>
                                            <div class="col-md-6 align-self-end">
                                                <label for="subscribe_confirmemail">
                                                    * Confirme seu email:
                                                </label>
                                                <input type="email" class="form-control" name="subscribe_confirmemail" id="confirmemail" required>
                                            </div>
                                            <!-- <div class="col-md-6 align-self-end">
                                                <label for="subscribe_password">
                                                    * Senha:
                                                </label>
                                                <input type="password" name="subscribe_password" id="password" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 align-self-end">
                                                <label for="subscribe_confirmpassword">
                                                    * Confirme sua senha:
                                                </label>
                                                <input type="password" name="subscribe_confirmpassword" id="confirmpassword" class="form-control" required>
                                            </div> -->
                                            <div class="col-md-6 align-self-end">
                                                <label for="subscribe_cpf">* CPF:</label>
                                                <input type="text" name="subscribe_cpf" id="subscribe_cpf" class="form-control" placeholder="999.999.999-99">
                                            </div>
                                            <!-- <div class="col-md-6 align-self-end">
                                                <label for="subscribe_associate">* Associado SOBED?:</label>
                                                <select name="subscribe_associate" id="subscribe_associate" class="form-select">
                                                    <option value="N">NÃO</option>
                                                    <option value="S">SIM</option>
                                                </select>
                                            </div> -->
                                            <div class="col-md-6 align-self-end">
                                                <label for="subscribe_city">* Cidade:</label>
                                                <input type="text" name="subscribe_city" id="subscribe_city" class="form-control">
                                            </div>
                                            <div class="col-md-6 align-self-end">
                                                <label for="subscribe_state">* Estado:</label>
                                                <input type="text" name="subscribe_state" id="subscribe_state" class="form-control">
                                            </div>

                                            <input type="hidden" name="evento" id="evento" value="<?php echo $_SESSION[NOME_SESSAO]['id']; ?>">
                                            <input type="hidden" name="subscribe_enable" id="subscribe_enable" value="1">
                                            <input type="hidden" name="subscribe_ip" id="subscribe_ip" value="<?= $_SERVER['REMOTE_ADDR'] ?>">
                                            <input type="hidden" name="subscribe_crm_test" id="subscribe_crm_test" value="n">

                                            <input type="hidden" name="ip_country" id="ip_country" value="">
                                            <input type="hidden" name="ip_country_code" id="ip_country_code" value="">
                                            <input type="hidden" name="ip_city" id="ip_city" value="">
                                            <input type="hidden" name="ip_continent" id="ip_continent" value="">
                                            <input type="hidden" name="ip_latitude" id="ip_latitude" value="">
                                            <input type="hidden" name="ip_longitude" id="ip_longitude" value="">
                                            <input type="hidden" name="ip_time_zone" id="ip_time_zone" value="">
                                            <input type="hidden" name="ip_postal_code" id="ip_postal_code" value="">
                                            <input type="hidden" name="ip_subdivision" id="ip_subdivision" value="">
                                            <input type="hidden" name="subscribe_language" id="subscribe_language" value="pt">

                                            <?php if (date('Y-m-d') >= date($_SESSION[NOME_SESSAO]['dataevento'])) { ?>
                                                <input type="hidden" name="loginPage" id="loginPage" value="login">
                                            <?php } else { ?>
                                                <input type="hidden" name="loginPage" id="loginPage" value="possubscribe">
                                            <?php } ?>

                                            <div class="col-12">
                                                <input class="form-check-input" type="checkbox" name="subscribe_contact_organization" id="noti" value="S">
                                                <label class="form-check-label d-inline" for="noti">Aceito receber informações de eventos conforme apresentado na <a href="//privacidade.tbr.com.br/" target="_blank" class="text-decoration-none text-principal">política de privacidade</a> da TBR;</label>
                                            </div>
                                            <div class="col-12">
                                                <input class="form-check-input" type="checkbox" name="subscribe_accept_terms" id="terms" checked value="S" required="required">
                                                <label class="form-check-label d-inline" for="terms">* Declaro, para os devidos fins, a veracidade das informações preenchidas;</label>
                                            </div>

                                            <div class="col-12 py-3">
                                                <small>* Campos obrigatórios</small>
                                                <p>Um email de confirmação será enviado após a realização da sua inscrição</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="row justify-content-center" id="btnForm">
                                                    <div class="col-12 col-md-4 d-grid py-3">
                                                        <input type="submit" id="submit_button" value="Fazer minha Inscrição" class="btn btn-principal bg-gradient">
                                                    </div>
                                                </div>
                                            </div>
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