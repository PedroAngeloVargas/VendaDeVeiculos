<?php

/**
 * Model responsável pelas operações de CRUD para automóveis no banco de dados.
 */

class automovel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $marca, $renavam, $placa, $valor) {
        $stmt = $this->pdo->prepare("INSERT INTO automoveis (nome, marca, renavam, placa, valor) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $marca, $renavam, $placa, $valor]);
        echo "Automóvel cadastrado com sucesso!\n";
    }
}
?>