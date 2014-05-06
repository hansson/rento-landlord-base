<?php

header('Content-Type: application/json');
if(isset($_FILES["apartment-image"])) {
  $name = $_FILES["apartment-image"]["name"];
  $tmpName = $_FILES["apartment-image"]["tmp_name"];
  $outputDir = "../img/apartments/";
  upload_image($outputDir, $name, $tmpName);
} else if(isset($_FILES['contact-image'])) {
  $name = $_FILES["contact-image"]["name"];
  $tmpName = $_FILES["contact-image"]["tmp_name"];
  $outputDir = "../img/contacts/";
  upload_image($outputDir, $name, $tmpName);
} else if(isset($_FILES['area-image'])) {
  $name = $_FILES["area-image"]["name"];
  $tmpName = $_FILES["area-image"]["tmp_name"];
  $outputDir = "../img/areas/";
  upload_image($outputDir, $name, $tmpName);
}

function upload_image($outputDir, $name, $tmpName) {
  $split = explode(".", $name);
  $fileName = base64_encode(date(DATE_ATOM)) . "." . $split[count($split) - 1];
  move_uploaded_file($tmpName, $outputDir . $fileName);
  $ret = array();
  $ret[] = $fileName;
  echo json_encode($ret);
}
?>