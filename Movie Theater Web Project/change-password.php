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

        if (isset($_SESSION['user_name'])) {

            $user_id = $_SESSION['id'];
            $password = $passwordConfirm = "";
            $passwordError = $passwordConfirmError = $passwordMatchErrorMsg = "";
            $passwordMatchError = false;
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                function test_input($data) {
    
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
        
                    return $data;
                }
    
                //check password
                if (empty($_POST["password"])) {
                    $passwordError = "Password is required";
                } else {
                    $password = test_input($_POST["password"]);
                }
    
                //check confirm password
                if (empty($_POST["confirm_password"])) {
                    $passwordConfirmError = "Please confirm your password";
                } else {
                    $passwordConfirm = test_input($_POST["confirm_password"]);
                }        
    
                //check password match
                if ($password !== $passwordConfirm && $passwordError === "" && $passwordConfirmError === "") {
    
                    $passwordMatchError = true;
                    $passwordMatchErrorMsg = "Passwords don't match"; 
                } 
    
                if ($passwordMatchError === false && $passwordConfirmError === "" && $passwordError === "") {
    
                    $sql = "UPDATE users SET user_password=? WHERE id=?";
    
                    if ($stmt = mysqli_prepare($link, $sql)) {
        
                        mysqli_stmt_bind_param($stmt, "si", $password, $user_id);
        
                        if (mysqli_stmt_execute($stmt)) {

                            $_SESSION['user_password'] = $password;    
                            header("location: profile.php");
                            exit();
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
        
                        mysqli_stmt_close($stmt);
                    } 
                }
    
                mysqli_close($link);
            }
        } else {

            header("location: home.php");
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

    <div class="container" style="padding-top:4px">

        <h2 style="color: white">Enter New Password</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

            <div class="formElement">
                <label style="color:red; font-size: 14px"><?php echo $passwordMatchErrorMsg?></label>
                <label style="color:white; font-size:16px">Enter New Password <span style="color:red; font-size: 12px">*<?php echo $passwordError?></span></label>
                <input type="password" class="textarea" name="password" placeholder="Enter your name">
            </div>
            <div class="formElement">
                <label style="color:white; font-size:16px">Confirm New Password <span style="color:red; font-size: 12px">*<?php echo $passwordConfirmError?></label>
                <input type="password" class="textarea" name="confirm_password" placeholder="Enter your email">
            </div>
            <button type="submit" class="submitButton">Change Password</button>
        
        </form>
    </div>
</body>
</html>