<?php 
  $uname=$_POST["tf1"]; 
  $pass=$_POST["tf2"]; 
  if($uname=="admin" AND $pass=="admin123"){
      session_start();
      $_SESSION['name']=$uname;
    echo "<script>location.href='admin_home.php'</script>";
  }
  else if($uname=="amit" AND $pass=="ammy"){
    session_start();
    $_SESSION['name']=$uname;
  echo "<script>location.href='admin_home.php'</script>";
  }
  else if($uname=="" AND $pass==""){
    echo "<script>alert('Welcome!!');</script>";
  }
  else{
    echo "<script>alert('Incorrect credentials');</script>";
    echo "<script>location.href='Admin_login.html'</script>";
  }
 ?> 