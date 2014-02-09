<?php
header('Content-Type: application/json');
$output_dir = "../img/apartments/";
if(isset($_FILES["apartment-image"])) {
  $ret = array();

  $error = $_FILES["apartment-image"]["error"];
  //You need to handle  both cases
  //If Any browser does not support serializing of multiple files using FormData() 
  if(!is_array($_FILES["apartment-image"]["name"])) {
    $split = explode(".", $_FILES["apartment-image"]["name"]);
    $fileName = base64_encode(date(DATE_ATOM)) . "." . $split[count($split) - 1];
    move_uploaded_file($_FILES["apartment-image"]["tmp_name"],$output_dir.$fileName);
    $ret[]= $fileName;
  } else {
    $fileCount = count($_FILES["apartment-image"]["name"]);
    for($i=0; $i < $fileCount; $i++) {
      $fileName = $_FILES["apartment-image"]["name"][$i];
      move_uploaded_file($_FILES["apartment-image"]["tmp_name"][$i],$output_dir.$fileName);
      $ret[]= $fileName;
    }
  }
    echo json_encode($ret);
 }
 ?>