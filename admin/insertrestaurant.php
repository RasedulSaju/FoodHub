<?php
session_start();
    /// received data collection
    // $_POST represents an associative array
    include '../config.php';
    if(isset($_POST['rname']) && isset($_POST['radd']) && isset($_POST['rcon']) && isset($_POST['rlogo']) && !empty($_POST['rname']) && !empty($_POST['radd']) && !empty($_POST['rcon']) && !empty($_POST['rlogo']) ){
        
        $var1=$_POST['rname'];
        $var2=$_POST['radd'];
        $var3=$_POST['rcon'];
        $var4=$_POST['rlogo'];
        try{
            $dbcon = new PDO("mysql:host=$dbserver:$dbport;dbname=$db;","$dbuser","$dbpass");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
                $query="INSERT INTO restaurants (restaurant_name, restaurant_address, restaurant_contact, restaurant_logo) VALUES('$var1','$var2','$var3','$var4')";

                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query);

                    /// if successful, forward the user to the user list page
                    
                }
                catch(PDOException $ex){
                    /// if not successful, return back to add user page
                    ?>
<script>
    window.location.assign('addrestaurant.php')

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
    window.location.assign('addrestaurant.php')

</script>
<?php
        }
    }
    else{
        ?>
<script>
    window.location.assign('addrestaurant.php')

</script>
<?php
    }
?>
