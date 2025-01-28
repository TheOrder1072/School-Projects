<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
        require_once "config.php";

        if (isset($_SESSION['id'])) {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $ticket_id = $_POST['ticket_id'];

                $sql = "DELETE FROM tickets WHERE id = $ticket_id";
                if ($stmt = mysqli_prepare($link, $sql)) {
        
                    if (mysqli_stmt_execute($stmt)) {
    
                        header("location: display-tickets.php");
                        exit();
                    } else {
                        echo "An error occured. Please try again later.";
                    }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($link);
            }
        } else {

            header("Location: home.php");
            exit();
        }
    ?>
</body>
</html>