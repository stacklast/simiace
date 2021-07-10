<?php
session_start();
include('app/config.php');
if (isset($_SESSION['usuario']) && isset($_SESSION['clave']))
{
    header('Location: app/dasboard.php'); 
}
else
{
	include('app/login.php'); 
}
?>
