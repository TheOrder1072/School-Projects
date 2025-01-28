<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Ticket</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="barStyle.css">
    <link rel="stylesheet" href="buyTicketStyle.css">
</head>
<body>
    <?php 
        require_once "config.php";

        $selected_Movie = "";

        if (isset($_SESSION['user_name'])) {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                date_default_timezone_set('Europe/Istanbul');
                $current_date = date('d F');
                $current_day = date('l');
                $tomorrow_date = date('d F', strtotime('+1 day'));
                $tomorrow_day = date('l', strtotime('+1 day'));
                $aftertomorrow_date = date('d F', strtotime('+2 day'));
                $aftertomorrow_day = date('l', strtotime('+2 day'));
                $selected_Movie = isset($_POST['selected_movie_name']) ? $_POST['selected_movie_name'] : $selected_Movie;
                $selected_MovieId = isset($_POST['movie_id']) ? $_POST['movie_id'] : null;
                $selected_date = isset($_POST['selected_date']) ? $_POST['selected_date'] : null;
                $selected_seans = isset($_POST['selected_seans']) ? $_POST['selected_seans'] : null;
    
                $sql = "SELECT * FROM movies";
                $result = mysqli_query($link, $sql);
                
                if ($result->num_rows > 0) {
    
                    $rows = [];
                    while ($movies = $result->fetch_assoc()) {
                        $rows[] = $movies;
                    }
            
                    foreach ($rows as $movies) {
            
                        if ($_POST["movie_id"] == $movies['id']) {
        
                            $selected_Movie = $movies['movie_name'];
                            $selected_MovieId = $movies['id'];
                        } 
                    }
                }
            }
        } else {

            header("Location: login.php");
            exit();
        } 
    ?>

    <div class="w3-bar">
        <a href="home.php" class="w3-bar-item w3-button w3-padding-16">Home</a>
        <a href="about.php" class="w3-bar-item w3-button w3-padding-16">About & Contact</a>
        <a href="movie-details.php" class="w3-bar-item w3-button w3-padding-16">Movies</a>
        <a href="select-movie.php" class="w3-bar-item w3-button w3-padding-16">Buy Ticket</a>

        <?php if (!isset($_SESSION['user_name'])): ?>
            <a href="register.php" class="w3-bar-item w3-button w3-padding-16 w3-right">Sign In</a>
            <a href="login.php" class="w3-bar-item w3-button w3-padding-16 w3-right">Login</a>
        <?php else: ?>
            <a href="profile.php" class="w3-bar-item w3-button w3-padding-16 w3-right"><?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
            <a href="logout.php" class="w3-bar-item w3-button w3-padding-16 w3-right">Logout</a>
        <?php endif; ?>
    </div>

    <!-- Film Tarihi ve Seans Seçimi -->
    <div class="w3-container w3-margin-top w3-center">
        <h2 style = "color:white">You are booking ticket for: <?php echo htmlspecialchars($selected_Movie); ?></h2>
        <h4 style = "color:white">Date Selection</h4>
        <form method="POST" action="">
        <!-- Tarih Seçimi -->
            <div class="w3-row w3-center" style="display: flex; justify-content: center; gap: 10px;">
                <input type="hidden" name="selected_movie_name" value="<?php echo htmlspecialchars($selected_Movie); ?>">
                <input type="hidden" name="movie_id" value="<?php echo $selected_MovieId; ?>">
                <div class="w3-col s2">
                    <button type="submit" name="selected_date" value="<?php echo $current_date?>" class="w3-button w3-block <?php echo ($selected_date == $current_date) ? 'button-color-clicked' : 'button-color'; ?>"><?php echo $current_date?><br><?php echo $current_day?></button>
                </div>
                <div class="w3-col s2">
                    <button type="submit" name="selected_date" value="<?php echo $tomorrow_date?>" class="w3-button w3-block <?php echo ($selected_date == $tomorrow_date) ? 'button-color-clicked' : 'button-color'; ?>"><?php echo $tomorrow_date?><br><?php echo $tomorrow_day?></button>
                </div>
                <div class="w3-col s2">
                    <button type="submit" name="selected_date" value="<?php echo $aftertomorrow_date?>" class="w3-button w3-block <?php echo ($selected_date == $aftertomorrow_date) ? 'button-color-clicked' : 'button-color'; ?>"><?php echo $aftertomorrow_date?><br><?php echo $aftertomorrow_day?></button>
                </div>
            </div>
        </form>

        <form method="POST" action="">
            <?php if (!empty($selected_date)): ?>
                <div class="w3-row w3-margin-top">
                    <h4 style = "color:white">Seance Selection (Date: <?php echo htmlspecialchars($selected_date); ?>)</h4>
                    <input type="hidden" name="selected_movie_name" value="<?php echo htmlspecialchars($selected_Movie); ?>">
                    <input type="hidden" name="movie_id" value="<?php echo $selected_MovieId; ?>">
                    <input type="hidden" name="selected_date" value="<?php echo htmlspecialchars($selected_date); ?>">
                    <button type="submit" name="selected_seans" value="13:45" class="w3-button <?php echo ($selected_seans == '13:45') ? 'button-color-clicked' : 'button-color'; ?>">13:45</button>
                    <button type="submit" name="selected_seans" value="15:30" class="w3-button <?php echo ($selected_seans == '15:30') ? 'button-color-clicked' : 'button-color'; ?>">15:30</button>
                    <button type="submit" name="selected_seans" value="18:15" class="w3-button <?php echo ($selected_seans == '18:15') ? 'button-color-clicked' : 'button-color'; ?>">18:15</button>
                    <button type="submit" name="selected_seans" value="21:00" class="w3-button <?php echo ($selected_seans == '21:00') ? 'button-color-clicked' : 'button-color'; ?>">21:00</button>
                </div>
            <?php endif; ?>
        </form>
    </div>

    <?php if ($selected_date && $selected_seans): ?>
        <div class="container">
            <div class="w3-container w3-light-orange w3-padding w3-margin-top">
                <h4 style="color:white"><strong>Selected Date and Seance</strong></h3>
                <p style="color:white"><strong>Date:</strong> <?php echo htmlspecialchars($selected_date); ?></p>
                <p style="color:white"><strong>Seance:</strong> <?php echo htmlspecialchars($selected_seans); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($selected_date && $selected_seans): ?>
        <div class="screen">
            <h2 style = "color:white">SCREEN</h2>
        </div>
        <form method="POST" action="confirm-ticket.php">

            <input type="hidden" name="selected_movie_name" value="<?php echo htmlspecialchars($selected_Movie); ?>">
            <input type="hidden" name="movie_id" value="<?php echo $selected_MovieId; ?>">
            <input type="hidden" name="selected_date" value="<?php echo htmlspecialchars($selected_date); ?>">
            <input type="hidden" name="selected_seans" value="<?php echo htmlspecialchars($selected_seans); ?>">
    
            <div class="seating-container">
                <?php

                    $seats = [
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                        [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                    ];

                    $sql = "SELECT * FROM tickets";

                    if($stmt = mysqli_prepare($link, $sql)) {

                        if (mysqli_stmt_execute($stmt)) {

                            $result = mysqli_stmt_get_result($stmt);

                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                                if ($row["ticket_movie_name"] === $selected_Movie && $row["ticket_date"] === $selected_date && $row["seance"] === $selected_seans) {

                                    $rows = count($seats);
                                    $cols = count($seats[0]);

                                    $elementNumber = $row["seat_number"] - 1;
                                    $seatRow = intdiv($elementNumber, $cols);
                                    $seatCol = $elementNumber % $cols;

                                    $seats[$seatRow][$seatCol] = 0;
                                }
                            }
                        } else {
                            echo "Something went wrong. Please try again later.";
                        }
                    }                    

                    foreach ($seats as $rowIndex => $row) {
                        echo "<div class='row'>";
                        foreach ($row as $seatIndex => $seat) {
                            if ($seat == 1) {
                                $seatId = $rowIndex * count($row) + $seatIndex + 1;
                                echo "
                                <label class='seat'>
                                    <input type='radio' name='seatId' value='$seatId' class='seat-input'>
                                    <span class='seat-box'></span>
                                </label>";
                            } else {
                            echo "<div class='seat disabled'></div>";
                            }
                        }
                    echo "</div>";
                    }
                ?>
            </div>
            <div class="center-button">
                <button style="background-color:#19b493" type="submit" class="w3-button w3-margin-top" id="submitButton" disabled>Book Ticket</button>
            </div>
        </form>

        <script>
            const seatInputs = document.querySelectorAll('.seat-input');
            const submitButton = document.getElementById('submitButton');

            seatInputs.forEach(input => { input.addEventListener('change', () => { submitButton.disabled = false; }); });
        </script>
    <?php endif; ?>

    <br>
</body>
</html>