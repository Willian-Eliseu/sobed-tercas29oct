<?php
ini_set('session.gc_maxlifetime', 7200);
session_set_cookie_params(7200);
define("NOME_SESSAO", "session361");
session_name(NOME_SESSAO);
session_start();

$_SESSION[NOME_SESSAO]['id'] = 361;
$_SESSION[NOME_SESSAO]['tbread'] = 995;
$_SESSION[NOME_SESSAO]['dataevento'] = "2024-10-29";
//$_SESSION[NOME_SESSAO]['dataEncerramento'] = '2025-02-30'; //data onde o evento deixa de estar disponível para ser acessado
$_SESSION[NOME_SESSAO]['pagina'] = 'sobed-tercas-29out';
$_SESSION[NOME_SESSAO]['tabtitle'] = 'TERÇAS DA SOBED';
$_SESSION[NOME_SESSAO]['navbar'] = '';
$_SESSION[NOME_SESSAO]['title'] = 'TERÇAS DA SOBED';
//$_SESSION[NOME_SESSAO]['subtitle'] = 'Aulas do evento gravado';
$_SESSION[NOME_SESSAO]['siteoficial'] = 'https://sobed.org.br';
//$_SESSION[NOME_SESSAO]['certificado'] = 'n';
// $_SESSION[NOME_SESSAO]['recibo'] = 'n';
// $_SESSION[NOME_SESSAO]['doacao'] = 'n';
// $_SESSION[NOME_SESSAO]['pagamento'] = 'n';
// $_SESSION[NOME_SESSAO]['boleto'] = 'n';
// $_SESSION[NOME_SESSAO]['pix'] = 'n';
//$_SESSION[NOME_SESSAO]['empresaPagamento'] = 12;
//$_SESSION[NOME_SESSAO]['nomePagamento'] = 'Pagamento na plataforma tbr';
$_SESSION[NOME_SESSAO]['css'] = "eventos.tbr.com.br/sobed-tercas-29out/assets/css/chat.css";

//configurações
$_SESSION[NOME_SESSAO]['description'] = 'TERÇAS DA SOBED';
$_SESSION[NOME_SESSAO]['keywords'] = 'TBR, PRODUTORA, PRODUÇÃO, VÍDEOS SOB DEMANDA, TRANSMISSÕES';
$_SESSION[NOME_SESSAO]['multilang'] = 'n';

//css
$_SESSION[NOME_SESSAO]['sweetalertcss'] = '../global/assets/sweetalert2/dist/sweetalert2.min.css';
$_SESSION[NOME_SESSAO]['intltelinputcss'] = '../global/assets/intltelinput/build/css/intlTelInput.css';
$_SESSION[NOME_SESSAO]['datatablecss'] = '../global/assets/datatables/datatables.min.css';

//js
$_SESSION[NOME_SESSAO]['sweetalertjs'] = '../global/assets/sweetalert2/dist/sweetalert2.min.js';
$_SESSION[NOME_SESSAO]['jquery'] = '../global/assets/jquery/jquery361.js';
$_SESSION[NOME_SESSAO]['mask'] = '../global/assets/mask/mask.min.js';
$_SESSION[NOME_SESSAO]['intltelinputjs'] = '../global/assets/intltelinput/build/js/intlTelInput.min.js';
$_SESSION[NOME_SESSAO]['datatablejs'] = '../global/assets/datatables/datatables.min.js';