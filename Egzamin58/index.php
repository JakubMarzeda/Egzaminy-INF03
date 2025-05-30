<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odżywianie zwierząt</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h2>DRAPIEŻNIKI I INNE</h2>
    </header>
    <form action="" method="POST">
        <h3>Wybierz styl życia:</h3>
        <select name="rodzaj-odzywiania" id="">
            <option value="1">Drapieżniki</option>
            <option value="2">Roślinożerne</option>
            <option value="3">Padlinożerne</option>
            <option value="4">Wszystkożerne</option>
        </select>
        <button name="look" type="submit">Zobacz</button>
    </form>
    <main>
        <section class="left-container">
            <h3>Lista zwierząt</h3>
            <?php
                $conn = new mysqli("localhost", "root", "", "baza");
                $sql = "SELECT gatunek, rodzaj FROM zwierzeta Z JOIN odzywianie O ON Z.Odzywianie_id = O.id;";
                $result = $conn->query($sql);
                echo "<ul>";
                while($row=$result->fetch_assoc()) {
                    echo "<li>$row[gatunek] -> $row[rodzaj]</li>";
                }
                echo "</ul>";
            ?>
        </section>
        <section class="middle-container">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!empty($_POST["rodzaj-odzywiania"]) && isset($_POST["look"])) {
                        $rodzajeOdzywiania = [
                            "1" => "Drapieżniki",
                            "2" => "Roślinożerne",
                            "3" => "Padlinożerne",
                            "4" => "Wszystkożerne"
                        ];
                        $rodzajOdzywiania = $_POST["rodzaj-odzywiania"];
                        $sql = "SELECT id, gatunek, wystepowanie FROM zwierzeta WHERE Odzywianie_id = $rodzajOdzywiania;";
                        $result = $conn->query($sql);
                        echo "<h3>$rodzajeOdzywiania[$rodzajOdzywiania]</h3>";

                        while($row=$result->fetch_assoc()) {
                            echo "$row[id]. $row[gatunek], $row[wystepowanie]" . "<br>";
                        }
                    }
                }
                $conn->close();
            ?>
        </section>
        <section class="right-container">
            <img src="drapieznik.jpg" alt="Wilki">
        </section>
    </main>
    <footer>
        <a href="pl.wikipedia.org" target="_blank">Poczytaj o zwierzętach na Wikipedii</a>
        autor strony: 07231510678
    </footer>
</body>
</html>