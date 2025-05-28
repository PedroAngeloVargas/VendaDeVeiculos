<?php

/**
 * Observador responsável por enviar e-mail de confirmação de compra.
 * Implementa observerInterface.
 */

require_once __DIR__ . '/../vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class email implements observerInterface {
    public function notificar($dados) {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';          
            $mail->SMTPAuth = true;
            $mail->Username = 'SEU_EMAIL'; 
            $mail->Password = 'SUA_SENHA';            
            $mail->SMTPSecure = 'tls';                
            $mail->Port = 587;

            // Remetente e destinatário
            $mail->setFrom('SEU_EMAIL', 'SUA_EMPRESA');
            $mail->addAddress($dados['email'], $dados['comprador']);

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Compra realizada com sucesso!';
            $mail->Body    = "Parabens, voce adquiriu o veiculo: <b>{$dados['carro']}</b>";

            $mail->send();
            echo "Email enviado com sucesso para {$dados['email']}!\n";
        } catch (Exception $e) {
            echo "Erro ao enviar email: {$mail->ErrorInfo}\n";
        }
    }
}
?>