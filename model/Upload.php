<?php
  class Upload{
    private $arquivo;
    private $dir_destino;

    function __construct($arquivo, $dir_destino){
        $this->arquivo = $arquivo;
        $this->dir_destino = $dir_destino;
    }
    private function getExtensao(){
        $ext = explode('.', $this->arquivo['namew']);
        return $extensao = strtolower(end($ext));
    }
    private function ehImagem($extensao): bool{
        $extensoes = array ('gif', 'jpeg','jpg', 'png', 'gif', 'webp' );
        if(in_array($extensao, $extensoes)){
            return true;
        }
        else{
            return false;
        }
    }
        public function salvarImagem(): string|bool{
            $extensao = $this->getExtensao();
            if($this->ehImagem($extensao)){
                $novo_nome = md5(time()).".$extensao";
                $destino = "$this->dir_destino/$novo_nome";
                 if (move_uploaded_file($this->arquivo['temp_name'], $destino)){
                    return $destino;

                }

            }
            return false;
        }
    }
