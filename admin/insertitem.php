<?php
session_start();
    /// received data collection
    // $_POST represents an associative array
    include '../config.php';
    if(isset($_POST['iname']) && isset($_POST['ipri']) && isset($_POST['rid']) && !empty($_POST['iname']) && !empty($_POST['ipri']) && !empty($_POST['rid']) ){
        $var1=$_POST['iname'];
        $var2=$_POST['ipri'];
        $var3=$_POST['rid'];
        try{
            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $query="INSERT INTO items (item_name, item_price, restaurant_id) VALUES('$var1','$var2','$var3')";

                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query);

                    /// if successful, forward the user to the user list page
                    
                }
                catch(PDOException $ex){
                    /// if not successful, return back to add user page
                    ?>
<script>
    window.location.assign('additem.php')

</script>
<?php
                }
            ?>
<script>
    window.location.assign('restaurants.php')

</script>
<?php
        }
        catch(PDOException $ex){
            ?>
<script>
    window.location.assign('additem.php')

</script>
<?php
        }
    }
    else{
        ?>
<script>
    window.location.assign('additem.php')

</script>
<?php
    }
?>
