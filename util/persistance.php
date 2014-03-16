<?php
require 'apartment_class.php';
require 'interest_class.php';
require 'error_report_class.php';

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
	$STH = $DBH->prepare('INSERT INTO apartments (id, address, rent, size, rooms, floor, elevator, city, area, freeFrom, summary, imageName, object) value (:id, :address, :rent, :size, :rooms, :floor, :elevator, :city, :area, :freeFrom, :summary, :imageName, :object)');  
	$STH->execute((array)$apartment);
}

function fetch_apartments() {
	$DBH = get_db_connection();
	$STH = $DBH->query('SELECT address, rent, size, rooms, floor, elevator, city, area, freeFrom, summary, imageName, object, id from apartments');  
	$STH->setFetchMode(PDO::FETCH_OBJ); 
	$apartments = array();
	while($row = $STH->fetch()) {  
		$apartment = new Apartment();
		$apartment->address = filter_var($row->address, FILTER_SANITIZE_STRING);
		$apartment->rent = filter_var($row->rent, FILTER_SANITIZE_STRING);
		$apartment->size = filter_var($row->size, FILTER_SANITIZE_STRING);
		$apartment->rooms = filter_var($row->rooms, FILTER_SANITIZE_STRING);
		$apartment->floor = filter_var($row->floor, FILTER_SANITIZE_STRING);
		$apartment->elevator = filter_var($row->elevator, FILTER_SANITIZE_STRING);
		$apartment->city = filter_var($row->city, FILTER_SANITIZE_STRING);
		$apartment->area = filter_var($row->area, FILTER_SANITIZE_STRING);
		$apartment->freeFrom = filter_var($row->freeFrom, FILTER_SANITIZE_STRING);
		$apartment->summary = filter_var($row->summary, FILTER_SANITIZE_STRING);
		$apartment->imageName = filter_var($row->imageName, FILTER_SANITIZE_STRING);
		$apartment->object = filter_var($row->object, FILTER_SANITIZE_STRING);
		$apartment->id = $row->id;
		$apartments[] = $apartment;
	} 

	return $apartments;
}

function fetch_apartment($id) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('SELECT address, rent, size, rooms, floor, elevator, city, area, freeFrom, summary, imageName, object, id from apartments WHERE id = :id');  
	$STH->execute(array( 'id' => $id));
	while($row = $STH->fetch(PDO::FETCH_OBJ)) {  
		$apartment = new Apartment();
		$apartment->address = filter_var($row->address, FILTER_SANITIZE_STRING);
		$apartment->rent = filter_var($row->rent, FILTER_SANITIZE_STRING);
		$apartment->size = filter_var($row->size, FILTER_SANITIZE_STRING);
		$apartment->rooms = filter_var($row->rooms, FILTER_SANITIZE_STRING);
		$apartment->floor = filter_var($row->floor, FILTER_SANITIZE_STRING);
		$apartment->elevator = filter_var($row->elevator, FILTER_SANITIZE_STRING);
		$apartment->city = filter_var($row->city, FILTER_SANITIZE_STRING);
		$apartment->area = filter_var($row->area, FILTER_SANITIZE_STRING);
		$apartment->freeFrom = filter_var($row->freeFrom, FILTER_SANITIZE_STRING);
		$apartment->summary = filter_var($row->summary, FILTER_SANITIZE_STRING);
		$apartment->imageName = filter_var($row->imageName, FILTER_SANITIZE_STRING);
		$apartment->object = filter_var($row->object, FILTER_SANITIZE_STRING);
		$apartment->id = $row->id;
		return $apartment;
	} 

}

function update_apartment($apartment) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('UPDATE apartments SET address = :address, rent = :rent, size = :size, rooms = :rooms, floor = :floor, elevator = :elevator, city = :city, area = :area, freeFrom = :freeFrom, summary = :summary , imageName = :imageName , object = :object WHERE id =:id');  
	$STH->execute((array)$apartment);
}

function remove_apartment($id) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('DELETE from apartments WHERE id = :id');  
	$STH->execute(array( 'id' => $id));
}

