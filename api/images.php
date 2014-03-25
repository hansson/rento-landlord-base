<?php

header('Content-Type: application/json');
if(isset($_FILES["apartment-image"])) {
  $outputDir = "../img/apartments/";
  upload_image($outputDir);
} else if(isset($_FILES['contact-image'])) {
  $outputDir = "../img/contacts/";
  upload_image($outputDir);
}

function upload_image($outputDir) {
  $split = explode(".", $_FILES["apartment-image"]["name"]);
  $fileName = base64_encode(date(DATE_ATOM)) . "." . $split[count($split) - 1];
  move_uploaded_file($_FILES["apartment-image"]["tmp_name"], $outputDir . $fileName);
  $ret = array();
  $ret[] = $fileName;
  echo json_encode($ret);
}
?>