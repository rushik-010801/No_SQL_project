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

?>

<a href='dis_stock.php'><input type=button value='Search and See Stock' name=stock></a>