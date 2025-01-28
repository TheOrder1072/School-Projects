<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Movie</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="homeStyle.css">
    <link rel="stylesheet" href="selectmovieStyle.css">
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
                                $movie1_name = $row["movie_name"];
                                $movie1_poster = $row["movie_poster"];
                                break;
                            case 1:
                                $movie2_id = $row["id"];
                                $movie2_name = $row["movie_name"];
                                $movie2_poster = $row["movie_poster"];
                                break;
                            case 2:
                                $movie3_id = $row["id"];
                                $movie3_name = $row["movie_name"];
                                $movie3_poster = $row["movie_poster"];
                                break;
                            case 3:
                                $movie4_id = $row["id"];
                                $movie4_name = $row["movie_name"];
                                $movie4_poster = $row["movie_poster"];
                                break;
                            case 4:
                                $movie5_id = $row["id"];
                                $movie5_name = $row["movie_name"];
                                $movie5_poster = $row["movie_poster"];
                                break;
                            case 5:
                                $movie6_id = $row["id"];
                                $movie6_name = $row["movie_name"];
                                $movie6_poster = $row["movie_poster"];
                                break;
                            case 6:
                                $movie7_id = $row["id"];
                                $movie7_name = $row["movie_name"];
                                $movie7_poster = $row["movie_poster"];
                                break;
                            case 7:
                                $movie8_id = $row["id"];
                                $movie8_name = $row["movie_name"];
                                $movie8_poster = $row["movie_poster"];
                                break;
                            case 8:
                                $movie9_id = $row["id"];
                                $movie9_name = $row["movie_name"];
                                $movie9_poster = $row["movie_poster"];
                                break;
                            case 9:
                                $movie10_id = $row["id"];
                                $movie10_name = $row["movie_name"];
                                $movie10_poster = $row["movie_poster"];
                                break;
                            default:
                                break;
                        }
                        $counter++;
                    }    
                }
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($link);
    ?>

    <div class="w3-bar" style="position:fixed">
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

    <br><br>

    <h2 style="text-align:center">Movies</h2>

    <div class="film-container" style="margin-top: -40px">

        <div class="film-card">
            <img src="<?php echo $movie1_poster; ?>" alt="<?php echo $movie1_name; ?>">
            <h3><?php echo $movie1_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie1_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M1'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie2_poster; ?>" alt="<?php echo $movie2_name; ?>">
            <h3><?php echo $movie2_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie2_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M2'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie3_poster; ?>" alt="<?php echo $movie3_name; ?>">
            <h3><?php echo $movie3_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie3_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M3'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie4_poster; ?>" alt="<?php echo $movie4_name; ?>">
            <h3><?php echo $movie4_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie4_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M4'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie5_poster; ?>" alt="<?php echo $movie5_name; ?>">
            <h3><?php echo $movie5_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie5_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M5'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie6_poster; ?>" alt="<?php echo $movie6_name; ?>">
            <h3><?php echo $movie6_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie6_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M6'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie7_poster; ?>" alt="<?php echo $movie7_name; ?>">
            <h3><?php echo $movie7_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie7_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M7'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie8_poster; ?>" alt="<?php echo $movie8_name; ?>">
            <h3><?php echo $movie8_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie8_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M8'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie9_poster; ?>" alt="<?php echo $movie9_name; ?>">
            <h3><?php echo $movie9_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie9_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M9'">Details</button>
            </div>
        </div>

        <div class="film-card">
            <img src="<?php echo $movie10_poster; ?>" alt="<?php echo $movie10_name; ?>">
            <h3><?php echo $movie10_name; ?></h3>
            <div class="buttons">
                <form action="book-ticket.php" method="POST">
                    <input type="hidden" name="movie_id" value="<?php echo $movie10_id?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="details" onclick="window.location.href='movie-details.php#M10'">Details</button>
            </div>
        </div>
    </div>
</body>
</html>