<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'customer') {



        include '../config.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
?>

<?php
            try {
                $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;", "$dbuser", "$dbpass");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sqlquery = "SELECT * FROM restaurants where restaurant_id=$id";


                try {
                    $returnval = $dbcon->query($sqlquery); ///PDO Statement

                    $productstable = $returnval->fetchAll();

                    foreach ($productstable as $row) {
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $row['restaurant_name'] ?> | FoodHub</title>
    <link href="<?php echo $row['restaurant_logo'] ?>" rel="icon" />
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <ul>
        <li><a href="../login">Home</a></li>
        <li><a href="history">History</a></li>
        <li><a class="active" href="restaurants">Restaurants</a></li>
        <li style="float:right"><a href="../logout.php">Log Out</a></li>
    </ul>

    <div class="dahsboard_heading">
        <h1><?php echo $row['restaurant_name'] ?></h1>
    </div>
    <div class="dashboard_background" style="flex-direction:column; align-items:center; justify-content:space-evenly; padding:0px;">
        <img src="<?php echo $row['restaurant_logo'] ?>" alt="<?php echo $row['restaurant_name'] ?>" height="100px" width="100px">
        <table class="table_design">
            <thead>
                <tr>
                    <th style="text-align: center; padding:4px 4px;">Rating</th>
                    <td> : </td>
                    <td style="text-align: left;"> <?php echo $row['restaurant_rating'] ?></td>

                </tr>
                <tr>

                    <th style="text-align: center; padding: 4px 4px;">Address</th>
                    <td> : </td>
                    <td style="text-align: left;"> <?php echo $row['restaurant_address'] ?></td>

                </tr>
                <tr>

                    <th style="text-align: center; padding:4px 4px;">Contact</th>
                    <td> : </td>
                    <td style="text-align: left;"> <a href="tel:<?php echo $row['restaurant_contact'] ?>"><?php echo $row['restaurant_contact'] ?></a></td>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
                <?php
                                } ?>

            </tbody>
        </table>
        <?php
                        } catch (PDOException $ex) {
                            ?>
        <tr>
            <td colspan="5">Data read error ... ...</td>
        </tr>
        <?php
                        }
                    } catch (PDOException $ex) {
                            ?>
        <tr>
            <td colspan="5">Data read error ... ...</td>
        </tr>
        <?php
                    }
                } else {
                    ?>
        <script>
            window.location.assign('index.php');

        </script>
        <?php
                }
                    ?>
        <div class="dahsboard_heading" style="width: 30%;">
            <h1 style="color: white">Menu</h1>
        </div>

        <table style="width:100%;" class="table_design">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Order Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                            try {
                                $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;", "$dbuser", "$dbpass");
                                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sqlquery = "SELECT * FROM items where restaurant_id=$id";

                                try {
                                    $returnval = $dbcon->query($sqlquery); ///PDO Statement

                                    $hometable = $returnval->fetchAll();
									
									$counter=0;
                                    foreach ($hometable as $row){
										$counter++;
                            ?>

                <tr>
                    <td><?php echo $row['item_name'] ?></td>
                    <td><?php echo $row['item_price'] ?></td>
                    <td><?php echo $row['item_rating'] ?></a>
                    <td><input id="<?php echo $counter ?>" type="number"></a>
                </tr>

                <?php
                                    }
                                } catch (PDOException $ex) {
                                    ?>

                <tr>
                    <td colspan="4">Data read error ... ...</td>
                </tr>
                <?php
                                }
                            } catch (PDOException $ex) {

                                ?>
                <tr>
                    <td colspan="4">Data read error ... ...</td>
                </tr>
                <?php
                            }
                            ?>

            </tbody>
        </table>

        <button class="btn-grn" id="review-btn">Review Order</button>
        <script>
            var rvwbtn = document.getElementById('review-btn');
            rvwbtn.addEventListener('click', reviewprocess);

            function reviewprocess() {
                var i;
                var arr = new Array();

                var test = new Array();
                test = <?php echo json_encode($hometable); ?>;

                for (i = 1; i <= <?php echo $counter ?>; i++) {
                    var qty = document.getElementById(i).value + "";
                    var itmid = test[i - 1].item_id;
                    var nam = test[i - 1].item_name;
                    var pri = test[i - 1].item_price;
                    var obj = {};

                    if (qty > 0) {
                        obj["itm"] = itmid;
                        obj["nam"] = nam;
                        obj["qty"] = qty;
                        obj["pri"] = pri;
                        arr.push(obj);
                    }
                }
                localStorage["orders"] = JSON.stringify(arr);

                window.location.assign("submitorder");
            }

        </script>
    </div>
</body>

</html>
<?php
                } else {
                    ?>
<script>
    window.location.assign('../login.php');

</script>
<?php
                }
            } else {
                    ?>
<script>
    window.location.assign('../login.php');

</script>
<?php
            }
                ?>
