# 🚗 Sistema de Compra de Automóveis

Este é um sistema em PHP para cadastro e compra de automóveis, desenvolvido com orientação a objetos e aplicação dos padrões de projeto **MVC**, **Observer** e **Command**. A aplicação permite cadastrar usuários e veículos, realizar vendas e enviar notificações por e-mail.

---

## 🧠 Padrões de Projeto

MVC: separa as responsabilidades entre Modelos, Serviços e Interface.

Observer: o sistema notifica observadores (ex: envio de e-mail) após uma venda.

Command: encapsula a lógica de compra em um comando reutilizável e independente.

---

## ✨ Funcionalidades

- Cadastro de usuários com nome, CPF, telefone, nascimento e e-mail.
- Cadastro de automóveis com nome, marca, renavam, placa e valor.
- Compra de veículos entre usuários.
- Listagem de vendas realizadas.
- Envio de notificação por e-mail via SMTP após cada compra.
- Notificação visual de sucesso na compra.
- Organização do código com padrões de projeto.

---

## 🛠️ Tecnologias utilizadas

- PHP 8.3+
- SQLite
- PHPMailer
- Design Patterns: MVC, Observer e Command
- Interface de linha de comando (CLI)

---

## ▶️ Como executar

### 1. Clone o projeto

git clone https://github.com/PedroAngeloVargas/VendaDeVeiculos.git
cd VendaDeVeiculos 

### 2. Instale as depêndencias (PHP Mailer)

composer require phpmailer/phpmailer

### 3. Ajuste as configurações do email

No arquivo observers/email.php, configure o SMTP do Gmail com seu e-mail e senha de aplicativo.

Atenção: ative a autenticação por dois fatores no Gmail e crie uma senha de aplicativo. 

### 4. Execute a aplicação

php index.php

---

## 📬 Notificações por E-mail

O projeto envia um e-mail de confirmação ao comprador utilizando PHPMailer. O envio é feito após a compra do veículo













