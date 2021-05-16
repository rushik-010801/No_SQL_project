<?php 
    //Connecting MongoDB and to database and coolection
    include 'dbconnect.php';
    $db = $con->Company_Chat;

    //variables 
    $to = $_POST['to'];
    $message = $_POST['message'];

    //collection
    $collection = $db->$to;
    
    //iterator
    $insertOneResult = $collection->insertOne([
        'from' => "admin",
        'message' => $message,
    ]);
    
    echo "<script> alert('Message Sent.');</script>";
    echo "<script> location.href='admin_home.php'</script>";
 ?> 