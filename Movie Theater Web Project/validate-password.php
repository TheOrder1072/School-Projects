<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="profileStyle.css">
    <link rel="stylesheet" href="barStyle.css">
</head>
<body>
    <?php 
        require_once "config.php";

        if (isset($_SESSION['id'])) {

            $password = "";
            $passwordError = "";
    
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                //check password
                if (empty($_POST["password"])) {
                    $passwordError = "Password is required";
                } else if ($_POST["password"] != $_SESSION['user_password']) {
                    $passwordError = "Wrong password";
                } else {
                    $password = $_POST["password"];
                    $passwordError = "";
                }
    
                if ($password === $_SESSION['user_password'] && $passwordError === "") {
    
                    header("Location: change-password.php");
                    exit();
                }
            }
        } else {

            header("Location: home.php");
            exit();
        }
    ?>

    <div class="w3-bar">
        <a href="home.php" class="w3-bar-item w3-button w3-padding-16">Home</a>
        <a href="about.php" class="w3-bar-item w3-button w3-padding-16">About & Contact</a>
        <a href="movie-details.php" class="w3-bar-item w3-button w3-padding-16">Movies</a>
        <a href="select-movie.php" class="w3-bar-item w3-button w3-padding-16">Book Ticket</a>

        <?php if (!isset($_SESSION['user_name'])): ?>
            <a href="register.php" class="w3-bar-item w3-button w3-padding-16 w3-right">Sign In</a>
            <a href="login.php" class="w3-bar-item w3-button w3-padding-16 w3-right">Login</a>
        <?php else: ?>
            <a href="profile.php" class="w3-bar-item w3-button w3-padding-16 w3-right"><?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
            <a href="logout.php" class="w3-bar-item w3-button w3-padding-16 w3-right">Logout</a>
        <?php endif; ?>
    </div>

    <br>

    <div class="container" style="padding-top:10px">

        <h2 style="color:white">Validate Password</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

            <div class="formElement">
                <label style="color:white; font-size: 16px">Enter Your Current Password<span style="color:red; font-size: 12px"> *<?php echo $passwordError?></span></label>
                <input type="password" class="textarea" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="submitButton">Next</button>
        </form>
    </div>
</body>
</html>