<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="barStyle.css">
    <link rel="stylesheet" href="movieDetails.css">
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
                                $movie1_genre = $row["movie_genre"];
                                $movie1_director = $row["movie_director"];
                                $movie1_cast = $row["movie_cast"];
                                $movie1_duration = $row["movie_duration"];
                                $movie1_summary = $row["movie_summary"];
                                $movie1_poster = $row["movie_poster"];
                                $movie1_trailer = $row["movie_trailer"];
                                $movie1_rating_imdb = $row["rating_imdb"];
                                $movie1_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie1_rating_metacritic = $row["rating_metacritic"];
                                $movie1_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 1:
                                $movie2_id = $row["id"];
                                $movie2_name = $row["movie_name"];
                                $movie2_genre = $row["movie_genre"];
                                $movie2_director = $row["movie_director"];
                                $movie2_cast = $row["movie_cast"];
                                $movie2_duration = $row["movie_duration"];
                                $movie2_summary = $row["movie_summary"];
                                $movie2_poster = $row["movie_poster"];
                                $movie2_trailer = $row["movie_trailer"];
                                $movie2_rating_imdb = $row["rating_imdb"];
                                $movie2_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie2_rating_metacritic = $row["rating_metacritic"];
                                $movie2_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 2:
                                $movie3_id = $row["id"];
                                $movie3_name = $row["movie_name"];
                                $movie3_genre = $row["movie_genre"];
                                $movie3_director = $row["movie_director"];
                                $movie3_cast = $row["movie_cast"];
                                $movie3_duration = $row["movie_duration"];
                                $movie3_summary = $row["movie_summary"];
                                $movie3_poster = $row["movie_poster"];
                                $movie3_trailer = $row["movie_trailer"];
                                $movie3_rating_imdb = $row["rating_imdb"];
                                $movie3_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie3_rating_metacritic = $row["rating_metacritic"];
                                $movie3_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 3:
                                $movie4_id = $row["id"];
                                $movie4_name = $row["movie_name"];
                                $movie4_genre = $row["movie_genre"];
                                $movie4_director = $row["movie_director"];
                                $movie4_cast = $row["movie_cast"];
                                $movie4_duration = $row["movie_duration"];
                                $movie4_summary = $row["movie_summary"];
                                $movie4_poster = $row["movie_poster"];
                                $movie4_trailer = $row["movie_trailer"];
                                $movie4_rating_imdb = $row["rating_imdb"];
                                $movie4_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie4_rating_metacritic = $row["rating_metacritic"];
                                $movie4_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 4:
                                $movie5_id = $row["id"];
                                $movie5_name = $row["movie_name"];
                                $movie5_genre = $row["movie_genre"];
                                $movie5_director = $row["movie_director"];
                                $movie5_cast = $row["movie_cast"];
                                $movie5_duration = $row["movie_duration"];
                                $movie5_summary = $row["movie_summary"];
                                $movie5_poster = $row["movie_poster"];
                                $movie5_trailer = $row["movie_trailer"];
                                $movie5_rating_imdb = $row["rating_imdb"];
                                $movie5_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie5_rating_metacritic = $row["rating_metacritic"];
                                $movie5_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 5:
                                $movie6_id = $row["id"];
                                $movie6_name = $row["movie_name"];
                                $movie6_genre = $row["movie_genre"];
                                $movie6_director = $row["movie_director"];
                                $movie6_cast = $row["movie_cast"];
                                $movie6_duration = $row["movie_duration"];
                                $movie6_summary = $row["movie_summary"];
                                $movie6_poster = $row["movie_poster"];
                                $movie6_trailer = $row["movie_trailer"];
                                $movie6_rating_imdb = $row["rating_imdb"];
                                $movie6_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie6_rating_metacritic = $row["rating_metacritic"];
                                $movie6_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 6:
                                $movie7_id = $row["id"];
                                $movie7_name = $row["movie_name"];
                                $movie7_genre = $row["movie_genre"];
                                $movie7_director = $row["movie_director"];
                                $movie7_cast = $row["movie_cast"];
                                $movie7_duration = $row["movie_duration"];
                                $movie7_summary = $row["movie_summary"];
                                $movie7_poster = $row["movie_poster"];
                                $movie7_trailer = $row["movie_trailer"];
                                $movie7_rating_imdb = $row["rating_imdb"];
                                $movie7_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie7_rating_metacritic = $row["rating_metacritic"];
                                $movie7_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 7:
                                $movie8_id = $row["id"];
                                $movie8_name = $row["movie_name"];
                                $movie8_genre = $row["movie_genre"];
                                $movie8_director = $row["movie_director"];
                                $movie8_cast = $row["movie_cast"];
                                $movie8_duration = $row["movie_duration"];
                                $movie8_summary = $row["movie_summary"];
                                $movie8_poster = $row["movie_poster"];
                                $movie8_trailer = $row["movie_trailer"];
                                $movie8_rating_imdb = $row["rating_imdb"];
                                $movie8_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie8_rating_metacritic = $row["rating_metacritic"];
                                $movie8_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 8:
                                $movie9_id = $row["id"];
                                $movie9_name = $row["movie_name"];
                                $movie9_genre = $row["movie_genre"];
                                $movie9_director = $row["movie_director"];
                                $movie9_cast = $row["movie_cast"];
                                $movie9_duration = $row["movie_duration"];
                                $movie9_summary = $row["movie_summary"];
                                $movie9_poster = $row["movie_poster"];
                                $movie9_trailer = $row["movie_trailer"];
                                $movie9_rating_imdb = $row["rating_imdb"];
                                $movie9_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie9_rating_metacritic = $row["rating_metacritic"];
                                $movie9_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            case 9:
                                $movie10_id = $row["id"];
                                $movie10_name = $row["movie_name"];
                                $movie10_genre = $row["movie_genre"];
                                $movie10_director = $row["movie_director"];
                                $movie10_cast = $row["movie_cast"];
                                $movie10_duration = $row["movie_duration"];
                                $movie10_summary = $row["movie_summary"];
                                $movie10_poster = $row["movie_poster"];
                                $movie10_trailer = $row["movie_trailer"];
                                $movie10_rating_imdb = $row["rating_imdb"];
                                $movie10_rating_rottentomatoes = $row["rating_rottentomatoes"];
                                $movie10_rating_metacritic = $row["rating_metacritic"];
                                $movie10_rating_letterboxd = $row["rating_letterboxd"];
                                break;
                            default:
                                break;
                            }
                        $counter++; 
                    }
                }

                mysqli_stmt_close($stmt);
                mysqli_close($link);
            }
        }
    ?>

    <div class="w3-bar" style="position:fixed;">
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

    <div class="film-container" id="M1">
        <div class="film-poster">
            <img src=<?php echo $movie1_poster?> alt="<?php echo $movie1_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie1_name?></h1>
            <div class="tags">
                <span>IMAX</span>
                <span>3D</span>
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie1_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie1_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie1_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie1_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p><?php echo $movie1_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie1_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie1_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie1_rating_imdb?>" max="100"></progress> <?php echo $movie1_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie1_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie1_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie1_rating_metacritic?>" max="100"></progress> <?php echo $movie1_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie1_rating_letterboxd?>" max="100"></progress> <?php echo $movie1_rating_letterboxd?></p>
            </div>
        </div>
    </div>

    <div class="film-container" id="M2">
        <div class="film-poster">
            <img src="<?php echo $movie2_poster?>"  alt="<?php echo $movie2_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie2_name?></h1>
            <div class="tags">
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie2_name?></p>
            <p><strong>Cast:</strong> <?php echo $movie2_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie2_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie2_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p> <?php echo $movie2_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie2_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie2_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie2_rating_imdb?>" max="100"></progress> <?php echo $movie2_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie2_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie2_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie2_rating_metacritic?>" max="100"></progress> <?php echo $movie2_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie2_rating_letterboxd?>" max="100"></progress> <?php echo $movie2_rating_letterboxd?></p>
            </div>
        </div>
    </div>

    <div class="film-container" id="M3">
        <div class="film-poster">
            <img src="<?php echo $movie3_poster?>" alt="<?php echo $movie3_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie3_name?></h1>
            <div class="tags">
                <span>IMAX</span>
                <span>3D</span>
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie3_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie3_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie3_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie3_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p> <?php echo $movie3_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie3_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie3_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie3_rating_imdb?>" max="100"></progress> <?php echo $movie3_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie3_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie3_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie3_rating_metacritic?>" max="100"></progress> <?php echo $movie3_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie3_rating_letterboxd?>" max="100"></progress> <?php echo $movie3_rating_letterboxd?></p>
            </div>
        </div>
    </div>

    <div class="film-container" id="M4">
        <div class="film-poster">
            <img src="<?php echo $movie4_poster?>" alt="<?php echo $movie4_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie4_name?></h1>
            <div class="tags">
                <span>IMAX</span>
                <span>3D</span>
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie4_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie4_cast?> </p>
            <p><strong>Genre:</strong> <?php echo $movie4_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie4_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p><?php echo $movie4_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie4_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie4_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie4_rating_imdb?>" max="100"></progress> <?php echo $movie4_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie4_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie4_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie4_rating_metacritic?>" max="100"></progress> <?php echo $movie4_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie4_rating_letterboxd?>" max="100"></progress> <?php echo $movie4_rating_letterboxd?></p>
            </div>
        </div>
    </div>

    <div class="film-container" id="M5">
        <div class="film-poster">
            <img src="<?php echo $movie5_poster?>" alt="<?php echo $movie5_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie5_name?></h1>
            <div class="tags">
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie5_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie5_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie5_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie5_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p><?php echo $movie5_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie5_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie5_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie5_rating_imdb?>" max="100"></progress> <?php echo $movie5_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie5_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie5_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie5_rating_metacritic?>" max="100"></progress> <?php echo $movie5_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie5_rating_letterboxd?>" max="100"></progress> <?php echo $movie5_rating_letterboxd?></p>
            </div>
        </div>
    </div>

    <div class="film-container" id="M6">
        <div class="film-poster">
            <img src="<?php echo $movie6_poster?>" alt="<?php echo $movie6_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie6_name?></h1>
            <div class="tags">
                <span>IMAX</span>
                <span>3D</span>
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie6_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie6_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie6_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie6_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p><?php echo $movie6_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie6_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie6_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie6_rating_imdb?>" max="100"></progress> <?php echo $movie6_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie6_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie6_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie6_rating_metacritic?>" max="100"></progress> <?php echo $movie6_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie6_rating_letterboxd?>" max="100"></progress> <?php echo $movie6_rating_letterboxd?></p>
            </div>
        </div>
    </div>

    <div class="film-container" id="M7">
        <div class="film-poster">
            <img src="<?php echo $movie7_poster?>" alt="<?php echo $movie7_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie7_name?></h1>
            <div class="tags">
                <span>IMAX</span>
                <span>3D</span>
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie7_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie7_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie7_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie7_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p><?php echo $movie7_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie7_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie7_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie7_rating_imdb?>" max="100"></progress> <?php echo $movie7_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie7_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie7_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie7_rating_metacritic?>" max="100"></progress> <?php echo $movie7_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie7_rating_letterboxd?>" max="100"></progress> <?php echo $movie7_rating_letterboxd?></p>
            </div>
        </div>
    </div>

    <div class="film-container" id="M8">
        <div class="film-poster">
            <img src="<?php echo $movie8_poster?>" alt="<?php echo $movie8_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie8_name?></h1>
            <div class="tags">
                <span>IMAX</span>
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie8_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie8_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie8_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie8_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p> <?php echo $movie8_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie8_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie8_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie8_rating_imdb?>" max="100"></progress> <?php echo $movie8_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie8_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie8_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie8_rating_metacritic?>" max="100"></progress> <?php echo $movie8_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie8_rating_letterboxd?>" max="100"></progress> <?php echo $movie8_rating_letterboxd?></p>
            </div>
        </div>
    </div>

    <div class="film-container" id="M9">
        <div class="film-poster">
            <img src="<?php echo $movie9_poster?>" alt="<?php echo $movie9_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie9_name?></h1>
            <div class="tags">
                <span>IMAX</span>
                <span>3D</span>
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie9_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie9_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie9_genre?></p>
            <p><strong>Duration:</strong> <?php echo $movie9_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p><?php echo $movie9_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie9_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie9_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie9_rating_imdb?>" max="100"></progress> <?php echo $movie9_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie9_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie9_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie9_rating_metacritic?>" max="100"></progress> <?php echo $movie9_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie9_rating_letterboxd?>" max="100"></progress> <?php echo $movie9_rating_letterboxd?></p>
            </div>
        </div>
    </div>
    
    <div class="film-container" id="M10">
        <div class="film-poster">
            <img src="<?php echo $movie10_poster?>" alt="<?php echo $movie10_name?>">
        </div>

        <div class="film-info">
            <h1><?php echo $movie10_name?></h1>
            <div class="tags">
                <span>IMAX</span>
                <span>2D</span>
            </div>
            <p><strong>Director:</strong> <?php echo $movie10_director?></p>
            <p><strong>Cast:</strong> <?php echo $movie10_cast?></p>
            <p><strong>Genre:</strong> <?php echo $movie10_genre?>/p>
            <p><strong>Duration:</strong> <?php echo $movie10_duration?></p>
            
            <div class="movie-summary">
                <h2>Movie Summary</h2>
                <p><?php echo $movie10_summary?></p>
            </div>

            <div class="buttons">
                <form action="book-ticket.php" method="POST" style="display:inline-block;">
                    <input type="hidden" name="movie_id" value="<?php echo $movie10_id; ?>">
                    <button type="submit" class="buy-ticket">Book Ticket</button>
                </form>
                <button class="watch-trailer" onclick="window.open('<?php echo $movie10_trailer?>')">Watch Trailer</button>
            </div>
        </div>

        <div class="rating-section">
            <h2><span>Ratings</span></h2>
            <div class="progress">
                <p>IMDB: <progress value="<?php echo $movie10_rating_imdb?>" max="100"></progress> <?php echo $movie10_rating_imdb?></p>
                <p>Rotten Tomatoes: <progress value="<?php echo $movie10_rating_rottentomatoes?>" max="100"></progress> <?php echo $movie10_rating_rottentomatoes?></p>
                <p>metacritic: <progress value="<?php echo $movie10_rating_metacritic?>" max="100"></progress> <?php echo $movie10_rating_metacritic?></p>
                <p>Letterboxd: <progress value="<?php echo $movie10_rating_letterboxd?>" max="100"></progress> <?php echo $movie10_rating_letterboxd?></p>
            </div>
        </div>
    </div>
</body>
</html>