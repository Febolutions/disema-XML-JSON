<?php
session_start();
   
if(!isset($_SESSION['user'])){
	header("location:vistas\login.php");
	}
?>