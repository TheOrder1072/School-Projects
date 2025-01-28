<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="stylesheet" href="barStyle.css">
</head>
<body>
    <?php
        require_once "config.php";

        if (isset($_SESSION['id'])) {

            header("Location: home.php");
            exit();
        } else {

            $email = $password = "";
            $emailError = $passwordError = "";
            $dataError = "";
    
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                $sql = "SELECT * FROM users";
                $result = mysqli_query($link, $sql);
    
                //check email
                if (empty($_POST["email"])) {
                    $emailError = "Email is required";
                } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Please enter a valid email";
                } else {
                    $email = $_POST["email"];
                }
    
                //check password
                if (empty($_POST["password"])) {                  
                    $passwordError = "Password is required";
                } else {
                    $password = $_POST["password"];
                }
    
                $rows = [];
                while ($users = $result->fetch_assoc()) {
                    $rows[] = $users;
                }
    
    
                if ($result->num_rows > 0) {
    
                    foreach ($rows as $users) {
    
                        if (strcmp($email, $users["user_email"]) == 0 && $email !== "") {
        
                            if ($password == $users['user_password']) {
        
                                $_SESSION['id'] = $users['id'];
                                $_SESSION['user_name'] = $users['user_name'];
                                $_SESSION['user_email'] = $users['user_email'];
                                $_SESSION['user_password'] = $users['user_password'];
                                header("Location: home.php");
                                exit();
                            } else if ($password !== "") {
        
                                $dataError = "Invalid email or password";
                            }
                        } else if ($email !== "") {
        
                            $dataError = "Invalid email or password";
                        }
                    }   
                } else {
    
                    $dataError = "Invalid email or password";
                }
            }
    
            mysqli_close($link);   
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

    <div class="container">

        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> 

            <label style="font-size: 16px; color: red"><?php echo $dataError;?></label>

            <div class="formElement">
                <label>Email <span style="font-size: 12px; color: red">*<?php echo $emailError;?></span></label>
                <input type="text" class="textarea" name="email" placeholder="Enter your email">
            </div>
            <div class="formElement">
                <label>Password <span style="font-size: 12px; color: red">*<?php echo $passwordError;?></span></label>
                <input type="password" class="textarea" name="password" placeholder="Enter your password">
            </div>

            <button type="submit" class="submitButton">Login</button>
        </form>

        <div class="footer">
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </div>

    </div>
</body>
</html>