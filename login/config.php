<?php
//Pegar '$base_url' e '$signin_url' a partir desse arquivo
include 'globalcon.php';
//Pegar a database configuration a partir desse arquivo
include 'dbconf.php';

// 
$site_name = 'Test Site';

// Maximo de tentativas de login
$max_attempts = 5;
//Timeout (em segundos) apos o maximo de tentativas ser atingido
$login_timeout = 300;

// SOMENTE espeficique isso se voce deseja que um moderador verifique os usuarios, caso contrario deixe em branco ou comente
$admin_email = '';

//Configuracoes de email
$from_email = 'youremail@domain.com'; // Email
$from_name = 'Teste Email'; // Nome
$mailServerType = 'smtp';
//IF $mailServerType = 'smtp'
$smtp_server = 'smtp.mail.dominio.com.br';
$smtp_user = 'usuario@domain.com';
$smtp_pw = 'Password';
$smtp_port = 465; //465 para ssl, 587 para tls, e 25 nao seguro
$smtp_security = 'ssl';//ssl, tls ou ''

$verifymsg = 'Clique neste link para verificar sua nova conta!'; // Mensagem de verificacao
$active_email = 'Sua nova conta esta ativa, clique neste link para efetuar o login!';// Mensagem de ativacao

$signupthanks = 'Obrigado, voce ira receber um email afim de verificar a  confirmacao da sua conta.';
$activemsg = 'Sua conta foi verificada, agora voce pode efetuar o login em <br><a href="'.$signin_url.'">'.$signin_url.'</a>';

//Nao modifique a linhas de codigo abaixo
if (trim($admin_email, ' ') == '') {
    unset($admin_email);
} elseif (!filter_var($admin_email, FILTER_VALIDATE_EMAIL) == true) {
    unset($admin_email);
    echo $invalid_mod;
};
$invalid_mod = '$adminemail is not a valid email address';


$timeout_minutes = round(($login_timeout / 60), 1);
