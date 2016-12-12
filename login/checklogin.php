<?php
//Nao mude nada neste arquivo ...
//'true' triggers login success
ob_start();
include 'config.php';
require 'includes/functions.php';

// Definicao de $myusername e $mypassword
$username = $_POST['myusername'];
$password = $_POST['mypassword'];

// Protecao contra MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);

$response = '';
$loginCtl = new LoginForm;
$conf = new GlobalConf;
$lastAttempt = checkAttempts($username);
$max_attempts = $conf->max_attempts;


// Primeira tentativa
if ($lastAttempt['lastlogin'] == '') {

    $lastlogin = 'never';
    $loginCtl->insertAttempt($username);
    $response = $loginCtl->checkLogin($username, $password);

} elseif ($lastAttempt['attempts'] >= $max_attempts) {

    // Extendendo o máximo de tentativas
    $loginCtl->updateAttempts($username);
    $response = $loginCtl->checkLogin($username, $password);

} else {

    $response = $loginCtl->checkLogin($username, $password);

};

if ($lastAttempt['attempts'] < $max_attempts && $response != 'true') {

    $loginCtl->updateAttempts($username);
    $resp = new RespObj($username, $response);
    $jsonResp = json_encode($resp);
    echo $jsonResp;

} else {

    $resp = new RespObj($username, $response);
    $jsonResp = json_encode($resp);
    echo $jsonResp;

}

unset($resp, $jsonResp);
ob_end_flush();
