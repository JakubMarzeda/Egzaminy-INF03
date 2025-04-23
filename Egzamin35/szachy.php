<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2><em>Koło szachowe gambit piona</em></h2>
    </header>
    <main>
        <section class="left-container">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.png">kwerenda1</a></li>
                <li><a href="kw2.png">kwerenda2</a></li>
                <li><a href="kw3.png">kwerenda3</a></li>
                <li><a href="kw4.png">kwerenda4</a></li>
            </ul>
            <img src="logo.png" alt="Logo koła">
        </section>
        <section class="right-container">
            <h3>Najlepsi gracze naszego koła</h3>
            <table>
                <tr>
                    <th>Pozycja</th>
                    <th>Pseudonim</th>
                    <th>Tytuł</th>
                    <th>Ranking</th>
                    <th>Klasa</th>
                </tr>
                <?php
                    $conn = new mysqli("localhost", "root", "", "szachy");
                    $sql = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;";
                    $result = $conn->query($sql);
                    $rowNumber = 1;
                    while($row=$result->fetch_assoc()) {
                        echo "<tr>
                            <td>$rowNumber</td>
                            <td>$row[pseudonim]</td>
                            <td>$row[tytul]</td>
                            <td>$row[ranking]</td>
                            <td>$row[klasa]</td>
                        </tr>";
                        $rowNumber += 1;
                    }
                ?>
            </table>
            <form action="szachy.php" method="post">
                <button type="submit" name="rand">Losuj nową parę graczy</button>
            </form>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["rand"])) {
                        $sql = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
                        $result = $conn->query($sql);
                        $resultString = "";
                        while($row=$result->fetch_assoc()) {
                            $resultString .= "$row[pseudonim] $row[klasa] ";
                        }
                        echo "<h4>$resultString</h4>";
                    }
                }
                $conn->close();
            ?>
            <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000</p>
    </footer>
</body>
</html>