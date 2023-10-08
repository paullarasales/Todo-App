<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/adminregister.css">
</head>
<body>
    <div class="form-container">
        <?php
        if(isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            require_once "database.php";
            $sql = "SELECT * FROM admin WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user) {
                if(password_verify($password, $user ["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: admindashboard.php");
                    die();
                }else {
                    echo "<div class='message-error'>Password does not match</div>";
                }
            }else {
                echo "<div class='message-error'>Email does not match</div>";
            }
        }
        ?>
        <form action="adminlogin.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Login">
        </form>
        <div><p>Not registered yet <a href="adminregister.php">Register Here</a></p></div>
    </div>
</body>
</html>