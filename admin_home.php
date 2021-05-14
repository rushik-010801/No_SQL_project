<div align="right">
<a href='admin_logout.php'><input type=button value='Logout' align="right" name=Logout></a>
</div>

<?php

    session_start();
    if(isset($_SESSION['name'])){
        echo $_SESSION['name'];
    }
    else{
        echo " <script>alert('username or password is incorrect.')</script>";
        echo "<script>location.href='Admin_login.html'</script>";
    }
    echo "<p>--------------------------------</p>";
    echo "<p>--------------------------------</p>";
    echo "<p> Your messages</p>";

    //Connecting MongoDB and to database and coolection
    include 'dbconnect.php';
    $db = $con->Company_Chat;
    $collection = $db->admin;
    $cursor = $collection->find();
    foreach($cursor as $document){
        echo"From : " .$document['from'];
        echo"Message : " .$document['message'];
        echo "<p>--------------------------------</p>";
    }
    echo "<p>--------------------------------</p>";
?>

<a href='search.php'><input type=button value='Search and See Stock' ></a>
<a href='insert1.php'><input type=button value='Insert Stock' ></a>
<a href='branch_add.html'><input type=button value='New Branch' ></a>

<form action="message.php"  method="post">
<label>Message to Branch:</label>
<input type="text"  name="to" placeholder = "Enter Branch ID">
<textarea name="message" >
</textarea>
<input type="submit" value="Send">
</form>

