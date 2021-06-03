<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'customer') {
        $uid = $_SESSION['user_id'];
        include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Confirm Order | FoodHub</title>
    <link href="../logo.jpg" rel="icon" />
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
            <tbody id="table">

            </tbody>
        </table>
		<h2 id="total" style="color:#FFFFFF; background-color:#272E48"></h2>

        <div style="display:flex; flex-direction:column; align-items: center;">
            <h3>Delevery Type:</h3>
            <div style="display: flex; color: #FFFFFF">
                <input type="radio" id="onspot" name="deleverytype" value="onspot" checked>
                <label for="onspot">On Spot</label>
                <input type="radio" id="homedelevery" name="deleverytype" value="homedelevery">
                <label for="homedelevery">Home Delevery</label>
            </div>
        </div>

        <button class="btn-grn" id="placeOrder">Place Order</button>

        <script>
            var orderitems = JSON.parse(localStorage["orders"]);
            let table = document.getElementById("table");
            var i;
			let total = 0;
            for (i = 0; i < orderitems.length; i++) {
                let row = table.insertRow();
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                let cell3 = row.insertCell(2);
                cell1.innerHTML = orderitems[i].nam;
                cell2.innerHTML = orderitems[i].qty;
                cell3.innerHTML = orderitems[i].qty * orderitems[i].pri;
				total = total + orderitems[i].qty * orderitems[i].pri;
            }
			document.getElementById("total").innerHTML="Total: "+total;
        </script>

        <script>
            $(document).ready(
                function() {
                    var ordbtn = document.getElementById('placeOrder');
                    ordbtn.addEventListener('click', orderProcess);

                    function orderProcess() {
                        
                        /*var dbhost = <?php echo json_encode($dbserver); ?>;
                        var dbusr = <?php echo json_encode($dbuser); ?>;
                        var dbp = <?php echo json_encode($dbpass); ?>;
                        var dbn = <?php echo json_encode($db); ?>;
                        var dbpor = <?php echo json_encode($dbport); ?>;*/
                        var uid = <?php echo json_encode($uid); ?>;
                        var deleverytype = $('input[name="deleverytype"]:checked').val();
						
						alert(deleverytype+" Order has been placed successfully");

                        /*var mysql = require('mysql');

                        var con = mysql.createConnection({
                            host: dbhost + "",
                            user: dbusr + "",
                            password: dbp + "",
                            database: dbn + "",
                            port: dbpor + ""
                        });

                        con.connect(function(err) {
                            if (err) throw err;
                            var orderitems = JSON.parse(localStorage["orders"]);
                            var i;
                            for (i = 0; i < orderitems.length; i++) {
                                var iid = orderitems[i].itm;
                                var qty = orderitems[i].qty;
                                con.query("INSERT INTO orders (user_id, order_type, item_id, quantity) VALUES(uid, deleverytype, iid, qty)", function(err, result, fields) {
                                    if (err) throw err;
                                    console.log(fields);
                                });
                            }

                        });*/
                        localStorage.clear();
                        window.location.assign("index.php");
                    }
                }
            );

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
