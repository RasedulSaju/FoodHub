<?php
session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])){
        if($_SESSION['role']=='customer'){
        	$var1=$_SESSION['user_id'];
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Available Restaurants | FoodHub</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
					include '../config.php';
				?>
    <div class="dahsboard_heading">
        <h3>FoodHub - Available Restaurants</h3>
    </div>
    <br>
    <ul>
        <li><a href="../login">Home</a></li>
        <li><a href="history">History</a></li>
        <li><a class="active" href="restaurants">Restaurants</a></li>
        <li style="float:right"><a href="../logout.php">Log Out</a></li>
    </ul>
    <div style="display: flex; flex-direction:column; align-items:center;">
        <h1>Promotional</h1>

        <table style="width:100%" class="table_design">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Restaurant Name</th>
                    <th>Rating</th>
                    <th>Address</th>
                    <th>Discount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        try{
                            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery="SELECT * FROM promotional NATURAL JOIN restaurants";

                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDO Statement

                                $hometable=$returnval->fetchAll();

                                foreach($hometable as $row){

                    ?>

                <tr>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><img src="<?php echo $row['restaurant_logo'] ?>" alt="<?php echo $row['restaurant_name'] ?>" height="80px" width="80px"></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_name'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_rating'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_address'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['discount'] ?>%</a></td>
                </tr>

                <?php
                                                               }
                            }
                            catch(PDOException $ex){
                                ?>

                <tr>
                    <td colspan="5">Data read error ... ...</td>
                </tr>
                <?php
                            }               
                        }

                        catch(PDOException $ex){

                        ?>
                <tr>
                    <td colspan="5">Data read error ... ...</td>
                </tr>
                <?php
                        }
                        ?>

            </tbody>
        </table>
        <h1>All Restaurants</h1>
        <!-- Search starts -->
        <div class="search_baksho">
            <input type="search" placeholder="Search for a restaurant..." id="searchbox">
            <input type="button" value="Search" id="searchbtn" class="btn-grn">

            <script>
                var srcbtn = document.getElementById('searchbtn');
                srcbtn.addEventListener('click', searchprocess);

                function searchprocess() {
                    var searchvalue = document.getElementById('searchbox').value;
                    window.location.assign("searchpage.php?param1=" + searchvalue);
                }

            </script>
            <!-- /. Search Ends -->
        </div>
        <table style="width:100%" class="table_design">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Restaurant Name</th>
                    <th>Rating</th>
                    <th>Address</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        try{
                            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery="SELECT * FROM restaurants";

                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDO Statement

                                $hometable=$returnval->fetchAll();

                                foreach($hometable as $row){

                    ?>

                <tr>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><img src="<?php echo $row['restaurant_logo'] ?>" alt="<?php echo $row['restaurant_name'] ?>" height="80px" width="80px"></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_name'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_rating'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_address'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_contact'] ?></a></td>
                </tr>

                <?php
                                                               }
                            }
                            catch(PDOException $ex){
                                ?>

                <tr>
                    <td colspan="3">Data read error ... ...</td>
                </tr>
                <?php
                            }               
                        }

                        catch(PDOException $ex){

                        ?>
                <tr>
                    <td colspan="3">Data read error ... ...</td>
                </tr>
                <?php
                        }
                        ?>

            </tbody>
        </table>
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
