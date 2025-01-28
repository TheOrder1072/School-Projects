<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="aboutStyle.css">
    <link rel="stylesheet" href="barStyle.css">
</head>
<body>
    
    <?php require_once "config.php"; ?>
    
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

    <h1 style="color:white; text-align:center; font-weight:bold; margin-top: -20px">About</h2>

    <div class="container">
        <p style="color:white">
            Discover a wide selection of movies, including the latest blockbusters and timeless classics. Founded in 2024, our platform combines cutting-edge technology and comfort with a commitment to exceeding expectations, creating a unique and unforgettable movie experience. 
            <br><br>
            Pick the date and showtime that suits you best, and select your preferred seat—all in just a few clicks. Whether you're planning a fun outing with friends, a family movie night, or a solo cinema experience, we are here to provide you with the best experience possible and don't forget to have fun!
            <br><br>
            With a strong focus on innovation, we take pride in introducing advanced cinema technologies like IMAX, bringing our audience closer to the action than ever before. Our offerings ensure maximum comfort while our state-of-the-art digital transformation has made us a pioneer in the cinema industry. 
            <br><br>
            Join us in redefining the future of cinema and bringing the joy of movies to all!
        </p>
    </div>

    <h1 style="color:white; text-align:center; font-weight:bold">Contact</h2>

    <div class="container">
        <p style="color:white">
            
            Have any questions or need assistance? We’d love to hear from you!
            <br><br>
            Feel free to reach out to us through the contact details below:
            <br><br>
            Email: support@cineplex.com<br>
            Phone: +1 (800) 123-4567<br>
            Address: Cineplex Theaters, 1234 Hollywood Blvd, Los Angeles, CA 90028, USA
            <br><br>
            For inquiries regarding reservations, showtimes, or any technical support, our team is available to assist you. We look forward to hearing from you!
        </p>
    </div>

    <br>
</body>
</html>