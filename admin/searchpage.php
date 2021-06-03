<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Restaurant | FoodHub</title>
    <link href="../logo.jpg" rel="icon" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="dahsboard_heading">
        <h3>Search Restaurant</h3>
    </div>
    <ul>
        <li><a href="../login">Home</a></li>
        <li><a href="restaurants">Go Back to - Restaurants</a></li>
        <li style="float:right"><a href="../logout.php">Log Out</a></li>
    </ul>
    <?php
            include '../config.php';
            if (isset($_GET['param1']) && !empty($_GET['param1'])) {
            ?>

    <div class="dashboard_background" style="display:flex; flex-direction: column; justify-content: start; align-items:center; color:#ffffff">
        <h2>Showing Result for: <q><b><?php echo $_GET['param1'] ?></b></q></h2>
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
                            try {
                                $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;", "$dbuser", "$dbpass");
                                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $searchval = $_GET['param1'];
                                $sqlquery = "";
                                if (!empty($searchval)) {
                                    $sqlquery = "SELECT * FROM restaurants where restaurant_name LIKE '%$searchval%'";
                                }


                                try {
                                    $returnval = $dbcon->query($sqlquery); ///PDO Statement

                                    $productstable = $returnval->fetchAll();

                                    foreach ($productstable as $row) {
                            ?>
                <tr>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><img src="<?php echo $row['restaurant_logo'] ?>" alt="<?php echo $row['restaurant_name'] ?>" height="50px" width="50px"></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_name'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_rating'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_address'] ?></a></td>
                    <td><a href="restaurant?id=<?php echo $row['restaurant_id'] ?>"><?php echo $row['restaurant_contact'] ?></a></td>
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
                            } catch (PDOException $ex) {
                                ?>
                <tr>
                    <td colspan="5">Data read error ... ...</td>
                </tr>
                <?php
                            }
                            ?>
            </tbody>
        </table>
    </div>
    <?php
            } else {
            ?>
    <script>
        window.location.assign('restaurants.php');

    </script>
    <?php
            }
            ?>
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
