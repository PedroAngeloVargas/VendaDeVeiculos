<?php

/**
 * Model responsável pela estrutura da tabela de vendas.
 * Pode ser expandido para incluir lógica de manipulação de vendas.
 */

class venda {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function registrar($usuarioId, $automovelId) {
        $stmt = $this->pdo->prepare("INSERT INTO vendas (usuario_id, automovel_id, data) VALUES (?, ?, datetime('now'))");
        $stmt->execute([$usuarioId, $automovelId]);
    }
}
?>