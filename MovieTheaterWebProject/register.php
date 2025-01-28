<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="registerStyle.css">
    <link rel="stylesheet" href="barStyle.css">
</head>
<body>
    <?php
    
        require_once "config.php";

        if (isset($_SESSION['id'])) {

            header("Location: home.php");
            exit();
        } else {

            $name = $email = $password = $passwordConfirm = "";
            $nameError = $emailError = $passwordError = $passwordConfirmError = $emailExistError = $passwordMatchErrorMsg = "";
            $dataError = $passwordMatchError = false;
    
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                function test_input($data) {
    
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
        
                    return $data;
                }
    
                //check name
                if (empty($_POST["name"])) {
                    $nameError = "Name is required";
                } else if (!preg_match("/^[a-zA-ZşçüığöŞÇÜİĞÖ' ]*$/", $_POST["name"])) {
                    $nameError = "Only letters and white space allowed";
                } else {
                    $name = test_input($_POST["name"]);
                }
    
                //check email
                if (empty($_POST["email"])) { 
                    $emailError = "Email is required";
                } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Please enter a valid email";
                } else {
                    $email = test_input($_POST["email"]);
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
    
                //check if email exists
                $sql = "SELECT * FROM users";
                $result = mysqli_query($link, $sql);
    
                $rows = [];
                while ($users = $result->fetch_assoc()) {
                    $rows[] = $users;
                }
                foreach ($rows as $users) {
    
                    if ($email === $users["user_email"]) {
    
                        $emailExistError = "Email is already in use";
                    }
                }
    
                //check password match
                if ($password !== $passwordConfirm) {
    
                    $passwordMatchError = true;

                    if ($passwordConfirmError === "") {

                        $passwordMatchErrorMsg = "Passwords don't match"; 
                    }
                } 
                
                //create account
                if ($nameError === "" && $emailError === "" && $passwordError ===  "" && $passwordConfirmError === "" && $emailExistError === "" && $passwordMatchError === false) {
    
                    $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$name', '$email', '$password')";
                
                    if (mysqli_query($link, $sql)) {
            
                        header("Location: login.php");
                        exit();
                    }
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

        <h2>Create Account</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

            <div class="formElement">
                <label>Full Name <span style="color: red";>*</span><span style="font-size: 12px; color: red";><?php echo $nameError;?></span></label>
                <input type="text" class="textarea" name="name" placeholder="Enter your name">
            </div>
            <div class="formElement">
                <label>Email <span style="color: red";>*</span><span style="font-size: 12px; color: red"><?php echo $emailError;?></span><span style="font-size: 12px; color: red"><?php echo $emailExistError;?></span></label>
                <input type="text" class="textarea" name="email" placeholder="Enter your email">
            </div>
            <div class="formElement">
                <label>Password <span style="color: red";>*</span><span style="font-size: 12px; color: red"><?php echo $passwordError;?></span></label>
                <input type="password" class="textarea" name="password" placeholder="Enter your password">
            </div>
            <div class="formElement">
                <label>Confirm Password <span style="color: red";>*</span><span style="font-size: 12px; color: red"><?php echo $passwordConfirmError;?></span><span style="font-size: 12px; color: red"><?php echo $passwordMatchErrorMsg;?></span></label> 
                <input type="password" class="textarea" name="confirm_password" placeholder="Confirm your password">
            </div>
            <button type="submit" class="submitButton">Create Account</button>
            
        </form>

        <p class="footer">Already have an account? <a href="login.php">Login</a></p>

    </div>
</body>
</html>