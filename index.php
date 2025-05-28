<?php

/**
 * Arquivo principal do sistema (Front Controller).
 * Exibe o menu interativo e executa as ações com base na entrada do usuário.
 * Utiliza os serviços, comandos e notificadores para realizar o fluxo da aplicação.
 */

require_once 'config/database.php';
require_once 'models/automovel.php';
require_once 'models/usuario.php';
require_once 'models/venda.php';
require_once 'services/compraService.php';
require_once 'observers/observerInterface.php';
require_once 'observers/email.php';
require_once 'observers/mensagem.php';
require_once 'services/notificador.php';
require_once 'commands/compraCommand.php';

$notificador = new notificador();
$notificador->adicionarObserver(new email());
$notificador->adicionarObserver(new mensagem());
$compraService = new compraService($pdo, $notificador);

function menu() {

    if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
        system('cls');
    } else {
        system('clear');
    }
    
    echo "\n--- Menu de Compra de Automóveis ---\n";
    echo "1. Cadastrar usuário\n";
    echo "2. Cadastrar automóvel\n";
    echo "3. Comprar veículo\n";
    echo "4. Consultar vendas\n";
    echo "5. Sair\n";
    echo "Escolha uma opção: ";
}

do {
    menu();
    $opcao = trim(fgets(STDIN));

    switch ($opcao) {
        case 1:

            if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
                system('cls');
            } else {
                system('clear');
            }

            echo "Nome: "; $nome = trim(fgets(STDIN));
            echo "CPF: "; $cpf = trim(fgets(STDIN));
            echo "Telefone: "; $telefone = trim(fgets(STDIN));
            echo "Data de nascimento (DD/MM/AAAA): "; $nascimento = trim(fgets(STDIN));
            echo "Email: "; $email = trim(fgets(STDIN));

            $usuario = new usuario($pdo);
            $usuario->cadastrar($nome, $cpf, $telefone, $nascimento, $email);
            break;

        case 2:

            if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
                system('cls');
            } else {
                system('clear');
            }

            echo "Nome: "; $nome = trim(fgets(STDIN));
            echo "Marca: "; $marca = trim(fgets(STDIN));
            echo "Renavam: "; $renavam = trim(fgets(STDIN));
            echo "Placa: "; $placa = trim(fgets(STDIN));
            echo "Valor: "; $valor = trim(fgets(STDIN));

            $automovel = new automovel($pdo);
            $automovel->cadastrar($nome, $marca, $renavam, $placa, $valor);
            break;

        case 3:

            if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
                system('cls');
            } else {
                system('clear');
            }

            echo "ID do usuário: "; $usuarioId = trim(fgets(STDIN));
            echo "ID do veículo: "; $automovelId = trim(fgets(STDIN));

            $command = new compraCommand($compraService, $usuarioId, $automovelId);
            $command->execute();
            break;

        case 4:

            if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
                system('cls');
            } else {
                system('clear');
            }

            $stmt = $pdo->query("SELECT v.id as venda_id, u.nome as comprador, a.nome as carro, a.placa FROM vendas v 
                                JOIN usuarios u ON v.usuario_id = u.id 
                                JOIN automoveis a ON v.automovel_id = a.id");

            echo "\n--- Vendas Realizadas ---\n";
            foreach ($stmt as $row) {
                echo "ID: {$row['venda_id']}\n";
                echo "Carro: {$row['carro']}\n";
                echo "Placa: {$row['placa']}\n";
                echo "Vendido para: {$row['comprador']}\n\n";
            }

            echo "Aperte qualquer tecla para sair...";
            $tecla = trim(fgets(STDIN));

            break;
        
        case 5:
            echo "Saindo...\n";

            if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
                system('cls');
            } else {
                system('clear');
            }

            exit;

        default:
            echo "Opção inválida!\n";
    }
} while (true);
?>