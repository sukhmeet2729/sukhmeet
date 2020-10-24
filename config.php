<?php
date_default_timezone_set("Asia/Kolkata");

define("WEBSITE_NAME","Linky");
define("WEBSITE_TITLE","Link Your long link to short");

define("DATABASE_HOST","localhost");
define("DATABASE_USER","root");
define("DATABASE_PASSWORD","");
define("DATABASE_NAME","shortener");

$connection = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);

if(!$connection){
    print("Failed to connect !");
    die();
}

?>
