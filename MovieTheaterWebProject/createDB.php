<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create DB</title>
</head>
<body>
    <?php

        $link = mysqli_connect("localhost", "root", "");

        if ($link === false) {

            die("Could not connect to server. " . mysqli_connect_error());
        }
 
        $sql = "CREATE DATABASE movietheater";
        if (mysqli_query($link, $sql)) {

            echo "movietheater Database has been created successfully. <br>";

        } else {

            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        mysqli_select_db($link, "movietheater");

        $sql = "CREATE TABLE users (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            user_name VARCHAR(100) NOT NULL,
            user_email VARCHAR(255) NOT NULL,
            user_password VARCHAR(255) NOT NULL
        );";
        
        if (mysqli_query($link, $sql)) {

            echo "users Table created successfully. <br>";
        } else {

            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        $sql = "CREATE TABLE movies (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            movie_name VARCHAR(100) NOT NULL,
            movie_genre VARCHAR(255) NOT NULL,
            movie_director VARCHAR(255) NOT NULL,
            movie_cast VARCHAR(255) NOT NULL,
            movie_duration VARCHAR(255) NOT NULL,
            movie_summary VARCHAR(1000) NOT NULL,
            movie_poster VARCHAR(1000) NOT NULL,
            movie_trailer VARCHAR(1000) NOT NULL,
            rating_imdb INT NOT NULL,
            rating_rottentomatoes INT NOT NULL,
            rating_metacritic INT NOT NULL,
            rating_letterboxd INT NOT NULL
        );";
        
        if (mysqli_query($link, $sql)) {

            echo "movies Table created successfully. <br>";
        } else {

            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        $sql1 = "INSERT INTO movies (movie_name, movie_genre, movie_director, movie_cast, movie_duration, movie_summary, movie_poster, movie_trailer, rating_imdb, rating_rottentomatoes, rating_metacritic, rating_letterboxd) VALUES 
        ('Dune Part-II', 'Science Fiction', 'Denis Villeneuve', 'Timothée Chalamet, Zendaya, Rebecca Ferguson', '2h 46m', 'Paul Atreides unites with the Fremen while on a warpath of revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the universe, he endeavors to prevent a terrible future.', 'https://image.tmdb.org/t/p/original/mFnF8tpPMqEwti2J2aMhYGZYdv0.jpg', 'https://www.youtube.com/watch?v=Way9Dexny3w', 85, 92, 79, 88),
        ('Black Swan', 'Drama, Thriller, Horror', 'Darren Aronofsky', 'Natalie Portman, Mila Kunis, Vincent Cassel', '1h 48m', 'The story of Nina, a ballerina in a New York City ballet company whose life, like all those in her profession, is completely consumed with dance. She lives with her retired ballerina mother Erica who zealously supports her daughter’s professional ambition. When artistic director Thomas Leroy decides to replace prima ballerina Beth MacIntyre for the opening production of their new season, Swan Lake, Nina is his first choice.', 'https://m.media-amazon.com/images/I/61z-zAxE0wL._AC_UF1000,1000_QL80_.jpg', 'https://www.youtube.com/watch?v=5jaI1XOB-bs', 80, 85, 79, 84),
        ('Blade Runner 2049', 'Science Fiction, Drama, Cyberpunk', 'Denis Villeneuve', 'Harrison Ford, Ryan Gosling, Ana de Armas', '2h 44m', 'Thirty years after the events of the first film, a new blade runner, LAPD Officer K, unearths a long-buried secret that has the potential to plunge what’s left of society into chaos. K’s discovery leads him on a quest to find Rick Deckard, a former LAPD blade runner who has been missing for 30 years.', 'https://m.media-amazon.com/images/M/MV5BNzA1Njg4NzYxOV5BMl5BanBnXkFtZTgwODk5NjU3MzI@._V1_.jpg', 'https://www.youtube.com/watch?v=gCcx85zbxz4', 80, 88, 81, 82),
        ('Star Wars: Episode III - Revenge of the Sith', 'Science Fiction, Adventure, Action', 'George Lucas', 'Hayden Christensen, Natalie Portman, Ewan McGregor', '2h 20m', 'The saga is complete. <br> The evil Darth Sidious enacts his final plan for unlimited power – and the heroic Jedi Anakin Skywalker must choose a side.', 'https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_FMjpg_UX1000_.jpg', 'https://www.youtube.com/watch?v=5UnjrG_N8hU', 76, 80, 80, 78),
        ('La La Land', 'Drama, Comedy, Music, Romance', 'Damien Chazelle', 'Ryan Gosling, Emma Stone, Rosemarie DeWitt', '2h 8m', 'Sebastian (Ryan Gosling) and Mia (Emma Stone) are drawn together by their common desire to do what they love. But as success mounts they are faced with decisions that begin to fray the fragile fabric of their love affair, and the dreams they worked so hard to maintain in each other threaten to rip them apart.', 'https://m.media-amazon.com/images/M/MV5BMzUzNDM2NzM2MV5BMl5BanBnXkFtZTgwNTM3NTg4OTE@._V1_.jpg', 'https://www.youtube.com/watch?v=0pdqf4P9MB8', 80, 91, 94, 82),
        ('Spider-Man: Across the Spider-Verse', 'Animation, Adventure, Science Fiction, Action', 'Joaquim Dos Santos, Kemp Powers, Justin K. Thompson', 'Shameik Moore, Hailee Steinfeld, Brian Tyree Henry', '2h 20m', 'After reuniting with Gwen Stacy, Brooklyn’s full-time, friendly neighborhood Spider-Man is catapulted across the Multiverse, where he encounters the Spider Society, a team of Spider-People charged with protecting the Multiverse’s very existence. But when the heroes clash on how to handle a new threat, Miles finds himself pitted against the other Spiders and must set out on his own to save those he loves most.', 'https://m.media-amazon.com/images/I/919p74MDUEL._AC_UF1000,1000_QL80_.jpg', 'https://www.youtube.com/watch?v=cqGjhVJWtEg', 86, 95, 86, 88),
        ('Pirates of the Caribbean: The Curse of the Black Pearl', 'Fantasy, Adventure, Action', 'Gore Verbinski', 'Johnny Depp, Keira Knightley, Orlando Bloom, Geoffrey Rush', '2h 23m', 'After Port Royal is attacked and pillaged by a mysterious pirate crew, capturing the governor’s daughter Elizabeth Swann in the process, William Turner asks free-willing pirate Jack Sparrow to help him locate the crew’s ship—The Black Pearl—so that he can rescue the woman he loves.', 'https://m.media-amazon.com/images/I/916kucr5MCS.jpg', 'https://www.youtube.com/watch?v=naQr0uTrH_s', 81, 79, 84, 78),
        ('The Batman', 'Crime, Mystery, Thriller', 'Matt Reeves', 'Robert Pattinson, Zoë Kravitz, Paul Dano, Colin Farrell', '2h 56m', 'In his second year of fighting crime, Batman uncovers corruption in Gotham City that connects to his own family while facing a serial killer known as the Riddler.', 'https://m.media-amazon.com/images/M/MV5BZDQyNDc3ZjEtNDI4MS00NGRjLWE2NGQtZmYwN2NjNzk0ZjI1XkEyXkFqcGc@._V1_.jpg', 'https://www.youtube.com/watch?v=NLOp_6uPccQ&t', 78, 85, 79, 80),
        ('Harry Potter and the Deathly Hallows: Part 1', 'Fantasy, Adventure', 'David Yates', 'Daniel Radcliffe, Emma Watson, Rupert Grint', '2h 26m', 'Harry, Ron and Hermione walk away from their last year at Hogwarts to find and destroy the remaining Horcruxes, putting an end to Voldemort’s bid for immortality. But with Harry’s beloved Dumbledore dead and Voldemort’s unscrupulous Death Eaters on the loose, the world is more dangerous than ever.', 'https://m.media-amazon.com/images/M/MV5BMTQ2OTE1Mjk0N15BMl5BanBnXkFtZTcwODE3MDAwNA@@._V1_.jpg', 'https://www.youtube.com/watch?v=Su1LOpjvdZ4', 77, 85, 76, 74),
        ('Oppenheimer', 'History, Drama', 'Christopher Nolan', 'Cillian Murphy, Emily Blunt, Robert Downey Jr., Matt Damon, Florence Pugh', '3h', 'A dramatization of the life story of J. Robert Oppenheimer, the physicist who had a large hand in the development of the atomic bombs that brought an end to World War II.', 'https://m.media-amazon.com/images/M/MV5BN2JkMDc5MGQtZjg3YS00NmFiLWIyZmQtZTJmNTM5MjVmYTQ4XkEyXkFqcGc@._V1_.jpg', 'https://www.youtube.com/watch?v=uYPbbksJxIg', 83, 93, 90, 84)";
        
        if (mysqli_query($link, $sql1)) {

            echo "All movie records are added successfully. <br>";
        } else {

            echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
        }           
        
        $sql = "CREATE TABLE tickets (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            ticket_user_id INT NOT NULL,
            ticket_user_name VARCHAR(100) NOT NULL,
            ticket_movie_name VARCHAR(100) NOT NULL,
            seat_number INT NOT NULL,
            saloon_number INT NOT NULL,
            ticket_date VARCHAR(100) NOT NULL,
            seance VARCHAR(100) NOT NULL
        );";
        
        if (mysqli_query($link, $sql)) {

            echo "tickets Table created successfully. <br>";
        } else {

            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        mysqli_close($link);
    ?>
</body>
</html>