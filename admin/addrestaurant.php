<?php
session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])){
        if($_SESSION['role']=='admin'){
        	$var1=$_SESSION['user_id'];
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | FoodHub</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
        include '../config.php';
    ?>
    <div class="dahsboard_heading">
        <h3>FoodHub Add Restaurant</h3>
    </div>
    <ul>
        <li><a class="active" href="../login">Home</a></li>
        <li><a href="restaurants">Restaurants</a></li>
        <li style="float:right"><a href="../logout.php">Log Out</a></li>
    </ul>

    <div class="dashboard_background">
        <form action="insertrestaurant.php" method="POST" class="table_design" style="display: flex; flex-direction: column;">
            Restaurant Name: <input type="text" name="rname"><br><br>
            Restaurant Address: <input type="text" name="radd"><br><br>
            Restaurant Contact: <input type="text" value="+880" name="rcon"><br><br>
            Restaurant Logo Path: <input type="text" name="rlogo"><br><br>
            <br><br>
            <input class="btn-grn" style="width:150px;" type="submit" value="Add Restaurant">
        </form>
    </div>

</body>

</html>
<?php
            }
            else{
        ?>
<script>
    window.location.assign('../login.php');

</script>
<?php
    }
        }
    else{
        ?>
<script>
    window.location.assign('../login.php');

</script>
<?php
    }
    ?>
