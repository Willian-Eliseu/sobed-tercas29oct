<?php
#suporte
//require "session.php";

$url = "https://eventos.tbr.com.br/global/api/cadastro.api.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$data = json_encode($_POST);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);
$resposta = json_decode($resp, true);

if($resposta['retorno'] == 1){
    echo json_encode([
        'retorno' => 1
    ]);
}else if($resposta['retorno'] == 2){
    echo json_encode([
        'retorno' => 2
    ]);
}else if($resposta['retorno'] == 3){
    echo json_encode([
        'retorno' => 3
    ]);
}else{
    echo json_encode([
        'retorno' => 0
    ]);
}