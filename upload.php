<?php
if ( 0 < $_FILES['file']['error'] ) {
	echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else {
	move_uploaded_file($_FILES['file']['tmp_name'], $_SESSION['downloadFolder']. $_FILES['file']['name']);
	alert($_SESSION['downloadFolder']. $_FILES['file']['name']);
}
?>