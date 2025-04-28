<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h1>Pensjonat pod dobrym humorem</h1>
    </header>
    <main>
        <section class="left-container">
            <a href="index.html">GŁÓWNA</a>
            <img src="1.jpg" alt="pokoje">
        </section>
        <section class="middle-container">
            <a href="cennik.php">CENNIK</a>
            <table>
                <?php
                    $conn = new mysqli("localhost", "root", "", "wynajem");
                    $sql = "SELECT id, nazwa, cena FROM pokoje;";
                    $result = $conn->query($sql);
                    
                    while($row=$result->fetch_assoc()) {
                        echo "<tr>
                            <td>$row[id]</td>
                            <td>$row[nazwa]</td>
                            <td>$row[cena]</td>
                        </tr>";
                    }
                    $conn->close();
                ?>
            </table>
        </section>
        <section class="right-container">
            <a href="kalkulator.html">KALKULATOR</a>
            <img src="3.jpg" alt="pokoje">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 0000000</p>
    </footer>
</body>
</html>