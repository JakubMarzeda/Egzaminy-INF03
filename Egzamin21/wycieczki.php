<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <?php
        $conn = new mysqli("localhost", "root", "", "biuro");
    ?>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <section class="top-container">
        <h3>Wycieczki na które są wolne miejsca</h3>
        <ul>
            <?php
                $sql = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = TRUE;";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<li>$row[id]. dnia $row[dataWyjazdu] jedziemy do $row[cel], cena: $row[cena]</li>";
                }
            ?>
        </ul>
    </section>
    <main>
        <section class="left-main-container">
            <h2>Bestselery</h2>
            <table>
                <tr>
                    <td>Wenecja</td>
                    <td>Kwiecień</td>
                </tr>
                <tr>
                    <td>Londyn</td>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>Rzym</td>
                    <td>wrzesień</td>
                </tr>
            </table>
        </section>
        <section class="middle-main-container">
            <h2>Nasze zdjęcia</h2>
            <?php
                $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis DESC;";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<img src='$row[nazwaPliku]' alt='$row[podpis]'></img>";
                }
            ?>
        </section>
        <section class="right-main-container">
            <h2>Skontaktuj się</h2>
            <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
            <p>telefon: 111222333</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 0000000</p>
    </footer>
    <?php
        $conn->close();
    ?>
</body>

</html>