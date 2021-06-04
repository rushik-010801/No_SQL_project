<?php

session_start();
if(isset($_SESSION['uname'])){

}
else{
    echo " <script>alert('username or password is incorrect.')</script>";
    echo "<script>location.href='Branch_login.html'</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Branch Home</title>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="home.css">
</head>
<style>
    label{
        font-weight: bold;
    }
    .branch-p{
    background-color:aqua;
    border-style: none;
    width: 220px;
  }
    </style>
<body>
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
      <div class="media-body">
        <h4 class="m-0"><?php echo $_SESSION['uname']; ?></h4>
        <p class="font-weight-light text-muted mb-0">Branch Manager</p>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>
  <ul class="nav flex-column bg-white mb-0">
  <li class="nav-item">
      <a href="Branch_home.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Home
            </a>
    </li>
    <li class="nav-item">
      <a href="search.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Search 
            </a>
    </li>
    <li class="nav-item">
      <a href="insert.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Insert
            </a>
    </li>
    <li class="nav-item">
    <a href="branch_logout.php" class="nav-link text-dark font-italic">
    <i class="fa fa-sign-out mr-3 text-primary fa-fw"></i>
    Logout</a>
    </li>
  </ul>

</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <h2 class="display-4 text-white">Home</h2>

  <p class="lead text-white mb-0">
  <?php 

include 'branchdbconnect.php';
    $db = $con->Company_Chat;
    $uname = $_SESSION['uname'];
    $collection = $db->{$uname};
    $cursor = $collection->find();
    foreach($cursor as $document){
        ?>
        <p class="btn btn-info">
        <?php
        echo"From : " .$document['from'];
        echo" : " .$document['message'];
        echo "<p></p>";
    }

   
 ?> 
 </p><br>
  <form action="message.php"  method="post">
<label>Message to Other Braches or Admin:</label><br>
<input type="text"  name="to" placeholder = "Enter User ID/admin"><br>
<textarea name="message" placeholder="message" >
</textarea><br>
<input type="submit" value="Send" class="branch-p">
</form>
    



  </p>
</div>
</body>
</html> 