<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role']) && isset($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['role']) && !empty($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
?>
<script>
    window.location.assign('admin/');

</script>
<?php
    } else if ($_SESSION['role'] == 'manager') {
    ?>
<script>
    window.location.assign('manager/');

</script>
<?php
    } else if ($_SESSION['role'] == 'customer') {
    ?>
<script>
    window.location.assign('customer/');

</script>
<?php
    }
} else {
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login | FoodHub</title>
    <link href="logo.jpg" rel="icon" />
    <link rel="stylesheet" href="./login.css" type="text/css" media="screen">
</head>

<body>
    <div class="login_page">
        <div class='login'>
            <h1>FoodHub</h1>
            <h3>Login</h3>
            <form action="verifyuser.php" method="POST">
                Username: <input type="text" name="uname"><br><br>
                Password: <input type="password" name="upass"><br><br>
                <br><br>
                <input type="submit" value="Sign In">
            </form>
        </div>
    </div>
</body>

</html>
<?php
}
?>
