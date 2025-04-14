<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych”</title>
    <link rel="stylesheet" href="styl.css">
</head>

<?php
    header("refresh: 10"); // odświeżanie co 10 sekund strony aby zobaczyć zmiany w bazie danych
?>

<body>
    <header>
        <section class="title-baner">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </section>
        <section class="img-baner">
            <img src="obraz1.png" alt="waga">
        </section>
    </header>
    <main>
        <section class="left-container">
                <section>
                <h2>Lokalizacje wag</h2>
                <ol>
                    <?php
                        $conn = new mysqli("localhost", "root", "", "wazenietirow");
                        
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM lokalizacje";
                        $result = $conn->query($sql);

                        while ($row = $result -> fetch_assoc()) {
                            echo "<li>" . "ulica " . $row["ulica"] . "</li>";
                        }

                        $conn->close();
                    ?>
                </ol>
            </section>
            <section>
                <h2>Kontakt</h2>
                <a href="mailto:wazenie@wroclaw.pl">napisz</a>
            </section>
        </section>
        <section class="mid-container">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php
                    $conn = new mysqli("localhost", "root", "", "wazenietirow");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT rejestracja, ulica, waga, dzien, czas FROM lokalizacje L INNER JOIN wagi W ON L.id = W.lokalizacje_id WHERE waga > 5;";
                    $result = $conn->query($sql);

                    while ($row = $result -> fetch_assoc()) {
                        echo "<tr><td>" . $row["rejestracja"] . "</td><td>" . $row["ulica"] . "</td><td>" . $row["waga"] . "</td><td>" . $row["dzien"] . "</td><td>" . $row["czas"] . "</td></tr>";
                    }
                ?>
            </table>
            <?php
                $conn = new mysqli("localhost", "root", "", "wazenietirow");

                if($conn -> connect_error) {
                    die("Connection failed: " . $conn -> connect_error);
                }

                $sql = "INSERT INTO wagi (lokalizacje_id, waga, rejestracja, dzien, czas) VALUES (5, FLOOR(RAND()*10+1), 'DW12345', CURRENT_DATE, CURRENT_TIME);";
                $conn -> query($sql);
                $conn -> close();
            ?>
        </section>
        <section class="right-container">
            <img src="obraz2.jpg" alt="tir" id="img-2">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000</p>
    </footer>
</body>
</html>