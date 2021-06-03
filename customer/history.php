<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'customer') {
        $var1 = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer History | FoodHub</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
            include '../config.php';
            ?>
    <div class="dahsboard_heading">
        <h3>FoodHub Customer History</h3>
    </div>
    <br>
    <ul>
        <li><a href="../login">Home</a></li>
        <li><a class="active" href="history">History</a></li>
        <li><a href="restaurants">Restaurants</a></li>
        <li style="float:right"><a href="../logout.php">Log Out</a></li>
    </ul>
    <div class="dashboard_background" style="margin-top:30px;">
        <table style="width:100%" class="table_design">
            <thead>
                <tr>
                    <!--<th>Serial</th>
                            <th>User ID</th>-->
                    <th>Order Type</th>
                    <th>Order Placed</th>
                    <th>Status</th>
                    <!--<th>Item ID</th>-->
                    <th>Item Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        try {
                            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;", "$dbuser", "$dbpass");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery = "SELECT * FROM orders NATURAL JOIN items WHERE user_id='$var1'";

                            try {
                                $returnval = $dbcon->query($sqlquery); ///PDO Statement

                                $hometable = $returnval->fetchAll();

                                foreach ($hometable as $row) {

                        ?>

                <tr>
                    <!--<td>< ? php echo $row['order_id'] ? ></td>
                                        <td>< ? php echo $row['user_id'] ? ></td>-->
                    <td><?php echo $row['order_type'] ?></td>
                    <td><?php echo $row['order_placed'] ?></td>
                    <td><?php echo $row['order_status'] ?></td>
                    <!--<td>< ? php echo $row['item_id'] ? ></td>-->
                    <td><?php echo $row['item_name'] ?></td>
                </tr>

                <?php
                                }
                            } catch (PDOException $ex) {
                                ?>

                <tr>
                    <td colspan="3">Data read error ... ...</td>
                </tr>
                <?php
                            }
                        } catch (PDOException $ex) {

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
    <br />
    <br />


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
