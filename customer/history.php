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
				<title>Customer Dashboard | FoodHub</title>
				<style>
					th{
						padding-bottom: 5px;
						text-decoration: underline;
					}
					tr{
						border-bottom: 1px solid;
					}
					table{
						outline-style: solid;
					}
					td {
						text-align: center;
					}
				</style>
			</head>
			<body>
				<?php
					include '../config.php';
				?>
				<center>
				<h3>FoodHub Customer Dashboard</h3>
				<br>
				
				<br>
				 <table style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <!--<th>User ID</th>-->
                            <th>Order Type</th> 
                            <th>Order Placed</th> 
                            <th>Status</th>
                            <!--<th>Item ID</th>-->
                            <th>Restaurant Name</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        try{
                            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery="SELECT * FROM orders WHERE user_id='$var1'";

                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDO Statement

                                $hometable=$returnval->fetchAll();

                                foreach($hometable as $row){

                    ?>

                                <tr>
                                    <td><?php echo $row['order_id'] ?></td>
                                    <!--<td>< ? php echo $row['user_id'] ? ></td>-->
                                    <td><?php echo $row['order_type'] ?></td>
                                    <td><?php echo $row['order_placed'] ?></td>
                                    <td><?php echo $row['order_status'] ?></td>
                                    <!--<td>< ? php echo $row['item_id'] ? ></td>-->
                                    <td><?php echo $row['restaurant_name'] ?></td>
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
                                    <td><?php echo $row['user_email'] ?></td>
                                    <td><?php echo $row['user_phone'] ?></td>
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
				<a href="../logout.php">Log Out</a>
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