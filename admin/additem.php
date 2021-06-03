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
        <h3>FoodHub Add Item</h3>
    </div>
    <ul>
        <li><a class="active" href="../login">Home</a></li>
        <li><a href="restaurants">Restaurants</a></li>
        <li style="float:right"><a href="../logout.php">Log Out</a></li>
    </ul>
    <br>
    <?php include '../config.php';
                        try{
                            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery="SELECT * FROM restaurants";

                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDO Statement

                                $restauranttable=$returnval->fetchAll();
                                ?>
    <div class="dashboard_background">
        <form action="insertitem.php" method="POST" class="table_design" style="display: flex; flex-direction: column;">
            Item Name: <input type="text" name="iname"><br><br>
            Item Price: <input type="text" name="ipri"><br><br>
            Restaurant Name: <select name="rid">
                <?php
					foreach($restauranttable as $rstdata){
                ?>
                <option value="<?php echo $rstdata['restaurant_id'] ?>"><?php echo $rstdata['restaurant_name'] ?></option>
                <?php
                    }
                ?>
            </select>

            <?php
							}
                            catch(PDOException $ex){
                                echo $ex;
                            }
                        }
                        catch(PDOException $ex){
                                echo $ex;
                            }

                ?>

            <br><br>
            <input class="btn-grn" type="submit" value="Add Item">
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
