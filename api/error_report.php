<?php
	require '../util/persistance.php';

	header('Content-Type: application/json');

	if($_POST['id'] && 
		!($_POST['name']
		|| $_POST['social-security']
		|| $_POST['address']
		|| $_POST['phone']
		|| $_POST['email']
		|| $_POST['apartment-number']
		|| $_POST['master-key-allowed']
		|| $_POST['summary'])) {
		remove_error_report($_POST['id']);
		echo '{"status":"OK"}';
	} else if($_POST['name']
		&& $_POST['social-security']
		&& $_POST['address']
		&& $_POST['phone']
		&& $_POST['email']
		&& $_POST['apartment-number']
		&& $_POST['master-key-allowed']
		&& $_POST['summary']) {
		$interest = new ErrorReport();
		$interest->name = $_POST['name'];
		$interest->address = $_POST['address'];
		$interest->phone = $_POST['phone'];
		$interest->email = $_POST['email'];
		$interest->apartmentNumber = $_POST['apartment-number'];
		$interest->masterKeyAllowed = $_POST['master-key-allowed'];
		$interest->summary = $_POST['summary'];

		$subject = $_POST['social-security'];
		$pattern = '/^([0-9]{6})-([0-9]{4})$/';
		if(preg_match($pattern, $subject, $matches) == 1) {
			$interest->socialSecurity = $_POST['social-security'];	
			store_interest($interest);
			echo '{"status":"OK"}';
		} else {
			http_response_code(400);
			echo '{"status":"NOT_OK"}';
		}		
		
	} else {
		$error_reports = fetch_error_reports();

		$response = '[';
		foreach ($error_reports as $error_report) {
			$response = $response . $error_report->get_json() . ',';
		}

		$response = rtrim($response, ",");
		$response = $response . ']';
		echo $response;
	}
	
?>