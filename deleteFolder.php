<?php
session_start();
$userFolder = $_GET['folder'];

if(is_dir($userFolder)){
	rmdir($userFolder);
	echo "Директория удалена";
}else{
	echo "Не удалось удалить директорию";
}
?>