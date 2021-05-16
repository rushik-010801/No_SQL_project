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
<style>
  label{
    font-weight: bold;
  }
.search-p1{
  background-color:aqua;
  border-style: none;
}
  </style>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="home.css">
</head>
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

  <!-- Demo content -->
  <h2 class="display-4 text-white">SEARCH</h2>
  <p class="lead text-white mb-0">Which product you want to check?</p><br>
  <div id="container">
  <form action="search_p.php" method="post">

  <?php 
  //Connecting MongoDB and to database and coolection
  include 'dbconnect.php';
  $db = $con->Product_data;
  $collection = $db->Godown_stock;

  //iterator category
  $cursor = $collection->distinct('Category');
  echo"<label for='categories'>Choose a Category:</label>";
  echo"<select name='categories' id='category'>";
  foreach($cursor as $document){
      echo"<option value='$document'>$document</option>";
  }
  echo"</select><br><br>";

  //iterator sub - category
  $cursor = $collection->distinct('Sub-Category');
  echo"<label for='SubCategory'>Choose a Sub-Category:</label>";
  echo"<select name='SubCategory' id='subcategory'>";
  foreach($cursor as $document){
      echo"<option value='$document'>$document</option>";
  }
  echo"</select><br><br>";

?> 
<input type="submit" value="Search" class="search-p1"><br><br>
</form>

</form>
<form action="search_p.php" method="post"> 
<input type="text"  name="pname" placeholder="Enter Product Name">
<input type="submit" value="Search" class="search-p1"><br><Br>
</form>
<form action="search_p.php" method="post"> 
<input type="text"  name="pid" placeholder="Enter Product ID">
<input type="submit" value="Search" class="search-p1">
</form>
    </div> <br><br>

    <table>        
      <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Ship Date</th>
      <th>Category</th>
      <th>Sub-Category</th>
      <th>Price</th>
      <th>Quantity</th>
      </tr>


<?php 

    if(!empty($_POST['categories']) or !empty($_POST['SubCategory'])){
      $cat = $_POST["categories"];
      $sub = $_POST["SubCategory"];
  
      //iterator
      $cursor = $collection->find(['Category' => $cat, 'Sub-Category' => $sub,]);
      foreach($cursor as $document){
        echo"<tr>";
        echo"<td>".$document["Product ID"]."</td>";
        echo"<td>".$document["Product Name"]."</td>";
        echo"<td>".$document["Ship Date"]."</td>";
        echo"<td>".$document["Category"]."</td>";
        echo"<td>".$document["Sub-Category"]."</td>";
        echo"<td>".$document["Price"]."</td>";
        echo"<td>".$document["Quantity"]."</td>";
        echo"</tr>";
    }
   }

   if(!empty($_POST['pname'])){
      $pname = $_POST["pname"];

    //iterator
    $cursor = $collection->find(['Product Name' => $pname,]);
    foreach($cursor as $document){
      echo"<tr>";
      echo"<td>".$document["Product ID"]."</td>";
      echo"<td>".$document["Product Name"]."</td>";
      echo"<td>".$document["Ship Date"]."</td>";
      echo"<td>".$document["Category"]."</td>";
      echo"<td>".$document["Sub-Category"]."</td>";
      echo"<td>".$document["Price"]."</td>";
      echo"<td>".$document["Quantity"]."</td>";
      echo"</tr>";
  }
 }

 if(!empty($_POST['pid'])){
  $pid = $_POST["pid"];

//iterator
$cursor = $collection->find(['Product ID' => $pid,]);
foreach($cursor as $document){
  echo"<tr>";
  echo"<td>".$document["Product ID"]."</td>";
  echo"<td>".$document["Product Name"]."</td>";
  echo"<td>".$document["Ship Date"]."</td>";
  echo"<td>".$document["Category"]."</td>";
  echo"<td>".$document["Sub-Category"]."</td>";
  echo"<td>".$document["Price"]."</td>";
  echo"<td>".$document["Quantity"]."</td>";
  echo"</tr>";
}
}

    
 ?> 
 </table>
</div>
</body>
</html> 