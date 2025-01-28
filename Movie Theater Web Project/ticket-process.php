<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Process</title>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="barStyle.css">
    <link rel="stylesheet" href="homeStyle.css">
</head>
<body>
    <?php
        require_once "config.php";

        if (isset($_SESSION['id'])) {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (!empty($_POST['seatId'])) {
    
                    $user_id = $_SESSION['id'];
                    $user_name = $_SESSION['user_name'];
                    $selectedMovieId = $_POST['movie_id'];
                    $selectedMovieName = $_POST['selected_movie_name'];
                    $selectedDate = $_POST['selected_date'];
                    $selectedSeance = $_POST['selected_seans'];
                    $selectedSeat = $_POST['seatId']; 
    
                    if ($selectedMovieId !== null && $selectedDate !== "" && $selectedSeance !==  "" && $selectedSeat !== "") {
    
                        $sql = "INSERT INTO tickets (ticket_user_id, ticket_user_name, ticket_movie_name, seat_number, saloon_number, ticket_date, seance) VALUES ('$user_id', '$user_name', '$selectedMovieName', '$selectedSeat', '$selectedMovieId', '$selectedDate', '$selectedSeance')";
                  
                        if (mysqli_query($link, $sql)) {
              
                            header("Location: display-tickets.php");
                            exit();
                        }
                    }
                }
            }
    
            mysqli_close($link);
        } else {
            
            header("Location: login.php");
            exit();
        }
    ?>
</body>
</html>