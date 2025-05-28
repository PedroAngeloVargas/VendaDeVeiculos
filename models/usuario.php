<?php

/**
 * Model responsável pelas operações de CRUD para usuários no banco de dados.
 */

class usuario {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $cpf, $telefone, $nascimento, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, cpf, telefone, nascimento, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $cpf, $telefone, $nascimento, $email]);
        echo "Usuário cadastrado com sucesso!\n";
    }
}
?>