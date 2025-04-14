<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <section class="first-header-block">
            <img src="logo1.png" alt="lipiec">
        </section>
        <section class="second-header-block">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania: 
                <?php
                    $conn = new mysqli("localhost", "root", "", "terminarz");
                    $sql = "SELECT DISTINCT wpis FROM zadania WHERE dataZadania BETWEEN '2020-07-01' AND '2020-07-07' AND wpis != ' ';";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo $row["wpis"] . ";";
                    }

                    $conn->close();
                ?>
            </p>
        </section>
    </header>
    <main>
        <?php

            $conn = new mysqli("localhost", "root", "", "terminarz");
            $sql = "SELECT dataZadania, wpis FROM zadania WHERE MONTH(dataZadania) = 7;";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo (
                    "<section class='calendar-block'> " .
                        "<h6>" . $row['dataZadania'] . "<h6>" .
                        "<p>" . $row['wpis'] . "</p>" .
                    "</section>"
                );
            }

            $conn->close();
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: 00000000</p>
    </footer>
</body>
</html>