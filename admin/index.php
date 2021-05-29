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
                <center>
                <h3>FoodHub Admin Dashboard</h3>
                <br>
                <ul>
                    <li><a class="active" href="../login">Home</a></li>
                    <li><a href="history">History</a></li>
                    <li><a href="restaurants">Restaurants</a></li>
                    <li style="float:right"><a href="../logout.php">Log Out</a></li>
                </ul>
                <br>
                
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th> 
                            <th>Phone</th> 
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        try{
                            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery="SELECT * FROM usertable WHERE user_id='$var1'";

                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDO Statement

                                $hometable=$returnval->fetchAll();

                                foreach($hometable as $row){

                    ?>

                                <tr>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><a href="mailto:<?php echo $row['user_email'] ?>"><?php echo $row['user_email'] ?></a></td>
                                    <td><a href="tel:<?php echo $row['user_phone'] ?>"><?php echo $row['user_phone'] ?></a></td>
                                    <td><?php echo $row['user_address'] ?></td>
                                    <td><a href="edituser.php?id=<?php echo $row['user_id'] ?>">Edit</a>
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
                <br/>
                <br/>
                
                <div>
                    <a class="btn-grn" href="addrestaurant">Add Restaurant</a>
                    <a class="btn-grn" href="additem">Add Item</a>
                </div>
                
                </center>
                
            </body>
            </html>
            <?php
            }
            else{
        ?>
        <script>window.location.assign('../login.php');</script>
        <?php
    }
        }
    else{
        ?>
        <script>window.location.assign('../login.php');</script>
        <?php
    }
    ?>