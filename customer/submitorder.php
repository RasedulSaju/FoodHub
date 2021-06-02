<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'customer') {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Confirm Order | FoodHub</title>
            <link href="<?php echo $row['restaurant_logo'] ?>" rel="icon" />
            <link rel="stylesheet" href="../css/style.css">
            <style>
            </style>
        </head>

        <body>

            <ul>
                <li><a href="../login">Home</a></li>
                <li><a href="history">History</a></li>
                <li><a class="active" href="restaurants">Restaurants</a></li>
                <li style="float:right"><a href="../logout.php">Log Out</a></li>
            </ul>
            <div class="dashboard_background" style="flex-direction:column; align-items:center; justify-content:space-evenly; padding:0px;">
            <div class="dahsboard_heading" style="width: 30%;">
                <h1 style="color: white">Order Overview</h1>
            </div>

            <table style="width:100%;" class="table_design">
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

            <div style="display:flex; flex-direction:column; align-items: center;">
                <h3>Delevery Type:</h3> 
                <div style="display: flex; color: #FFFFFF">
                    <input type="radio" id="onspot" name="deleverytype" value="onspot">
                    <label for="onspot">On Spot</label>
                    <input type="radio" id="homedelevery" name="deleverytype" value="homedelevery">
                    <label for="homedelevery">Home Delevery</label>
                </div>
            </div>

            <a class="btn-grn" href="index.php">Place Order</a>
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