function store_interest($interest) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('INSERT INTO interest (id, name, socialSecurity, address, postalNumber, city, phone, email, company, trade, yearlyIncome, smoker, animals, singleApplicant, apartmentId) value (:id, :name, :socialSecurity, :address, :postalNumber, :city, :phone, :email, :company, :trade, :yearlyIncome, :smoker, :animals, :singleApplicant, :apartmentId)');  
	$STH->execute((array)$interest);
}

function fetch_interest($apartmentId) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('SELECT name, socialSecurity, address, postalNumber, city, phone, email, company, trade, yearlyIncome, smoker, animals, singleApplicant, apartmentId, id from interest WHERE apartmentId = :id');  
	$STH->execute(array( 'id' => $apartmentId));
	$interests = array();
	while($row = $STH->fetch(PDO::FETCH_OBJ)) {  
		$interest = new Interest();
		$interest->name = filter_var($row->name, FILTER_SANITIZE_STRING);
		$interest->socialSecurity = filter_var($row->socialSecurity, FILTER_SANITIZE_STRING);
		$interest->address = filter_var($row->address, FILTER_SANITIZE_STRING);
		$interest->postalNumber = filter_var($row->postalNumber, FILTER_SANITIZE_STRING);
		$interest->city = filter_var($row->city, FILTER_SANITIZE_STRING);
		$interest->phone = filter_var($row->phone, FILTER_SANITIZE_STRING);
		$interest->email = filter_var($row->email, FILTER_SANITIZE_STRING);
		$interest->company = filter_var($row->company, FILTER_SANITIZE_STRING);
		$interest->trade = filter_var($row->trade, FILTER_SANITIZE_STRING);
		$interest->yearlyIncome = filter_var($row->yearlyIncome, FILTER_SANITIZE_STRING);
		$interest->smoker = filter_var($row->smoker, FILTER_SANITIZE_STRING);
		$interest->animals = filter_var($row->animals, FILTER_SANITIZE_STRING);
		$interest->singleApplicant = filter_var($row->singleApplicant, FILTER_SANITIZE_STRING);
		$interest->apartmentId = filter_var($row->apartmentId, FILTER_SANITIZE_STRING);
		$interest->id = $row->id;
		$interests[] = $interest;
	} 

	return $interests;
}

function remove_interest($id) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('DELETE from interest WHERE id = :id');  
	$STH->execute(array( 'id' => $id));
}

function store_error_report($error_report) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('INSERT INTO error_report (id, name, socialSecurity, address, postalNumber, city, phone, email, company, trade, yearlyIncome, smoker, animals, singleApplicant, apartmentId) value (:id, :name, :socialSecurity, :address, :postalNumber, :city, :phone, :email, :company, :trade, :yearlyIncome, :smoker, :animals, :singleApplicant, :apartmentId)');  
	$STH->execute((array)$error_report);
}

function fetch_error_reports() {
	$DBH = get_db_connection();
	$STH = $DBH->query('SELECT name, socialSecurity, address, phone, email, apartmentNumber, masterKeyAllowed, summary, id from error_report');  
	$STH->setFetchMode(PDO::FETCH_OBJ); 
	$reports = array();
	while($row = $STH->fetch()) {  
		$error_report = new ErrorReport();
		$error_report->name = filter_var($row->name, FILTER_SANITIZE_STRING);
		$error_report->socialSecurity = filter_var($row->socialSecurity, FILTER_SANITIZE_STRING);
		$error_report->address = filter_var($row->address, FILTER_SANITIZE_STRING);
		$error_report->phone = filter_var($row->phone, FILTER_SANITIZE_STRING);
		$error_report->email = filter_var($row->email, FILTER_SANITIZE_STRING);
		$error_report->apartmentNumber = filter_var($row->apartmentNumber, FILTER_SANITIZE_STRING);
		$error_report->masterKeyAllowed = filter_var($row->masterKeyAllowed, FILTER_SANITIZE_STRING);
		$error_report->summary = filter_var($row->summary, FILTER_SANITIZE_STRING);
		$error_report->id = $row->id;
		$reports[] = $error_report;
	} 

	return $reports;
}

function remove_error_report($id) {
	$DBH = get_db_connection();
	$STH = $DBH->prepare('DELETE from error_report WHERE id = :id');  
	$STH->execute(array( 'id' => $id));
}



?>