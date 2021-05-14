<?php 
    //Connecting MongoDB and to database and coolection
    include 'dbconnect.php';
    $db = $con->Product_data;
    $collection = $db->Branch_details;

    //variables 
    $bname = $_POST['bname'];
    $buserid = $_POST['username'];
    $bpass = $_POST['password'];
    $badd = $_POST['address'];

    //iterator
    $collection->insertOne([
        'Branch Name' => $bname,
        'Branch Userid' => $buserid,
        'Branch Pass' => $bpass,
        'Branch Address' => $badd,
    ]);
    echo"<script>alert('Branch added');</script>";
    echo "<script>location.href='Admin_home.php'</script>";
 ?> 