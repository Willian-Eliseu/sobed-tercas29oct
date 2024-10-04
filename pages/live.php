<?php
$tbreadid = isset($_GET['tbreadid']) ? $_GET['tbreadid'] : null;
$configTbread = new Tbread($_SESSION[NOME_SESSAO]['id']);
$salas = $configTbread->getTbreadId();
?>
<main id="main">
    <section id="enable" class="d-none">

        <input type="hidden" id="ip" value="<?= $_SERVER['REMOTE_ADDR'] ?>">
        <input type="hidden" id="tbreadid" value="<?= $tbreadid ?>">

        <div class="container-fluid py-3 d-none" id="vivo-1">
            <div class="row mb-3">
                <div class="col-12 d-lg-none">
                    <div class="row g-3">
                        <div class="col-6 d-grid">
                            <a href="javascript:history.back()" class="btn btn-outline-dark"><i
                                    class="bi bi-caret-left"></i> Voltar</a>
                        </div>
                        <div class="col-6 d-grid">
                            <a href="./?page=home" class="btn btn-outline-dark"><i
                                    class="bi bi-house"></i> Início</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="text-center">
                                <span class="event-title fw-bold text-uppercase border border-3 border-secondary rounded-pill bg-white px-2 px-lg-3 py-1"><?= $_SESSION[NOME_SESSAO]['title'] ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-xl-9 mb-3 h-100">
                            <div class="row">
                                <div class="col ratio ratio-16x9 p-0" id="video-space">
                                    <!-- vídeo -->
                                    <iframe id="activeVideo" class="bg-white player" src="" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 h-100">
                            <div class="row border rounded">
                                <div class="col-12 border rounded">
                                    <div class="row">
                                        <div class="col-12 bg-principal text-light rounded" id="chat-title">
                                            <!-- cabecalho -->
                                            <!-- <p class="fw-bold text-center text-uppercase pt-3 small" id="tituloDoChat"></p> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 bg-white" id="chat-size">
                                            <iframe id="activeChat" width="100%" height="100%" src=""
                                                frameborder="0"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="./assets/img/amgen.png" alt="" width="40%" class="d-block mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-3 d-none" id="vivo-0">
            <div class="row mb-3">
                <div class="col-12 d-lg-none">
                    <div class="row g-3">
                        <div class="col-6 d-grid">
                            <a href="javascript:history.back()" class="btn btn-outline-dark"><i
                                    class="bi bi-caret-left"></i> Voltar</a>
                        </div>
                        <div class="col-6 d-grid">
                            <a href="./?page=inicio" class="btn btn-outline-dark"><i
                                    class="bi bi-house"></i> Início</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pt-5">
                    <p class="py-3 text-center">
                        <?= date($_SESSION[NOME_SESSAO]['dataevento']) >= date('Y-m-d') ? "O evento será transmitido ao vivo no dia 29/10/2024, a partir das 20h (Horário de Brasília)" : "O evento foi transmitido ao vivo no dia 29/10/2024" ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <?php if (count($salas) > 1) { ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="text-center">
                                    <?php
                                    foreach ($salas as $k => $v) { ?>
                                        <a class="mx-2 btn btn-principal mb-3"
                                            href="./user.php?page=live&tbreadid=<?= $v['id'] ?>"><?= $configTbread->getParamtbread($v['id'])['nome'] ?></a>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section id="disable" class="d-none">
        <div class="container-fluid py-3">
            <div class="row mb-3">
                <div class="col-12 d-lg-none">
                    <div class="row g-3">
                        <div class="col-6 d-grid">
                            <a href="javascript:history.back()" class="btn btn-outline-dark"><i
                                    class="bi bi-caret-left"></i> Voltar</a>
                        </div>
                        <div class="col-6 d-grid">
                            <a href="./?page=inicio" class="btn btn-outline-dark"><i
                                    class="bi bi-house"></i> Início</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-3">
                    <p class="text-center pt-5">
                        <!-- Para acessar a transmissão você precisa pagar a taxa de inscrição. -->
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col">
                            <p class="text-principal fs-2 baloo fw-bold border-bottom border-secondary-subtle pb-2">
                                APOIO EDUCACIONAL</p>
                        </div>
                    </div>
                    <div class="row g-3 justify-content-center">
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card tamanho shadow-sm h-100 justify-content-center">
                                <img class="card-img-top p-2" src="./assets/img/bostonScientific.png" alt="Logo ">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card tamanho shadow-sm h-100 justify-content-center">
                                <img class="card-img-top p-2 d-block mx-auto" src="./assets/img/promedonMicrotech.png" alt="Logo " style="width: 80%;">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card tamanho shadow-sm h-100 justify-content-center">
                                <img class="card-img-top p-2" src="./assets/img/steris.png" alt="Logo ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>