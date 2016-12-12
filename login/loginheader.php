<?php
// Coloque este header no inicio de cada pagina
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login/main_login.php");
}
