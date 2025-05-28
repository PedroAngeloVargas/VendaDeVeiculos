<?php

/**
 * Gerencia uma lista de observadores e notifica todos eles com os dados da venda.
 * Implementa o padrão Observer.
 */

class notificador {
    private $observers = [];

    public function adicionarObserver(observerInterface $observer) {
        $this->observers[] = $observer;
    }

    public function notificarTodos($dados) {
        foreach ($this->observers as $observer) {
            $observer->notificar($dados);
        }
    }
}
?>