<?php 
    session_start();
    $uname = $_SESSION['uname'];

    //Connecting MongoDB and to database and coolection
    include 'branchdbconnect.php';
    $db = $con->Company_Chat;

    //variables 
    $to = $_POST['to'];
    $message = $_POST['message'];

    //collection
    $collection = $db->$to;
    
    //iterator
    $insertOneResult = $collection->insertOne([
        'from' => $uname,
        'message' => $message,
    ]);
    
    echo "<script> alert('Message Sent.');</script>";
    echo "<script> location.href='Branch_home.php'</script>";
 ?> 