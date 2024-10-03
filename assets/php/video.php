<?php
require "sql.php";
require "session.php";
require "../../../global/config/configuracao.class.php";
require "../../../global/config/fullTbread.class.php";
require "../../../global/config/videos.class.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$id = $_POST['id'];
$newid = $_POST['key'];
$tbreadid = $_POST['course'];
$order = $_POST['order'];

$consulta = Videos::getConsulta($id, $newid);

$event = $_SESSION[NOME_SESSAO]['id'];
$registration = $_POST['userid'];
$pageName = $id." - ".$consulta['titulo'];

$category = $newid;
$dataagora = date("Y-m-d H:i:s");

// #fecha acesso aberto
Videos::accessClose($dataagora, $event, $registration);
// #insere novo acesso
Videos::setNewAccess($dataagora, $event, $registration, $pageName);
