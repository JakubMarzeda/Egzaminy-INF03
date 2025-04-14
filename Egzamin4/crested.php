<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <section class="main-container">
        <section class="left-container">
            <menu>
                <a href="peruwianka.php">Rasa Peruwianka</a>
                <a href="american.php">Rasa American</a>
                <a href="crested.php">Rasa Crested</a>
            </menu>
            <main>
                <img src="crested.jpg" alt="Świnka morska rasy crested">
                <?php
                    $conn = new mysqli("localhost", "root", "", "hodowla");
                    $sql = "SELECT DISTINCT data_ur, miot, rasa FROM swinki S INNER JOIN rasy R ON S.rasy_id = R.id WHERE r.id = 7;";
                    $result = $conn->query($sql);
                    while ($row = $result -> fetch_assoc()) {
                        echo "<section>";
                        echo "<h2>" . $row["rasa"] . "</h2>";
                        echo "<p>" . "Data urodzenia: " . $row["data_ur"] . "</p>";
                        echo "<p>" . "Oznaczenie miotu: " . $row["miot"] . "</p>";
                        echo "</section>";
                    }
                    $conn->close();
                ?>
                <hr>
                <h2>Świnki w tym miocie</h2>
                <?php
                    $conn = new mysqli("localhost", "root", "", "hodowla");
                    $sql = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 7;";
                    $result = $conn->query($sql);
                    while ($row = $result -> fetch_assoc()) {
                        echo "<section>";
                        echo "<h3>" . $row["imie"] . "-" . $row["cena"] . "zł" . "</h3>";
                        echo "<p>" . $row["opis"] . "</p>";
                        echo "</section>";
                    }
                    $conn->close();
                ?>
            </main>
        </section>
        <section class="right-container">
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                <?php
                    $conn = new mysqli("localhost", "root", "", "hodowla");
                    $sql = "SELECT rasa FROM rasy;";
                    $result = $conn->query($sql);
                    while ($row = $result -> fetch_assoc()) {
                        echo "<li>" . $row["rasa"] . "</li>";
                    }
                    $conn->close()
                ?>
            </ol>
        </section>
    </section>
    <footer>
        <p>Stronę wykonał: 000000000</p>
    </footer>
</body>

</html>