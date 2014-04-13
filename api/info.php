<?php
	require '../util/persistance.php';	

	if($_POST['contact']) {
		header('Content-Type: application/json');
		store_info('contact', $_POST['contact']);
		echo '{"status":"OK"}';
	} else if($_GET['contact']) {
		header('text/html');
		echo fetch_info('contact');
	} else if($_POST['rules']) {
		header('Content-Type: application/json');
		store_info('rules', $_POST['rules']);
		echo '{"status":"OK"}';
	} else if($_GET['rules']) {
		header('text/html');
		echo fetch_info('rules');
	} else if($_POST['move_in']) {
		header('Content-Type: application/json');
		store_info('move_in', $_POST['move_in']);
		echo '{"status":"OK"}';
	} else if($_GET['move_in']) {
		header('text/html');
		echo fetch_info('move_in');
	} else if($_POST['move_out']) {
		header('Content-Type: application/json');
		store_info('move_out', $_POST['move_out']);
		echo '{"status":"OK"}';
	} else if($_GET['move_out']) {
		header('text/html');
		echo fetch_info('move_out');
	} else {
		header("HTTP/1.1 500 Internal Server Error");
	}
	
?>