<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

$id = $_GET['id'];
$newid = $_GET['key'];
$tbreadid = $_GET['course'];
$order = $_GET['order'];

$consulta = Videos::getConsulta($id, $newid);
$buscaAnexo = Videos::getAnexo($tbreadid, $id);

if ($order == 1) {
    $videos = Videos::getVideosPrimeiro($tbreadid, $order);
} else {
    $videos = Videos::getVideosPrimeiro($tbreadid, $order);
    $videospos = Videos::getVideosPos($tbreadid, $order);
}

/*
$event = $_SESSION[NOME_SESSAO]['id'];
$registration = $_SESSION[NOME_SESSAO]['usuario']['id'];
$pageName = $id." - ".$consulta['titulo'];

$category = $newid;
$dataagora = date("Y-m-d H:i:s");

// #fecha acesso aberto
Videos::accessClose($dataagora, $event, $registration);
// #insere novo acesso
Videos::setNewAccess($dataagora, $event, $registration, $pageName);
*/

$ondemand = new Tbread($_SESSION[NOME_SESSAO]['id']);
$ondemand->setParamtbread($tbreadid);
$videoOndemand = $ondemand->ondemandVideoGenerator($newid);

?>
<section id="video-page">
    <div class="container">
        <input type="hidden" name="id" id="id" value="<?= $id ?>">
        <input type="hidden" name="key" id="key" value="<?= $newid ?>">
        <input type="hidden" name="course" id="course" value="<?= $tbreadid ?>">
        <input type="hidden" name="order" id="order" value="<?= $order ?>">
    </div>
    <div class="container py-3">
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
            <div class="col-lg-9 pb-3">
                <div class="row">
                    <div class="col ratio ratio-16x9 p-0">
                        <iframe src="<?= $videoOndemand ?>" id="activeVideo" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row p-0">
                    <div class="col-12 py-3">
                        <!-- título do vídeo -->
                        <h4><?= $consulta['titulo'] ?></h4>
                        <p id="textIni"><?= nl2br(substr($consulta['sinopse'], 0, 62)) ?>... <a href="javascript:showFullText()" class="text-dark text-bolder fw-bold">mostrar mais</a></p>
                        <p id="textPos" class="d-none"><?= nl2br($consulta['sinopse']) ?>... <a href="javascript:ocultFullText()" class="text-dark text-bolder fw-bold">mostrar menos</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-11">
                        <!-- btn listar cursos -->
                        <div class="row pb-3">
                            <div class="col-12 p-0 d-grid">
                                <a href="https://eventos.tbr.com.br/<?= $eventPage ?>/user.php?page=on-demand&tbreadid=<?= $tbreadid ?>" class="btn btn-principal">Listar Todos os Vídeos</a>
                            </div>
                        </div>
                        <!-- lista de vídeos -->
                        <div class="row">
                            <div class="col-12" id="miniaturas_videos">
                                <div class="row">
                                    <div class="col-12">
                                        <?php if ($order == 1) { ?>
                                            <?php foreach ($videos as $k => $v) { ?>
                                                <div class="p-1">
                                                    <div class="row bg-white card_jump rounded border" onclick="window.location.href='./user.php?page=video&id=<?= $v['id'] ?>&key=<?= $v['new_id'] ?>&course=<?= $tbreadid ?>&order=<?= $v['ordem'] ?>'">
                                                        <!-- imagem -->
                                                        <div class="col-5 p-0 align-self-center">
                                                            <img src="//tbr-legacy-thumbnails.s3.sa-east-1.amazonaws.com/<?= $v['new_id'] ?>.jpg?<?= date("H:i:s") ?>" alt="Miniatura do vídeo" class="w-100" onerror="this.src = '<?php echo 'https:\/\/video.tbr.com.br/' . $v['new_id'] . '/poster/' . $v['new_id'] . '.0000001.jpg'; ?>'">
                                                        </div>
                                                        <!-- título -->
                                                        <div class="col-7">
                                                            <p class="text_miniatura_title">
                                                                <?php
                                                                if (strlen($v['titulo']) > 50) {
                                                                    echo substr($v['titulo'], 0, 50) . "...";
                                                                } else {
                                                                    echo $v['titulo'];
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if ($videos != null) { ?>
                                                <?php foreach ($videos as $k => $v) { ?>
                                                    <div class="p-1">
                                                        <div class="row bg-white card_jump rounded border" onclick="window.location.href='./user.php?page=video&id=<?= $v['id'] ?>&key=<?= $v['new_id'] ?>&course=<?= $tbreadid ?>&order=<?= $v['ordem'] ?>'">
                                                            <!-- imagem -->
                                                            <div class="col-5 p-0 align-self-center">
                                                                <img src="//tbr-legacy-thumbnails.s3.sa-east-1.amazonaws.com/<?= $v['new_id'] ?>.jpg?<?= date("H:i:s") ?>" alt="Miniatura do vídeo" class="w-100" onerror="this.src = '<?php echo 'https:\/\/video.tbr.com.br/' . $v['new_id'] . '/poster/' . $v['new_id'] . '.0000001.jpg'; ?>'">
                                                            </div>
                                                            <!-- título -->
                                                            <div class="col-7">
                                                                <p class="text_miniatura_title">
                                                                    <?php
                                                                    if (strlen($v['titulo']) > 50) {
                                                                        echo substr($v['titulo'], 0, 50) . "...";
                                                                    } else {
                                                                        echo $v['titulo'];
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="p-1">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <hr class="py-0 my-0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php foreach ($videospos as $k => $v) { ?>
                                                    <div class="p-1">
                                                        <div class="row bg-white card_jump rounded border" onclick="window.location.href='./user.php?page=video&id=<?= $v['id'] ?>&key=<?= $v['new_id'] ?>&course=<?= $tbreadid ?>&order=<?= $v['ordem'] ?>'">
                                                            <!-- imagem -->
                                                            <div class="col-5 p-0 align-self-center">
                                                                <img src="//tbr-legacy-thumbnails.s3.sa-east-1.amazonaws.com/<?= $v['new_id'] ?>.jpg?<?= date("H:i:s") ?>" alt="Miniatura do vídeo" class="w-100" onerror="this.src = '<?php echo 'https:\/\/video.tbr.com.br/' . $v['new_id'] . '/poster/' . $v['new_id'] . '.0000001.jpg'; ?>'">
                                                            </div>
                                                            <!-- título -->
                                                            <div class="col-7">
                                                                <p class="text_miniatura_title">
                                                                    <?php
                                                                    if (strlen($v['titulo']) > 50) {
                                                                        echo substr($v['titulo'], 0, 50) . "...";
                                                                    } else {
                                                                        echo $v['titulo'];
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>