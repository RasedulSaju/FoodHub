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
				<title>All Restaurants | FoodHub</title>
				<link rel="stylesheet" href="../css/style.css">
			</head>
			<body>
				<?php
					include '../config.php';
				?>
				<center>
				<h3>FoodHub - All Restaurants</h3>
				<br>
				<ul>
					<li><a href="../login">Home</a></li>
					<li><a href="history">History</a></li>
					<li><a class="active" href="restaurants">Restaurants</a></li>
					<li style="float:right"><a href="../logout.php">Log Out</a></li>
				</ul>
				<br>
				<h1>Promotional</h1>
				<br>
				
				 <table style="width:100%">
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
				<hr/>
				<hr/>
				<br/>
				<h1>All Restaurants</h1>
				<!-- Search starts -->
				<input type="search" id="searchbox">
                <input type="button" value="Search" id="searchbtn">
                <br>
                <script>
                    var srcbtn=document.getElementById('searchbtn');
                    srcbtn.addEventListener('click', searchprocess);

                    function searchprocess(){
                        var searchvalue=document.getElementById('searchbox').value;
                        window.location.assign("searchpage.php?param1="+searchvalue);
                    }

                </script>
				<!-- /. Search Ends -->
				<br>
				<br>
				<table style="width:100%">
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
				<br/>
				<br/>
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