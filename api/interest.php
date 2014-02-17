<?php
	require '../util/persistance.php';

	header('Content-Type: application/json');


	$interests = fetch_interest();

	$response = '[';
	foreach ($interests as $interest) {
		$response = $response . $interest->get_json() . ',';
	}
	$response = rtrim($response, ",");
	$response = $response . ']';
	echo $response;
	
?>