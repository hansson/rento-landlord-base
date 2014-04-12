<?php
	require '../util/persistance.php';	

	if($_POST['contact']) {
		header('Content-Type: application/json');
		store_info('contact', $_POST['contact']);
		echo '{"status":"OK"}';
	} else if($_GET['contact']) {
		header('text/html');
		echo fetch_info('contact');
	}
	
?>