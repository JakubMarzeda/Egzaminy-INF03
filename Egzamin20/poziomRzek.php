<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "rzeki");
    ?>
    <section class="header-container">
        <header>
            <img src="obraz1.png" alt="Mapa Polski">
        </header>
        <header>
            <h1>Rzeki w województwie dolnośląskim</h1>
        </header>
    </section>

    <menu>
        <form action="poziomRzek.php" method="post">
            <input class="select-option-input" type="radio" name="wszystkie" id="" group="stan">
            <label for="wszystkie">Wszystkie</label>
            <input class="select-option-input" type="radio" name="ponad-stan-ostrzegawczy" id="" group="stan">
            <label for="ponad-stan-ostrzegawczy">Ponad stan ostrzegawczy</label>
            <input class="select-option-input" type="radio" name="ponad-stan-alarmowy" id="" group="stan">
            <label for="ponad-stan-alarmowy">Ponad stan alarmowy</label>
            <button type="submit">Pokaż</button>
        </form>
    </menu>
    <main>
        <section class="left-container">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <?php
                if (isset($_POST["wszystkie"])) {
                    $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy W INNER JOIN pomiary P ON W.id = P.wodowskazy_id WHERE dataPomiaru = '2022-05-05';";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo ("<tr>" . "<td>$row[nazwa]</td>" . "<td>$row[rzeka]</td>" . "<td>$row[stanOstrzegawczy]</td>" . "<td>$row[stanAlarmowy]</td>" . "<td>$row[stanWody]</td>" . "</tr>");
                    }
                }
                if (isset($_POST["ponad-stan-ostrzegawczy"])) {
                    $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy W INNER JOIN pomiary P ON W.id = P.wodowskazy_id WHERE dataPomiaru = '2022-05-05' AND stanWody > stanOstrzegawczy;";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo ("<tr>" . "<td>$row[nazwa]</td>" . "<td>$row[rzeka]</td>" . "<td>$row[stanOstrzegawczy]</td>" . "<td>$row[stanAlarmowy]</td>" . "<td>$row[stanWody]</td>" . "</tr>");
                    }
                }
                if (isset($_POST["ponad-stan-alarmowy"])) {
                    $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy W INNER JOIN pomiary P ON W.id = P.wodowskazy_id WHERE dataPomiaru = '2022-05-05' AND stanWody > stanAlarmowy;";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo ("<tr>" . "<td>$row[nazwa]</td >" . "<td>$row[rzeka]</td>" . "<td>$row[stanOstrzegawczy]</td>" . "<td>$row[stanAlarmowy]</td>" . "<td>$row[stanWody]</td>" . "</tr>");
                    }
                }
                ?>
            </table>
        </section>
        <section class="right-container">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>
            <h3>Średnie stany wód</h3>
            <?php
            $sql = "SELECT dataPomiaru, AVG(stanWody) AS srednia FROM pomiary GROUP BY dataPomiaru;";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "$row[dataPomiaru]: $row[srednia]" . "<br>";
            }
            ?>
            <a href="https://komunikaty.pl">Dowiedz się więcej</a>
            <img src="obraz2.jpg" alt="rzeka">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000</p>
    </footer>
    <?php
    $conn->close();
    ?>
</body>

</html>