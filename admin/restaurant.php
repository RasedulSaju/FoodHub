<?php
session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])){
        if($_SESSION['role']=='admin'){
            
            
                
                    include'../config.php';
                    if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    ?> 
					
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
			<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title><?php echo $row['restaurant_name'] ?> | FoodHub</title>
                <link href="../restaurants/<?php echo $row['restaurant_logo'] ?>" rel="icon"/>
				<link rel="stylesheet" href="../css/style.css">
				<style>
					.bgimg{
						background-image: url("../restaurants/<?php echo $row['restaurant_bg'] ?>"); /* The image used */
						/* background-color: #cccccc; Used if the image is unavailable */
						height: 800px; /* You must set a specified height */
						width: 100%; /* You must set a specified width */
						background-position: center; /* Center the image */
						background-repeat: no-repeat; /* Do not repeat the image */
						background-size: 100% 100%; /* Resize the background image to cover the entire container */
					};
				</style>
				
            </head>
            <body>
			
                <ul>
					<li><a href="../login">Home</a></li>
					<li><a href="history">History</a></li>
					<li><a class="active" href="restaurants">Restaurants</a></li>
					<li style="float:right"><a href="../logout.php">Log Out</a></li>
				</ul>
			<div class="bgimg">
			<center>
				<h1 style="color: #ffffff; background-color: #00000060;"><?php echo $row['restaurant_name'] ?></h1>
				<img src="../restaurants/<?php echo $row['restaurant_logo'] ?>" alt="<?php echo $row['restaurant_name'] ?>" height="100px" width="100px">
												<table style="color: #ffffff; background-color: #000000; font-size: 20px;">
													<thead>
														<tr>
															<th>Rating</th> <td> : </td> <td> <?php echo $row['restaurant_rating'] ?></td>
															
															</tr>
															<tr>
															
															<th>Address</th> <td> : </td> <td> <?php echo $row['restaurant_address'] ?></td>
															
															</tr>
															<tr>
															
															<th>Contact</th> <td> : </td> <td> <a href="tel:<?php echo $row['restaurant_contact'] ?>"><?php echo $row['restaurant_contact'] ?></a></td>
														</tr>
													</thead>
													<tbody>
                                                    <tr>
														
														
														
														
														
													</tr>
                                                <?php
                                            }?>
									
                            </tbody>
                        </table>
								<?php
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
                    <?php  
                    }
                    else{
                        ?>
                            <script>
                                window.location.assign('index.php');
                            </script>
                        <?php
                    }
            ?>
			<br/>
			<br/>
			<div style="background-color: brown; width: fit-content; padding:1px 10px;"><h1 style="color: white">Menu</h1></div>
			<br/>
			<table style="width:100%; color: #ffffff; background-color: #000000; font-size: 20px;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        try{
                            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery="SELECT * FROM items";

                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDO Statement

                                $hometable=$returnval->fetchAll();

                                foreach($hometable as $row){

                    ?>

                                <tr>
                                    <td><?php echo $row['item_name'] ?></td>
                                    <td><?php echo $row['item_price'] ?></td>
									<td><?php echo $row['item_rating'] ?></a>
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
				</center>
				</div>
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