<!DOCTYPE html>
<html>
<body>

<h1>Search By</h1>
<form action="dis_stock.php" method="post">
  
    <?php 
    session_start();
    $uname = $_SESSION['uname'];

    //Connecting MongoDB and to database and coolection
    include 'branchdbconnect.php';
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
  <input type="submit" value="Submit">
</form>
<form action="dis_stock2.php" method="post"> 
<input type="text"  name="productid">
<input type="submit" value="Submit">
</form>

</body>
</html>