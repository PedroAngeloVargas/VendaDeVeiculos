<?php

/**
 * Comando que encapsula a ação de realizar uma compra.
 * Padrão Command: permite executar a compra de forma desacoplada do menu principal.
 */


require_once __DIR__ . '/../commands/commandInterface.php';

class compraCommand implements commandInterface {
    private $service;
    private $usuarioId;
    private $automovelId;

    public function __construct(CompraService $service, $usuarioId, $automovelId) {
        $this->service = $service;
        $this->usuarioId = $usuarioId;
        $this->automovelId = $automovelId;
    }

    public function execute() {
        $this->service->realizarCompra($this->usuarioId, $this->automovelId);
    }
}
?>