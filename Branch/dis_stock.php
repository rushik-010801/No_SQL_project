<!DOCTYPE html>
<html>
<head><title>Teacher page</title>
  <style>
    html, body {
    width: 100%;
    height: 100%;
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    color: #444;
     background: linear-gradient(45deg, #49a09d, #5f2c82); 
  }
.header {
  padding: 20px;
  text-align: center;
  background: #1abc9c;
  color: white;
}

table {
  width: 400px;
  border-collapse: collapse;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,td {
  padding: 15px;
  background-color: rgba(255,255,255,0.2);
  color: #fff;
}

th {
  text-align: center; background-color: #5f2c82;
}



tr :hover {
      background-color: #49a09d;
    }
  
  td {
   
    width: 200px;
    text-align: center;
    &:hover {
      &:before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: -9999px;
        bottom: -9999px;
        background-color: #49a09d;
        z-index: -1;
      }
    }
  }
input[type=submit] 
   { background-color: #4CAF50;
   border: none;
   color: white;
   padding: 15px 32px;
   text-align: center;
   text-decoration: bold;
   display: inline-block;
   font-size: 20px;
   margin: 4px 2px;
   cursor: pointer;
   background-color: #f44336;
    border-radius: 8px;
} 
.button {background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: bold;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    background-color: #f44336;
    border-radius: 8px;
  }
    p{
      font-size: 34px;
      color:black;
      font-weight: bold;
    }
    
    </style>
      </head>
<body>
<div align="right">
<a href='branch_logout.php'><input type=button value='Logout' align="right" name=Logout></a>
</div>

 <center><br><br>
    <h1>Welcome </h1>
    
    <p>Your Present Stocks</p><br>
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
    session_start();
    $uname = $_SESSION['uname'];

    //Connecting MongoDB and to database and coolection
    include 'branchdbconnect.php';
    $db = $con->Product_data;
    $collection = $db->$uname;

    //variables 
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

 ?> 
 </table>
</center>

</body></html>

