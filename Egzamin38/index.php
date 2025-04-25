<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section class="left-container">
        <h1>Akta Pracownicze</h1>
        <?php
            $conn = new mysqli("localhost", "root", "", "firma");
            $sql = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id = 2;";
            echo "<h3>dane</h3>";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()) {
                echo "<p>$row[imie] $row[nazwisko]</p>";
                echo "<hr>";
                echo "<h3>adres</h3>";
                echo "<p>$row[adres]</p>";
                echo "<p>$row[miasto]</p>";
                echo "<hr>";
                echo "<p>RODO: " . ($row["czyRODO"] ? "podpisano" : "niepodpisano") . "</p>";
                echo "<p>Badania: " . ($row["czyBadania"] ? "aktualne" : "nieaktualne") . "</p>";
            }
        ?>
        <hr>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt">Pobierz</a>
        <h1>Liczba zatrudnionych pracowników</h1>
        <p>
            <?php
                $sql = "SELECT COUNT(*) as liczbaPracownikow FROM pracownicy;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()) {
                    echo "$row[liczbaPracownikow]";
                }
            ?>
        </p>
    </section>
    <section class="right-container">
        <?php
            $sql = "SELECT id, imie, nazwisko FROM pracownicy WHERE id = 2;";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()) {
                echo "<img src='$row[id].jpg' alt='pracownik'/>";
                echo "<h2>$row[imie] $row[nazwisko]</h2>";
            }
            $sql = "SELECT P.id, nazwa, opis FROM pracownicy P INNER JOIN stanowiska S ON P.stanowiska_id = S.id WHERE P.id = 2;";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()) {
                echo "<h4>$row[nazwa]</h4>";
                echo "<h5>$row[opis]</h5>";
            }
        ?>
    </section>
    <footer>
        Autorem aplikacji jest: 00000000
        <ul>
            <li>skontaktuj się</li>
            <li>poznaj naszą firmę</li>
        </ul>
    </footer>
</body>
</html>