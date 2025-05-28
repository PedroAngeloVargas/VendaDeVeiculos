<?php
require_once 'observers/observerInterface.php';

class mensagem implements observerInterface {
    public function notificar($dados) {
        echo "Compra realizada com sucesso!\n";
        echo "Volte sempre!\n";
    }
}
?>