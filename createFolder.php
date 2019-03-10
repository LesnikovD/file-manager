<?php
session_start();
$userFolder = $_GET['folderName'];
mkdir($_SESSION['path']."\\".$userFolder);
?>