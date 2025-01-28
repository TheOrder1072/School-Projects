<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Ticket</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="profileStyle.css">
    <link rel="stylesheet" href="barStyle.css">
</head>
<body>
    <?php
        require_once "config.php";

        if (isset($_SESSION['id'])) {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (!empty($_POST['seatId'])) {
    
                    $selectedMovieId = $_POST['movie_id'];
                    $selectedMovieName = $_POST['selected_movie_name'];
                    $selectedDate = $_POST['selected_date'];
                    $selectedSeance = $_POST['selected_seans'];
                    $selectedSeat = $_POST['seatId']; 
                }
            }
    
            mysqli_close($link);
        } else {
            
            header("Location: login.php");
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

    <h1 style="color:white; text-align:center;">Confirm Ticket</h1>
    <div class="container">
        <label style="color:white"><span style="color:#19b493">Movie: </span><?php echo $selectedMovieName ?></label><br>
        <label style="color:white"><span style="color:#19b493">Date: </span><?php echo $selectedDate ?></label><br>
        <label style="color:white"><span style="color:#19b493">Seance: </span><?php echo $selectedSeance ?></label><br>
        <label style="color:white"><span style="color:#19b493">Seat: </span><?php echo $selectedSeat ?></label><br>
        <form method="POST" action="ticket-process.php">
            <input type="hidden" name="selected_movie_name" value="<?php echo htmlspecialchars($selectedMovieName); ?>">
            <input type="hidden" name="movie_id" value="<?php echo $selectedMovieId; ?>">
            <input type="hidden" name="selected_date" value="<?php echo htmlspecialchars($selectedDate); ?>">
            <input type="hidden" name="selected_seans" value="<?php echo htmlspecialchars($selectedSeance); ?>">
            <input type="hidden" name="seatId" value="<?php echo htmlspecialchars($selectedSeat); ?>">
            <button type="submit" class="changePassword">Book Ticket</button><br>
        </form>
    </div>
</body>
</html>