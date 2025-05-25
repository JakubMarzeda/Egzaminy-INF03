<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój wskaźnik BMI</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <section class="header-container">
        <header><h2>Oblicz wskaźnik BMI</h2></header>
        <section class="logo-container">
            <img src="wzor.png" alt="liczymy BMI">
        </section>
    </section>
    <section class="top-container">
        <section class="left-container">
            <img src="rys1.png" alt="zrzuć kalorie!">
        </section>
        <section class="right-container">
            <h1>Podaj dane</h1>
            <form action="waga.php" method="POST">
                <label for="waga">Waga</label><input type="number" name="waga"><br>
                <label for="wzrost">Wzrost [cm]</label><input type="number" name="wzrost"><br>
                <input type="submit" value="Licz BMI i zapisz wynik">
            </form>
            <?php
                $conn = new mysqli("localhost", "root", "", "egzamin");
                if (!empty($_POST["waga"]) && !empty($_POST["wzrost"])) {
                    $waga = $_POST["waga"];
                    $wzrost = $_POST["wzrost"];
                    $bmi = ($waga / ($wzrost * $wzrost)) * 10000;
                    $przedzialBMI = 0;
                    $obecnaData = date("Y-m-d");
                    echo "Twoja waga: $waga; Twój wzrost: $wzrost; <br>BMI wynosi: $bmi";
                    if ($bmi >= 0 && $bmi < 19) {
                        $przedzialBMI = 1;
                    } elseif ($bmi >= 19 && $bmi < 26) {
                        $przedzialBMI = 2;
                    } elseif ($bmi >= 26 && $bmi < 31) {
                        $przedzialBMI = 3;
                    } elseif ($bmi >= 31) {
                        $przedzialBMI = 4;
                    }
                    $sql = "INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ($przedzialBMI, '$obecnaData', $bmi);";
                    $conn->query($sql);
                }
            ?>
        </section>
    </section>
    <main>
        <table>
            <tr>
                <th>lp.</th>
                <th>Interpretacja</th>
                <th>zaczyna się od...</th>
            </tr>
            <?php
                $sql = "SELECT id, informacja, wart_min FROM bmi";
                $result = $conn->query($sql);
                while ($row=$result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td> $row[id]";
                    echo "<td> $row[informacja]";
                    echo "<td> $row[wart_min]";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>
    <footer>
        Autor: 000000000
        <a href="kw2.jpg">Wynik działania kwerendy 2</a>
    </footer>
</body>

</html>