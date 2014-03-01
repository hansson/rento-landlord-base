<?php
	require '../util/persistance.php';
	require '../util/apartment_interest_class.php';

	header('Content-Type: application/json');

	if($_POST['apartment-id'] 
		&& $_POST['name']
		&& $_POST['social-security']
		&& $_POST['address']
		&& $_POST['postal-number']
		&& $_POST['city']
		&& $_POST['phone']
		&& $_POST['email']
		&& $_POST['company']
		&& $_POST['trade']
		&& $_POST['yearly-income']
		&& $_POST['smoker']
		&& $_POST['animals']
		&& $_POST['single-applicant']) {
		$interest = new Interest();
		$interest->name = $_POST['name'];
		$interest->socialSecurity = $_POST['social-security'];
		$interest->address = $_POST['address'];
		$interest->city = $_POST['city'];
		$interest->postalNumber = $_POST['postal-number'];
		$interest->phone = $_POST['phone'];
		$interest->email = $_POST['email'];
		$interest->company = $_POST['company'];
		$interest->trade = $_POST['trade'];
		$interest->yearlyIncome = $_POST['yearly-income'];
		$interest->smoker = $_POST['smoker'];
		$interest->animals = $_POST['animals'];
		$interest->singleApplicant = $_POST['single-applicant'];
		$interest->apartmentId = $_POST['apartment-id'];
		store_interest($interest);
		echo '{"status":"OK"}';
	} else if($_GET['apartment']) {
		$interests = fetch_interest($_GET['apartment']);
		$response = '[';
		foreach ($interests as $interest) {
			$response = $response . $interest->get_json() . ',';
		}
		$response = rtrim($response, ",");
		$response = $response . ']';
		echo $response;
	} else {
		$apartments = fetch_apartments();

		$response = '[';
		foreach ($apartments as $apartment) {
			$interests = fetch_interest($apartment->id);
			$interest = new ApartmentInterest();
			$interest->object = $apartment->object;
			$interest->address = $apartment->address;
			$interest->apartmentId = $apartment->id;
			$interest->interestCount = count($interests);
			$response = $response . $interest->get_json() . ',';
		}

		$response = rtrim($response, ",");
		$response = $response . ']';
		echo $response;
	}
	
?>