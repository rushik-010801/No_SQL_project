<?php 
    //Connecting MongoDB and to database and coolection
    include 'dbconnect.php';
    $db = $con->Product_data;
    $collection = $db->Godown_stock;

    //variables 
    $orderid = $_POST['orderid'];
    $shipdate = $_POST['shipdate'];
    $shipmode = $_POST['shipmode'];
    $quantity = $_POST['quantity'];
    $productid = $_POST['productid'];
    $categories = $_POST['categories'];
    $SubCategory = $_POST['SubCategory'];
    $pname = $_POST['pname'];
    $price = $_POST['price'];

    //iterator
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
    
    printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
 ?> 