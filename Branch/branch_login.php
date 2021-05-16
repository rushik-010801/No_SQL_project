<?php 
  $uname=$_POST["tf1"]; 
  $pass=$_POST["tf2"]; 

  //Connecting MongoDB and to database and coolection
  include 'branchdbconnect.php';
  $db = $con->Product_data;
  $collection = $db->Branch_details;
  $cursor = $collection->find(['Branch Userid' => $uname,]);
  $iterator = new IteratorIterator($cursor);
  $iterator->rewind();
  $document = $iterator->current();

  if($pass == $document['Branch Pass']){
    session_start();
    $_SESSION['uname']=$uname;
    echo "<script>location.href='Branch_home.php'</script>";
  }
  else{
    echo "<script> alert('Invalid Password or Username');</script>";
    echo "<script>location.href='Branch_login.html'</script>";
  }
 ?> 