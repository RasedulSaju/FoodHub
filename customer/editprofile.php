<?php
session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])) {
	if ($_SESSION['role'] == 'customer') {
            $var1 = $_SESSION['user_id'];
            ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit User | Customer | FoohHub</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="../logo.jpg" rel="icon" />
</head>

<body>
    <div class="dahsboard_heading">
        <h3>Edit FoodHub Customer Profile</h3>
    </div>

    <ul>
        <li><a href="../login">Home</a></li>
        <li><a href="history">History</a></li>
        <li><a href="restaurants">Restaurants</a></li>
        <li style="float:right"><a href="../logout.php">Log Out</a></li>
    </ul>
    <?php
                include'../config.php';
                    try{
                        $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
                        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                        $sqlquery="SELECT * FROM usertable WHERE user_id='$var1'";
                        try{
                            $returnval=$dbcon->query($sqlquery); ///PDO Statement
                            
                            $userdata=$returnval->fetchAll();
                    
                            foreach($userdata as $info){

            ?>
    <div class="dashboard_background">
        <form action="" method="POST" class="table_design" style="display: flex; flex-direction: column;">
            User Name: <input type="text" value="<?php echo $info['username']; ?>" style="cursor: not-allowed;" title="User Name update not allowed" disabled><br><br>
            Email: <input type="email" name="uemail" value="<?php echo $info['user_email']; ?>"><br><br>
            Phone: <input type="text" name="uphone" value="<?php echo $info['user_phone']; ?>"><br><br>
            Phone: <input type="text" name="uadd" value="<?php echo $info['user_address']; ?>"><br><br>
            Password: <input type="password" name="upass"><br><br>

            <input class="btn-grn" type="submit" value="Update" style="cursor: not-allowed;" title="Not allowed to update" disabled>
        </form>

        <?php
                                                   }
                }
                catch(PDOException $ex){
            ?>
        <p>Data read error ... ...</p>
        <?php
                }               
            }

            catch(PDOException $ex){

            ?>
        <p>Data read error ... ...</p>
        <?php
            }
            ?>
    </div>
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
