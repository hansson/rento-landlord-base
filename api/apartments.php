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
		|| $_POST['free-from'] 
		|| $_POST['summary']
		|| $_POST['image-name'])) {
		remove_apartment($_POST['id']);

	} else if($_POST['address'] 
		|| $_POST['rent'] 
		|| $_POST['size'] 
		|| $_POST['rooms'] 
		|| $_POST['floor'] 
		|| $_POST['elevator']
		|| $_POST['city'] 
		|| $_POST['area'] 
		|| $_POST['free-from'] 
		|| $_POST['summary']
		|| $_POST['image-name']) {
		$apartment = new Apartment();
		$apartment->address = $_POST['address']; 
		$apartment->rent = $_POST['rent']; 
		$apartment->size = $_POST['size']; 
		$apartment->rooms = $_POST['rooms']; 
		$apartment->floor = $_POST['floor']; 
		$apartment->elevator = $_POST['elevator']; 
		$apartment->city = $_POST['city']; 
		$apartment->area = $_POST['area']; 
		$apartment->freeFrom = $_POST['free-from']; 
		$apartment->summary = $_POST['summary'];
		$apartment->imageName = $_POST['image-name'];
		
		if($_POST['id']) {
			$apartment->id = $_POST['id']; 
			update_apartment($apartment);
		} else {
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