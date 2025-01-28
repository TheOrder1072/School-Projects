<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Theater Home Page</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="homeStyle.css">
    <link rel="stylesheet" href="barStyle.css">
</head>
<body>

    <?php 
        require_once "config.php"; 

        $sql = "SELECT * FROM movies";

        if($stmt = mysqli_prepare($link, $sql)) {

            if (mysqli_stmt_execute($stmt)) {

                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    $counter = 0;

                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        switch ($counter) {
                            case 0:
                                $movie1_id = $row["id"];
                                $movie1_poster = $row["movie_poster"];
                                break;
                            case 1:
                                $movie2_id = $row["id"];
                                $movie2_poster = $row["movie_poster"];
                                break;
                            case 2:
                                $movie3_id = $row["id"];
                                $movie3_poster = $row["movie_poster"];
                                break;
                            case 3:
                                $movie4_id = $row["id"];
                                $movie4_poster = $row["movie_poster"];
                                break;
                            case 4:
                                $movie5_id = $row["id"];
                                $movie5_poster = $row["movie_poster"];
                                break;
                            case 5: 
                                $movie6_id = $row["id"];
                                $movie6_poster = $row["movie_poster"];
                                break;
                            case 6:
                                $movie7_id = $row["id"];
                                $movie7_poster = $row["movie_poster"];
                                break;
                            case 7: 
                                $movie8_id = $row["id"];
                                $movie8_poster = $row["movie_poster"];
                                break;
                            case 8:
                                $movie9_id = $row["id"];
                                $movie9_poster = $row["movie_poster"];
                                break;
                            case 9:
                                $movie10_id = $row["id"];
                                $movie10_poster = $row["movie_poster"];
                                break;
                            default:
                                break;
                            }
                        $counter++;
                    }
                }
            } else {
                echo "An error occured. Please try again later.";
            }
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

    <h1 style="text-align:center">Movies in Theaters</h1>

    <div class="slider" style="margin-top: 20px">
        <div class="slides">

            <div class="slide">
                <img src="<?php echo $movie1_poster?>" alt="Movie 1">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M1'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie1_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>                    
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie2_poster?>" alt="Movie 2">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M2'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie2_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie3_poster?>" alt="Movie 3">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M3'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie3_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie4_poster?>" alt="Movie 4">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M4'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie4_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie5_poster?>" alt="Movie 5">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M5'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie5_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie6_poster?>" alt="Movie 6">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M6'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie6_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie7_poster?>" alt="Movie 7">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M7'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie7_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie8_poster?>" alt="Movie 8">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M8'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie8_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie9_poster?>" alt="Movie 9">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M9'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie9_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>

            <div class="slide">
                <img src="<?php echo $movie10_poster?>" alt="Movie 10">
                <div class="overlay">
                    <button onclick="window.location.href='movie-details.php#M10'">View Details</button>
                    <form action="book-ticket.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie10_id; ?>">
                        <button type="submit" class="buy-ticket">Book Ticket</button>
                    </form>         
                </div>
            </div>
        </div>

        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <br>

    <script>
        let currentSlide = 0;
        const slideCount = document.querySelectorAll('.slide').length;
        const slidesToShow = 3;
        const slidesWidth = 100 / slidesToShow;

        function moveSlide(direction) {
            const totalSlides = slideCount;
            currentSlide = (currentSlide + direction + totalSlides) % totalSlides;

            const slidesContainer = document.querySelector('.slides');
            slidesContainer.style.transform = 'translateX(' + (-currentSlide * slidesWidth) + '%)';
        }

        setInterval(() => {moveSlide(1);}, 3000);
    </script>
</body>
</html>