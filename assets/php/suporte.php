<?php
#suporte
require "session.php";

$url = "https://eventos.tbr.com.br/global/api/contato.api.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$data = json_encode($_POST);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

if($resp === 0){
    echo json_encode([
        'retorno' => 0
    ]);
}else{
    echo json_encode([
        'retorno' => 1
    ]);
}