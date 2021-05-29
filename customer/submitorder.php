<?php
session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])){
        if($_SESSION['role']=='customer'){
           ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Confirm Order | FoodHub</title>
    <link href="<?php echo $row['restaurant_logo'] ?>" rel="icon" />
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .bgimg {
            background-image: url("../restaurants/<?php echo $row['restaurant_bg'] ?>");
            /* The image used */
            /* background-color: #cccccc; Used if the image is unavailable */
            height: 800px;
            /* You must set a specified height */
            width: 100%;
            /* You must set a specified width */
            background-position: center;
            /* Center the image */
            background-repeat: no-repeat;
            /* Do not repeat the image */
            background-size: 100% 100%;
            /* Resize the background image to cover the entire container */
        }
        ;
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
            <br />
            <br />
            <div style="background-color: brown; width: fit-content; padding:1px 10px;">
                <h1 style="color: white">Order Overview</h1>
            </div>
            <br />
            <table style="width:100%; color: #ffffff; background-color: #000000; font-size: 20px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Order Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Burger</td>
                        <td>3</td>
                        <td>6000</td>
                    </tr>
                    <tr>
                        <td>Pizza</td>
                        <td>2</td>
                        <td>5000</td>
                    </tr>
                    <tr>
                        <td>Pasta</td>
                        <td>2</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td><strong>12000</strong></td>
                    </tr>
                </tbody>
            </table>

            <br>
                <h3>Delevery Type:</h3> <input type="radio" id="onspot" name="deleverytype" value="onspot">
                                <label for="onspot">On Spot</label>
                                <input type="radio" id="homedelevery" name="deleverytype" value="homedelevery">
                                <label for="homedelevery">Home Delevery</label><br><br><br><br>

                <a class="btn-grn" href="index.php" style="width:100%;">Place Order</a>
        </center>
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
