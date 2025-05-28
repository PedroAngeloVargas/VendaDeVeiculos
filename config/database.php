<?php

/**
 * Responsável por configurar e retornar a conexão PDO com o banco de dados SQLite.
 */

try {
    $pdo = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT,
            cpf TEXT,
            telefone TEXT,
            nascimento TEXT,
            email TEXT
        );

        CREATE TABLE IF NOT EXISTS automoveis (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT,
            marca TEXT,
            renavam TEXT,
            placa TEXT,
            valor REAL
        );

        CREATE TABLE IF NOT EXISTS vendas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            usuario_id INTEGER,
            automovel_id INTEGER,
            data TEXT,
            FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
            FOREIGN KEY(automovel_id) REFERENCES automoveis(id)
        );
    ");
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>