<?php

/**
 * Serviço que realiza o processo de compra de veículos.
 * Registra a venda e dispara notificações aos observadores (padrão Observer).
 */

require_once __DIR__ . '/../models/venda.php';

class compraService {
    private $pdo;
    private $notificador;

    public function __construct(PDO $pdo, notificador $notificador) {
        $this->pdo = $pdo;
        $this->notificador = $notificador;
    }

    public function realizarCompra($usuarioId, $automovelId) {

        $stmt = $this->pdo->prepare("INSERT INTO vendas (usuario_id, automovel_id, data) VALUES (?, ?, datetime('now'))");
        $stmt->execute([$usuarioId, $automovelId]);


        $query = $this->pdo->prepare("SELECT u.email, u.nome as comprador, a.nome as carro 
                                      FROM usuarios u, automoveis a 
                                      WHERE u.id = ? AND a.id = ?");
        $query->execute([$usuarioId, $automovelId]);
        $dados = $query->fetch(PDO::FETCH_ASSOC);


        $this->notificador->notificarTodos([
            'email' => $dados['email'],
            'comprador' => $dados['comprador'],
            'carro' => $dados['carro']
        ]);
    }
}
