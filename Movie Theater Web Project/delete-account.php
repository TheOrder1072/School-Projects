<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "config.php";
        
        if (isset($_SESSION['id'])) {

            $user_id = $_SESSION['id'];

            $sql = "DELETE FROM users WHERE id = $user_id";
            if ($stmt = mysqli_prepare($link, $sql)) {
    
                if (mysqli_stmt_execute($stmt)) {
                    header("location: logout.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        } else {

            header("Location: home.php");
            exit();
        }
    ?>  
</body>
</html>