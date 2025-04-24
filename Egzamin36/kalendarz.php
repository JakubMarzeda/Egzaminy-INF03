<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <section class="inscription">
        <?php
            $conn = new mysqli("localhost", "root", "", "kalendarz");
            $miesiac = date("m-d");
            $dni_tygodnia = array(
                'Monday'    => 'poniedziałek',
                'Tuesday'   => 'wtorek',
                'Wednesday' => 'środa',
                'Thursday'  => 'czwartek',
                'Friday'    => 'piątek',
                'Saturday'  => 'sobota',
               'Sunday'    => 'niedziela'
               );
               $dzien_ang = date('l');
               $sql = "SELECT imiona FROM imieniny WHERE data = '$miesiac';";
               $result = $conn->query(query: $sql);
               while($row = $result -> fetch_array()) {
                echo "<p>Dzisiaj jest ".$dni_tygodnia[$dzien_ang].", ".date("d.m.y").", imieniny: $row[0]</p>";
            }
        ?>
    </section>
    <main>
        <section class="left-container">
            <table>
                <tr>
                    <th>liczba dni</th>
                    <th>miesiąc</th>
                </tr>
                <tr>
                    <td rowspan="7">31</td>
                    <td>styczeń</td>
                </tr>
                <tr>
                    <td>marzec</td>
                </tr>
                <tr>
                    <td>maj</td>
                </tr>
                <tr>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>sierpień</td>
                </tr>
                <tr>
                    <td>październik</td>
                </tr>
                <tr>
                    <td>grudzień</td>
                </tr>
                <tr>
                    <td rowspan="4">30</td>
                    <td>kwiecień</td>
                </tr>
                <tr>
                    <td>czerwiec</td>
                </tr>
                <tr>
                    <td>wrzesień</td>
                </tr>
                <tr>
                    <td>listopad</td>
                </tr>
                <tr>
                    <td>28 lub 29</td>
                    <td>luty</td>
                </tr>
            </table>
        </section>
        <section class="middle-container">
            <h2>Sprawdź kto ma urodziny</h2>
            <form action="kalendarz.php" method="post">
                <input name="date" type="date" min="2024-01-01" max="2024-12-31" required>
                <input id="send" name="send" type="submit" value="Wyślij">
            </form>
            <?php
                if (isset($_POST["date"]) && $_SERVER["REQUEST_METHOD"]) {
                    $date = $_POST["date"];
                    $format = date("m-d", strtotime($_POST["date"]));
                    $sql = "SELECT imiona FROM imieniny WHERE data = '$format';";
                    $result = $conn->query($sql);
                    while($row=$result->fetch_assoc()) {
                        echo "Dnia $date są imieniny: $row[imiona]";
                    }
                }
                $conn->close();
            ?>
        </section>
        <section class="right-container">
            <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif" alt="Kalendarz majów"></a>
            <h2>Rodzaje kalendarzy</h2>
            <ol>
                <li>
                    słoneczny
                    <ul>
                        <li>kalendarz Majów</li>
                        <li>juliański</li>
                        <li>gregoriański</li>
                    </ul>
                </li>
                <li>
                    księżycowy
                    <ul>
                        <li>starogrecki</li>
                        <li>babiloński</li>
                    </ul>
                </li>
            </ol>
        </section>
    </main>
    <footer>Stronę opracował(a): 00000000</footer>
</body>
</html>