<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Pending Orders List | Customer | FoodHub</title>
				</head>
            <body>
			<?php
                    include 'config.php';
                ?>
                <h3>FoodHub Orders List</h3>
                <br>
				 <table border='1'>
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Order Type</th> 
                            <th>Order Placed</th> 
                            <th>Status</th>
                            <th>Item ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        try{
                            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery="SELECT * FROM orders WHERE orders.user_id=2";

                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDO Statement

                                $hometable=$returnval->fetchAll();

                                foreach($hometable as $row){

                    ?>

                                <tr>
                                    <td><?php echo $row['order_id'] ?></td>
                                    <td><?php echo $row['ordertype'] ?></td>
                                    <td><?php echo $row['orderplaced'] ?></td>
                                    <td><?php echo $row['orderstatus'] ?></td>
                                    <td><?php echo $row['item_id'] ?></td>
                                    <td><a href="confirm.php?id=<?php echo $row['order_id'] ?>">Complete</a></td>
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
            </body>
            </html>