<<?php 

require_once __DIR__ . '/mongo/vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");

$db = $con->Nosqltest;

$tb1 = $db->table1;

$tb1->insertOne(["Name"  => "Bathu", "Year" => 2021]);
 ?>