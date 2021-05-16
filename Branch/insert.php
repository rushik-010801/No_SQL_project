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
  <h2 class="display-4 text-white">Add Product</h2>
  <div id="container">
  <form action="insert.php" method="post">
            <label>Order ID:</label>
            <input type="text" name="orderid">
             <label style="margin-left:10px">Ship Date:</label>
            <input type="text" name="shipdate" placeholder="DD/MM/YYYY">

            <?php 
                //Connecting MongoDB and to database and coolection
                include 'branchdbconnect.php';
                $db = $con->Product_data;
                $collection = $db->Godown_stock;

                //iterator Ship Mode
                $cursor = $collection->distinct('Ship Mode');
                echo"<label>Choose a Ship Mode:</label>";
                echo"<select name='shipmode' id='shipmode'>";
                foreach($cursor as $document){
                    echo"<option value='$document'>$document</option>";
                }
                echo"</select><br><br>";
                echo"<label >Quantity:</label>";
                echo"<input type='text' name='quantity'>";
                echo"<label style='margin-left:10px'>Product ID:</label>";
                echo"<input type='text' name='productid'>";
            
                //iterator category
                $cursor = $collection->distinct('Category');
                echo"<label style='margin-left:12px' for='categories'>Choose a Category:</label>";
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
            <label  >Product Name:</label>
            <input type="text" name="pname">
            <label >Price:</label>
            <input type="text" name="price">
            <input type="submit" value="Insert" class="insert-p">
        </form>
    </div> <br><br>



<?php 
    //Connecting MongoDB and to database and coolection
    include 'branchdbconnect.php';
    $db = $con->Product_data;
    $collection = $db->Godown_stock;

    if(!empty($_POST['orderid'])){ 
        $orderid = $_POST['orderid'];
        $shipdate = $_POST['shipdate'];
        $shipmode = $_POST['shipmode'];
        $quantity = $_POST['quantity'];
        $productid = $_POST['productid'];
        $categories = $_POST['categories'];
        $SubCategory = $_POST['SubCategory'];
        $pname = $_POST['pname'];
        $price = $_POST['price'];

        $insertOneResult = $collection->insertOne([
            'Order ID' => $orderid,
            'Ship Date' => $shipdate,
            'Ship Mode' => $shipmode,
            'Quantity' => $quantity,
            'Product ID' => $productid,
            'Ship Mode' => $shipmode,
            'Category' => $categories,
            'Sub-Category' => $SubCategory,
            'Product Name' => $pname,
            'Price' => $price,
        ]);

        echo "<script>alert('Inserted Data');</script>";
        printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

   }
   ?>
</div>
</body>
</html> 