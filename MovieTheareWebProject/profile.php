<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="profileStyle.css">
    <link rel="stylesheet" href="barStyle.css">
</head>
<body>
    <?php 
        require_once "config.php";
    
        if (!isset($_SESSION['id'])) {

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

    <h1 style="color:white; text-align:center;">My Profile</h1>
    <div class="container">
        <label style="color:white; font-size:20px"><span style="color:#19b493">Name: </span><?php echo $_SESSION['user_name'] ?></label><br>
        <label style="color:white; font-size:20px"><span style="color:#19b493">Email: </span><?php echo $_SESSION['user_email'] ?></label><br>
        <button type="submit" class="changePassword" onclick="window.location.href='display-tickets.php';">My Tickets</button><br>
        <button type="submit" class="changePassword" onclick="window.location.href='validate-password.php';">Change Password</button><br>
        <button type="submit" class="changePassword" onclick="confirmDelete()">Delete Account</button>
    </div>

    <script>
        function confirmDelete() {

            if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {

                window.location.href = "delete-account.php";
            } 
        }
    </script>
</body>
</html>