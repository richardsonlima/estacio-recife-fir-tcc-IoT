<?php
// Configuracoes do sistema
$base_url = 'http://' . $_SERVER['SERVER_NAME'];
$signin_url = substr($base_url . $_SERVER['PHP_SELF'], 0, -(6 + strlen(basename($_SERVER['PHP_SELF']))));

// Nao mude a linha abaixo
$ip_address = $_SERVER['REMOTE_ADDR'];
