<?php

$servername = "localhost";

$db = new mysqli("yab-db-1.cgre3b3croxw.eu-central-1.rds.amazonaws.com", "admin", "yab-admin135", "test");

if($db->connect_error){
  die("Cannot connect to database: ".$db->connect_error);
}