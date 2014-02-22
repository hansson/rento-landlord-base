<?php
	require '../util/persistance.php';
	require '../util/apartment_interest_class.php';

	header('Content-Type: application/json');


	$apartments = fetch_apartments();

	$response = '[';
	foreach ($apartments as $apartment) {
		$interests = fetch_interest($apartment->id);
		$interest = new ApartmentInterest();
		$interest->object = $apartment->object;
		$interest->address = $apartment->address;
		$interest->apartmentId = $apartment->id;
		$interest->interestCount = count($interests);
		$response = $response . $interest->get_json();
	}
	$response = rtrim($response, ",");
	$response = $response . ']';
	echo $response;
	
?>