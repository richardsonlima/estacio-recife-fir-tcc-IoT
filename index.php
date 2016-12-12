<?php require "login/loginheader.php"; ?>

<?php
$ctl = $_POST['ctl'];
$command = "sudo python on.py $ctl";
$result = shell_exec($command);
echo($result);
?>

<?php
if (isset($_POST['OFF']))
{
exec("sudo python off.py");
}
?>

<html>
<head>

<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>

</head>

<style>
h3, h4 {text-align: center;}
span {font-weight: bold;}
</style>

<title> Richardson Lima - IoT Project </title>
<body><p class="head">Richardson Lima - Projeto TCC - Estácio de Sá | 2016.2</p>
<form action="" method="POST" name="form">
<p class="title"> Controle o equipamento com os botoes abaixo: </p>
<p class="form">
<input type="submit" value="ON">
<input type="hidden" name="ctl" value="1">
</form></p>
<form action="" method="POST" name="form">
<p class="lol">
<button class="btn" name="OFF">OFF</button><br><br>
</form>
</p>
</body></html>