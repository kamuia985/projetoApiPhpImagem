<?php
require_once 'model/Upload.php';
$arquivo = $_FILES['arquivo'];

$up = new Upload($arquivo, 'assetes/img');
$result = $up->salvarImagem();
if($result){
    http_response_code(200);
    $retorno["result"] = true;
    $retorno["url_arquivo"] = $result;
}
else{
    http_response_code(404);
    $retorno["result"] = true;
    $retorno["url_arquivo"] = '';

}
echo json_encode($retorno);
