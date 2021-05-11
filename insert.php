<?php 
require_once __DIR__ . '/mongo/vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");

$db = $con->testdb;
$collection = $db->testcollection;

$collection->insertOne(["Name"=> "Hello"]);
 ?>