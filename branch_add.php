<?php

session_start();
if(isset($_SESSION['name'])){

}
else{
    echo " <script>alert('username or password is incorrect.')</script>";
    echo "<script>location.href='Admin_login.html'</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
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
    width: 320px;
  }
    </style>
<body>
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
      <div class="media-body">
        <h4 class="m-0"><?php echo $_SESSION['name']; ?></h4>
        <p class="font-weight-light text-muted mb-0">Administrator</p>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
    <a href='dis_stock.php' class="nav-link text-dark font-italic">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>Stocks
            </a>
    </li>
    <li class="nav-item">
      <a href="admin_home.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Home
            </a>
    </li>
    <li class="nav-item">
      <a href="search_p.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Search 
            </a>
    </li>
    <li class="nav-item">
      <a href="insert_p.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Insert
            </a>
    </li>
    <li class="nav-item">
      <a href="update_p.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Update 
            </a>
    </li>
    <li class="nav-item">
      <a href="delete_p.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Delete 
            </a>
    </li>
    <li class="nav-item">
      <a href="branch_add.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-book-o mr-3 text-primary fa-fw"></i>
                Add Branch
            </a>
    </li>
    <li class="nav-item">
    <a href="admin_logout.php" class="nav-link text-dark font-italic">
    <i class="fa fa-sign-out mr-3 text-primary fa-fw"></i>
    Logout</a>
    </li>
  </ul>

</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <h2 class="display-4 text-white">Add Branch</h2>
  <form action="branch_add.php" method="post">
            <label >Branch Name:</label><br>
            <input type="text" name="bname"><br><br>
             <label>Branch Username:</label><br>
            <input type="text" name="username"><br><br>
            <label >Branch Password:</label><br>
            <input type="password" name="password"><br><br>
            <label >Address :</label><br>
            <input type="text" name="address"><br><br>
            <input type="submit" value="Add Branch" class="branch-p">
        </form>
  <p class="lead text-white mb-0">
  <?php 

if(!empty($_POST['bname'])){
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
    ;
}
   
 ?> 
  </p>
</div>
</body>
</html> 



