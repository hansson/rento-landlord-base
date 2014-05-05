<?php
	require '../util/persistance.php';

	header('Content-Type: application/json');

	if($_POST['id'] && 
		!($_POST['name'] 
		|| $_POST['position'] 
		|| $_POST['email'] 
		|| $_POST['phone'] 
		|| $_POST['image-name'])) {
		remove_contact($_POST['id']);
		echo '{"status":"OK"}';
	} else if($_POST['name'] 
		|| $_POST['position'] 
		|| $_POST['email'] 
		|| $_POST['phone'] 
		|| $_POST['image-name']) {
		$contact = new Contact();
		$contact->name = $_POST['name']; 
		$contact->position = $_POST['position']; 
		$contact->email = $_POST['email']; 
		$contact->phone = $_POST['phone']; 
		$contact->imageName = $_POST['image-name']; 
		if($_POST['id']) {
			$contact->id = $_POST['id']; 
			update_contact($contact);
		} else {
			store_contact($contact);
		}
		echo '{"status":"OK"}';
	} else {
		$contacts = fetch_contacts();
		$response = '[';
		foreach ($contacts as $contact) {
			$response = $response . $contact->get_json() . ',';
		}
		$response = rtrim($response, ",");
		$response = $response . ']';
		echo $response;
	}
	
?>