<?php
require 'apartment_class.php';

function get_db_connection() {
	try { 
		$ini_vars = parse_ini_file('util/db.ini');
		if(!$ini_vars) {
			$ini_vars = parse_ini_file('../util/db.ini');
		}
		$host=$ini_vars['mysql_address']; // Host name
		$username=$ini_vars['mysql_username']; // Mysql username
		$password=$ini_vars['mysql_password']; // Mysql password
		$db_name=$ini_vars['mysql_database']; // Database name
		return new PDO("mysql:host=" . $host .  ";dbname=" . $db_name, $username, $password);  
	}  
	catch(PDOException $e) {  
		echo $e->getMessage();  
	}  
}

function store_apartment($apartment) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('INSERT INTO apartments (id, address, rent, size, rooms, floor, elevator, city, area, freeFrom, summary, imageName) value (:id, :address, :rent, :size, :rooms, :floor, :elevator, :city, :area, :freeFrom, :summary, :imageName)');  
	$STH->execute((array)$apartment);
}

function fetch_apartments() {
	$DBH = get_db_connection();
	$STH = $DBH->query('SELECT address, rent, size, rooms, floor, elevator, city, area, freeFrom, summary, imageName, id from apartments');  
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
		$apartment->imageName = $row->imageName;
		$apartment->id = $row->id;
		$apartments[] = $apartment;
	} 

	return $apartments;
}

function fetch_apartment($id) {
	$DBH = get_db_connection();
	$STH = $DBH->query('SELECT address, rent, size, rooms, floor, elevator, city, area, freeFrom, summary, imageName, id from apartments WHERE id = :id');  
	$STH->execute(array( 'id' => $id));
	while($row = $STH->fetch(PDO::FETCH_OBJ)) {  
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
		$apartment->imageName = $row->imageName;
		$apartment->id = $row->id;
		return $apartment;
	} 

}

function update_apartment($apartment) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('UPDATE apartments SET address = :address, rent = :rent, size = :size, rooms = :rooms, floor = :floor, elevator = :elevator, city = :city, area = :area, freeFrom = :freeFrom, summary = :summary , imageName = :imageName WHERE id =:id');  
	$STH->execute((array)$apartment);
}

function remove_apartment($id) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('DELETE from apartments WHERE id = :id');  
	$STH->execute(array( 'id' => $id));
}


?>