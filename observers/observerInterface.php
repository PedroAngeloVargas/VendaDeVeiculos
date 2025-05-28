<?php

/**
 * Interface para definir o contrato que todos os observadores devem seguir.
 * Padrão Observer.
 */

interface observerInterface {
    public function notificar($mensagem);
}
?>