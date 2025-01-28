<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="profileStyle.css">
    <link rel="stylesheet" href="barStyle.css">
</head>
<body>

    <?php require_once "config.php"?>

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

    <h1 style="color:white; margin-left: 20px">My Tickets</h1>

    <?php

        if (isset($_SESSION['id'])) {

            $sql = "SELECT * FROM tickets";

            $displayTickets = false;

            if($stmt = mysqli_prepare($link, $sql)) {

                if (mysqli_stmt_execute($stmt)) {
    
                    $result = mysqli_stmt_get_result($stmt);
                    $getrows = mysqli_query($link, $sql);

                    $rows = [];
                    while ($tickets = $getrows->fetch_assoc()) {
                        $rows[] = $tickets;
                    }

                    function displayNoTicket() {

                        echo '<div  style="margin: 20px; padding: 15px; background-color: #333; border-radius: 5px; color: white;">';
                        echo '<label><span style="color:red">You have no booked tickets.</span></label><br>';
                        echo '</div>';
                    }

                   if($getrows->num_rows > 0) {

                        foreach ($rows as $tickets) {
    
                            if ($_SESSION['user_name'] === $tickets["ticket_user_name"]) {
            
                                $displayTickets = true;
                            }
                        }
                    }
                    
                    if ($displayTickets === true) {

                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
                            if ($_SESSION['id'] == $row["ticket_user_id"]) {
        
                                $movie_name = $row["ticket_movie_name"];
                                $seat_number = $row["seat_number"];
                                $date = $row["ticket_date"];
                                $seance = $row["seance"];
                                $saloon = $row["saloon_number"];
                    
                                echo '<div  style="margin: 20px; padding: 15px; background-color: #333; border-radius: 5px; color: white;">';
                                echo '<label><span style="color:#19b493">Movie Name: </span>' . htmlspecialchars($movie_name) . '</label><br>';
                                echo '<label><span style="color:#19b493">Date: </span>' . htmlspecialchars($date) . '</label><br>';
                                echo '<label><span style="color:#19b493">Seance: </span>' . htmlspecialchars($seance) . '</label><br>';
                                echo '<label><span style="color:#19b493">Saloon: </span>' . htmlspecialchars($saloon) . '</label><br>';
                                echo '<label><span style="color:#19b493">Seat: </span>' . htmlspecialchars($seat_number) . '</label><br>';
                                echo '<form action="delete-ticket.php" method="POST" onsubmit="return confirmDelete();">';
                                echo '<input type="hidden" name="ticket_id" value="' . $row["id"] . '">';
                                echo '<button type="submit" class="submitButton">Cancel Ticket</button>';
                                echo '</form>';
                                echo '</div>';
                            }
                        }
                    } else {

                        displayNoTicket();
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
        } else {

            header("Location: home.php");
            exit();
        }
    ?>

    <script>
        function confirmDelete() {

            return confirm("Are you sure you want to cancel this ticket? This action cannot be undone.")
        }
    </script>
</body>
</html>