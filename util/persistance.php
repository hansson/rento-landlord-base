<?php
require 'apartment_class.php';

function get_db_connection() {
	try {  
		return new PDO("mysql:host=localhost;dbname=rento", "asdasd", "asdasd");  
	}  
	catch(PDOException $e) {  
		echo $e->getMessage();  
	}  
}

function store_apartment($apartment) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('INSERT INTO apartments (address, rent, size, rooms, floor, elevator, city, area, freeFrom, summary) value (:address, :rent, :size, :rooms, :floor, :elevator, :city, :area, :freeFrom, :summary)');  
	$STH->execute((array)$apartment);
 }

function fetch_apartments() {
	$DBH = get_db_connection();
	$STH = $DBH->query('SELECT address, rent, size, rooms, floor, elevator, city, area, freeFrom, summary, id from apartments');  
	$STH->setFetchMode(PDO::FETCH_OBJ); 
	$apartments = array();
	while($row = $STH->fetch()) {  
		$apartment = new Apartment();
		$apartment->address = $row->address;
		$apartment->rent = $row->rent;
		$apartment->size = $row->size;
		$apartment->rooms = $row->rooms;
		$apartment->floor = $row->floor;
		$apartment->elevator = $row->elevator;
		$apartment->city = $row->city;
		$apartment->area = $row->area;
		$apartment->freeFrom = $row->freeFrom;
		$apartment->summary = $row->summary;
		$apartment->id = $row->id;
		$apartments[] = $apartment;
	} 

	return $apartments;
}

function update_apartment($apartment) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('UPDATE apartments SET address = :address, rent = :rent, size = :size, rooms = :rooms, floor = :floor, elevator = :elevator, city = :city, area = :area, freeFrom = :freeFrom, summary = :summary WHERE id =:id');  
	$STH->execute((array)$apartment);
}


?>