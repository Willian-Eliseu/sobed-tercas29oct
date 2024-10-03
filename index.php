<?php 

require_once "sql.php";
require_once "./assets/php/session.php";
require "../global/config/configuracao.class.php";
require "../global/config/fullTbread.class.php";
require "../global/config/videos.class.php";

// error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$configuracao = new Configuracao($_SESSION[NOME_SESSAO]['tbread'], $_SESSION[NOME_SESSAO]['dataevento']);

$site = $_SESSION[NOME_SESSAO]['pagina'];
$page = $_GET['page'];

if($page == null or $page == ""){
    header("Location: https://eventos.tbr.com.br/$site/?page=home");
}

#parametros
$title = $_SESSION[NOME_SESSAO]['tabtitle'];
$footerTitle = $_SESSION[NOME_SESSAO]['title'];
$description = $_SESSION[NOME_SESSAO]['description'];
$keywords = $_SESSION[NOME_SESSAO]['keywords'];
$officialSite = $_SESSION[NOME_SESSAO]['siteoficial'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="TBR Produções">
    <link rel="shortcut icon" href="./assets/img/icone.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="<?= $_SESSION[NOME_SESSAO]['sweetalertcss'] ?>">
    <link rel="stylesheet" href="<?= $_SESSION[NOME_SESSAO]['intltelinputcss'] ?>">
    <!-- JAVASCRIPT -->
    <script src="//geoip-js.com/js/apis/geoip2/v2.1/geoip2.js"></script>
    <script>
        const popupPageName = '<?= $_SESSION[NOME_SESSAO] ?>';
    </script>
    <script src="https://privacidade.tbr.com.br/popup.js" defer></script>
</head>

<body class="bg-light">
    <?php
        include_once "./resources/header.php";
    ?>
    <?php 
        include_once "./pages/$page.php";
    ?>
    <?php 
        include_once "./resources/footer.php";
    ?>

    <!-- btn -->
    <button type="button" class="btn btn-blue btn-lg" id="btn-toTop">
        <i class="bi bi-arrow-up fw-bolder"></i>
    </button>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $_SESSION[NOME_SESSAO]['sweetalertjs'] ?>"></script>
    <script src="<?= $_SESSION[NOME_SESSAO]['intltelinputjs'] ?>"></script>
    <script src="<?= $_SESSION[NOME_SESSAO]['jquery'] ?>"></script>
    <script src="<?= $_SESSION[NOME_SESSAO]['mask'] ?>"></script>
    <?php if ($_GET['page'] == 'live') { ?>
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-database.js"></script>
    <?php } ?>
    <script type="module" src="./assets/js/scrollnavbar.js"></script>
    <script type="module" src="./assets/js/index.js"></script>
    <script src="./assets/js/<?= $page ?>.js"></script>
</body>

</html>