<!DOCTYPE html>
<html>
  <head>
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
    <meta charset="UTF-8">
    <title>Verify User</title>
  </head>
  <body>
<?php
require 'includes/functions.php';
include 'config.php';

//
$uid = $_GET['uid'];
$verify = $_GET['v'];

$e = new SelectEmail;
$eresult = $e->emailPull($uid);

$email = $eresult['email'];
$username = $eresult['username'];

$v = new Verify;

if (isset($uid) && !empty(str_replace(' ', '', $uid)) && isset($verify) && !empty(str_replace(' ', '', $verify))) {

    // 
    $vresponse = $v->verifyUser($uid, $verify);

    //Sucesso
    if ($vresponse == 'true') {
        echo $activemsg;

        // Enviar email de verificacao
        $m = new MailSender;
        $m->sendMail($email, $username, $uid, 'Active');
    } else {
        // debug de erro mysql
        echo $vresponse;
    }
} else {
    // Validadao de erro - variaveis vazias
    echo 'An error occurred... click <a href="index.php">here</a> to go back.';
};

?>
</body>
</html>
