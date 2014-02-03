<?php
	require '../util/persistance.php';

	header('Content-Type: application/json');

	if($_POST['id'] && 
		!($_POST['address'] 
		|| $_POST['rent'] 
		|| $_POST['size'] 
		|| $_POST['rooms'] 
		|| $_POST['floor'] 
		|| $_POST['elevator']
		|| $_POST['city'] 
		|| $_POST['area'] 
		|| $_POST['freeFrom'] 
		|| $_POST['summary'])) {
		remove_apartment($_POST['id']);

	} else if($_POST['address'] 
		|| $_POST['rent'] 
		|| $_POST['size'] 
		|| $_POST['rooms'] 
		|| $_POST['floor'] 
		|| $_POST['elevator']
		|| $_POST['city'] 
		|| $_POST['area'] 
		|| $_POST['freeFrom'] 
		|| $_POST['summary']) {
		$apartment = new Apartment();
		$apartment->address = $_POST['address']; 
		$apartment->rent = $_POST['rent']; 
		$apartment->size = $_POST['size']; 
		$apartment->rooms = $_POST['rooms']; 
		$apartment->floor = $_POST['floor']; 
		$apartment->elevator = $_POST['elevator']; 
		$apartment->city = $_POST['city']; 
		$apartment->area = $_POST['area']; 
		$apartment->freeFrom = $_POST['freeFrom']; 
		$apartment->summary = $_POST['summary']; 
		
		if($_POST['id']) {
			echo "UPDATE";
			$apartment->id = $_POST['id']; 
			update_apartment($apartment);
		} else {
			echo "STORE";
			store_apartment($apartment);
		}
		echo "OK";
	} else {
		$apartments = fetch_apartments();

		$response = '[';
		foreach ($apartments as $apartment) {
			$response = $response . $apartment->get_json() . ',';
		}
		$response = rtrim($response, ",");
		$response = $response . ']';
		echo $response;
	}
	
?>