<?php
session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])){
        if($_SESSION['role']=='customer'){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>View Restaurant | FoodHub</title>
                <link href="../logo.jpg" rel="icon"/>
				<link rel="stylesheet" href="../css/style.css">
            </head>
            <body>
                <ul>
					<li><a href="../login">Home</a></li>
					<li><a href="history">History</a></li>
					<li><a class="active" href="restaurants">Restaurants</a></li>
					<li style="float:right"><a href="../logout.php">Log Out</a></li>
				</ul>
                <?php
                    include'../config.php';
                    if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    ?> 
					<h1>Restaurant Details</h1>
                                <?php
                                    try{
                                        $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                                        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        
										$sqlquery="SELECT * FROM restaurants where restaurant_id=$id";
                                        
                                        
                                        try{
                                            $returnval=$dbcon->query($sqlquery); ///PDO Statement
                                            
                                            $productstable=$returnval->fetchAll();
                                            
                                            foreach($productstable as $row){
                                                ?>
												
												<table>
													<thead>
														<tr>
															<th>Logo</th><td><img src="../restaurants/<?php echo $row['restaurant_logo'] ?>" alt="<?php echo $row['restaurant_name'] ?>" height="50px" width="50px"></td>
															
															</tr>
															<tr>
															
															<th>Restaurant Name</th> <td> <?php echo $row['restaurant_name'] ?></td>
															
															</tr>
															<tr>
															
															<th>Rating</th> <td> <?php echo $row['restaurant_rating'] ?></td>
															
															</tr>
															<tr>
															
															<th>Address</th> <td> <?php echo $row['restaurant_address'] ?></td>
															
															</tr>
															<tr>
															
															<th>Contact</th><td> <?php echo $row['restaurant_contact'] ?></td>
														</tr>
													</thead>
													<tbody>
                                                    <tr>
														
														
														
														
														
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
                    <?php  
                    }
                    else{
                        ?>
                            <script>
                                window.location.assign('pending.php');
                            </script>
                        <?php
                    }
            ?>
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