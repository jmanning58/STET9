<?php
require('model/reports_db.php');
$cityName = htmlspecialchars(filter_input(INPUT_POST, 'cityName'));
if(empty($cityName)){ $error_msg .= "City Name Cannot be Empty.<br>";}
        
$streetAddress = htmlspecialchars(filter_input(INPUT_POST, 'streetAddress'));
if(empty($streetAddress)){ $error_msg .= "Street Address Cannot be Empty.<br>";}
        
$accessNum = htmlspecialchars(filter_input(INPUT_POST, 'accessNum'));
if(empty($accessNum)){ $accessNum = NULL;}

        
$description = htmlspecialchars( filter_input(INPUT_POST, 'description'));
if(empty($description)){ $error_msg .= "Description Cannot be Empty.<br>";}
        
if(!empty($error_msg)){
    $error_msg .= "Please Try Again";
    include 'view/reportNest_v.php';  
} else {
    add_report($cityName, $streetAddress, $accessNum, $description);
    include 'view/ThankYou_v.html';
}
