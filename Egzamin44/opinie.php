<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    </header>
    <main>
        <h2>Opinie naszych klientów</h2>
        <?php
            $conn = new mysqli("localhost", "root", "", "hurtownia");
            $sql = "SELECT zdjecie, imie, opinia FROM klienci K INNER JOIN opinie O ON K.id = O.Klienci_id INNER JOIN typy T ON K.Typy_id = T.id WHERE T.id IN (2, 3);";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()) {
                echo "<section class='opinion'>";
                echo "<img src='$row[zdjecie]' alt='klient'/>";
                echo "<blockquote>$row[opinia]</blockquote>";
                echo "<h4>$row[imie]</h4>";
                echo "</section>";
            }
        ?>
    </main>
    <section class="footer-container">
        <footer>
            <h3>Współpracują z nami</h3>
            <a href=" http://sklep.pl/">Sklep 1</a>
        </footer>
        <footer>
            <h3>Nasi top klienci</h3>
            <ol>
                <?php
                    $sql = "SELECT imie, nazwisko, punkty FROM klienci ORDER BY punkty DESC LIMIT 3;";
                    $result = $conn->query($sql);
                    while($row=$result->fetch_assoc()) {
                        echo "<li>$row[imie] $row[nazwisko], $row[punkty] pkt</li>";
                    }
                    $conn->close()
                ?>
            </ol>
        </footer>
        <footer>
            <h3>Skontaktuj się</h3>
            <p>telefon: 111222333</p>
        </footer>
        <footer>
            <p>Autor: 00000000</p>
        </footer>
    </section>
</body>

</html>