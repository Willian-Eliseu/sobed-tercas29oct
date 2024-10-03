<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);

$event = $_SESSION[NOME_SESSAO]['id'];
$dataagora = date("Y-m-d H:i:s");
$tbreadid = isset($_GET['tbreadid']) ? $_GET['tbreadid'] : null;

$configTbread = new Tbread($_SESSION[NOME_SESSAO]['id']);
$configTbread->setParamtbread($tbreadid);
$salas = $configTbread->getTbreadId();
$dadosTbread = $configTbread->consultaTBRead();


if ($_POST['pesquisa']) {
    $videos = Videos::getPesquisa($dadosTbread['clienteid'], $_POST['pesquisa']);
} else {
    $videos = Videos::getVideos($dadosTbread['clienteid']);
}

Videos::accessClose($dataagora, $_SESSION[NOME_SESSAO]['id'], $_SESSION[NOME_SESSAO]['usuario']['id']);
$controle = 0;
?>

<main id="main">
    <section id="enable" class="d-none">
        <!-- controle -->
        <input type="hidden" id="eventId" value="<?= $event ?>">

        <header class="">
            <div class="container-fluid py-3" id="cabecalho_conteudo">
                <!-- botões de controle -->
                <div class="row mb-3">
                    <div class="col-12 d-lg-none">
                        <div class="row g-3">
                            <div class="col-6 d-grid">
                                <a href="javascript:history.back()" class="btn btn-outline-dark"><i
                                        class="bi bi-caret-left"></i> Voltar</a>
                            </div>
                            <div class="col-6 d-grid">
                                <a href="./user.php?page=inicio" class="btn btn-outline-dark"><i
                                        class="bi bi-house"></i> Início</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="text-center fs-2 fw-bold mb-0">
                            <?= $_SESSION[NOME_SESSAO]['title'] ?>
                        </p>
                        <p class="text-center mb-0">
                            <?= $_SESSION[NOME_SESSAO]['subtitle'] ?>
                            <?= (count($salas) > 1) ? "sala: " . $configTbread->getParamtbread()['nome'] : "" ?>
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <article>
            <div class="container-fluid" id="corpo_conteudo">
                <div class="row mb-3">
                    <div class="col-lg-6 mx-auto">
                        <!-- exibição, controle e busca -->
                        <div class="p-3 bg-white rounded border border-light-subtle">
                            <?php if (count($salas) > 1) { ?>
                                <div class="row">
                                    <div class="col-12 border-bottom border-light-subtle border-1">
                                        <p class="text-center fs-5">
                                            Salas disponíveis:
                                            <?php foreach ($salas as $k => $v) { ?>
                                                <a class="mx-2 btn btn-outline-dark btn-sm"
                                                    href="./user.php?page=on-demand&tbreadid=<?= $v['id'] ?>"><?= $configTbread->getParamtbread($v['id'])['nome'] ?></a>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <?php if (!$_POST['pesquisa']) { ?>
                                        <h4 class="fw-bold">Exibindo todos os vídeos do curso</h4>
                                    <?php } else { ?>
                                        <h4 class="fw-bold">Exibindo resultados para: "<?= $_POST['pesquisa'] ?>"</h4>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-end">
                                    <form action="./user.php?page=on-demand&tbreadid=<?= $dadosTbread['clienteid'] ?>"
                                        method="post" id="form-search">
                                        <div class="input-group">
                                            <input name="pesquisa" id="pesquisa" type="text" class="form-control input"
                                                placeholder="Busca" aria-label="Busca" aria-describedby="button-addon2"
                                                spellcheck="true" value="<?php echo $_POST['pesquisa']; ?>" required>
                                            <button type="submit" class="btn btn-outline-dark" id="button-addon2"><i
                                                    class="bi bi-search"></i></button>
                                            <button type="reset"
                                                class="btn btn-danger <?= (!$_POST['pesquisa']) ? 'd-none' : ''; ?>"><i
                                                    class="bi bi-trash3-fill"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto ms-auto align-self-end d-none d-md-block">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                            autocomplete="off" checked onclick="defineConfig('grid')">
                                        <label class="btn btn-outline-dark" for="btnradio2"><i
                                                class="bi bi-grid-3x3"></i></label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                            autocomplete="off" onclick="defineConfig('list')">
                                        <label class="btn btn-outline-dark" for="btnradio1"><i
                                                class="bi bi-list-task"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 pb-3" id="videos_conteudo">
                    <?php if ($videos != null) { ?>
                        <?php foreach ($videos as $k => $v) { ?>

                            <!-- módulo -->
                            <?php if ($v['modulo'] != $controle) { ?>
                                <div class="col-12">
                                    <div class="bg-white p-2 border rounded">
                                        <p class="text-dark fw-bold text-uppercase py-3 fst-italic mb-0 ps-3">
                                            <?= $v['modulo'] . " - " . $v['nomemodulo'] ?></p>
                                    </div>
                                </div>
                                <?php $controle = $v['modulo'];
                            } ?>
                            <!-- fim módulo -->

                            <!-- vídeos -->
                            <div class="col-md-6 col-lg-4 col-xl-3 card_element"
                                onclick="window.location.href='./user.php?page=video&id=<?= $v['id'] ?>&key=<?= $v['new_id']; ?>&course=<?= $dadosTbread['clienteid'] ?>&order=<?= $v['ordem']; ?>'">
                                <div class="bg-white p-2 border rounded card_jump">
                                    <div class="row">
                                        <div class="col-12 align-self-center card_image">
                                            <img src="//tbr-legacy-thumbnails.s3.sa-east-1.amazonaws.com/<?= $v['new_id'] ?>.jpg?<?= date("H:i:s") ?>"
                                                alt="Miniatura do vídeo" class="w-100"
                                                onerror="this.src = '<?php echo 'https:\/\/video.tbr.com.br/' . $v['new_id'] . '/poster/' . $v['new_id'] . '.0000001.jpg'; ?>'">
                                        </div>
                                        <div class="col-12 card_body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6 class="pt-3 text_box"><?= substr($v['titulo'], 0, 38); ?>...</h6>
                                                    <h6 class="pt-3 text_line d-none"><?= $v['titulo'] ?></h6>
                                                    <p class="mb-1 small text_box"><?= substr($v['sinopse'], 0, 80); ?>...</p>
                                                    <p class="mb-1 small text_line d-none"><?= $v['sinopse'] ?></p>
                                                    <p class="text-end px-2 mb-1 small"><i class="bi bi-eye-fill"></i>
                                                        <?= Videos::getViews($_SESSION[NOME_SESSAO]['id'], $v['id']) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim vídeos -->

                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <p class="text-center">Ainda não existem vídeos publicados!</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </article>
    </section>
</main>
<!-- <section id="disable" class="d-none">
    <div class="container-fluid py-3">
        <div class="row mb-3">
            <div class="col-12 d-lg-none">
                <div class="row g-3">
                    <div class="col-6 d-grid">
                        <a href="javascript:history.back()" class="btn btn-outline-dark"><i class="bi bi-caret-left"></i> Voltar</a>
                    </div>
                    <div class="col-6 d-grid">
                        <a href="./user.php?page=inicio" class="btn btn-outline-dark"><i class="bi bi-house"></i> Início</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-3">
                <p class="text-center pt-5">
                    Para acessar as aulas você precisa pagar a taxa de inscrição.
                </p>
            </div>
        </div>
    </div>
</section> -->