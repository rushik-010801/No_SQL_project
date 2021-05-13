<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
	<div class="header">
<center><font color="white" ><h1>Add Stocks</h1></font></center></div>

    <div id="container">
        <form action="insert2.php" method="post">
            <label >Order ID:</label>
            <input type="text" name="orderid">
             <label>Ship Date:</label>
            <input type="text" name="shipdate" placeholder="DD/MM/YYYY">

            <?php 
                //Connecting MongoDB and to database and coolection
                include 'dbconnect.php';
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
                echo"<label >Product ID:</label>";
                echo"<input type='text' name='productid'>";
            
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
            <label >Product Name:</label>
            <input type="text" name="pname">
            <label >Price:</label>
            <input type="text" name="price">
            <div id="lower">
            	<div align="center">
                <input type="submit" value="Add Stock">
                </div>
            </div>
        </form>
    </div>
</body>
</html>