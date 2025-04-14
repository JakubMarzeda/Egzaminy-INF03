<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "podroze");
    ?>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section class="left-container">
            <h2>Promocje</h2>
            <table>
                <tr>
                    <th>Warszawa</th>
                    <th>od 600 zł</th>
                </tr>
                <tr>
                    <th>Wenecja</th>
                    <th>od 1200 zł</th>
                </tr>
                <tr>
                    <th>Paryż</th>
                    <th>od 1200 zł</th>
                </tr>
            </table>
        </section>
        <section class="middle-container">
            <h2>W tym roku jedziemy do...</h2>
            <section class="imgs-container">
                <?php
                $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<img src='$row[nazwaPliku]' alt='$row[podpis]' title='$row[podpis]'></img>";
                }
                ?>
            </section>
        </section>
        <section class="right-container">
            <h2>Kontakt</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 444555666</p>
        </section>
    </main>
    <section class="data-container">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php
            $sql = "SELECT * FROM wycieczki WHERE dostepna = 0;";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<li>Dnia $row[dataWyjazdu] pojechaliśmy do $row[cel]</li>";
            }
            ?>
        </ol>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000 </p>
    </footer>
    <?php
    $conn->close();
    ?>
</body>

</html>