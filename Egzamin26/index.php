<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "mieszalnia");
    ?>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>
    <form action="index.php" method="post">
        <label for="receipt-date-from">Data odbioru od: </label><input type="date" name="receipt-date-from"
            id="receipt-date">
        <label for="receipt-date-to">do: </label><input type="date" name="receipt-date-to" id="receipt-date-to">
        <button type="submit" name="search">Wyszukaj</button>
    </form>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data odbioru</th>
            </tr>
            <?php
            if (isset($_POST["search"]) && !empty($_POST["receipt-date-from"]) && !empty($_POST["receipt-date-to"])) {
                $receiptDateFrom = $_POST["receipt-date-from"];
                $receiptDateTo = $_POST["receipt-date-to"];
                $sql = "SELECT Nazwisko, Imie, Z.id, kod_koloru, pojemnosc, data_odbioru FROM klienci K INNER JOIN zamowienia Z ON K.Id = Z.id_klienta WHERE data_odbioru >= '$receiptDateFrom' AND data_odbioru <= '$receiptDateTo' ORDER BY data_odbioru ASC;";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>$row[id]</td><td>$row[Nazwisko]</td><td>$row[Imie]</td><td style='background-color: #$row[kod_koloru]'>$row[kod_koloru]</td><td>$row[pojemnosc]</td><td>$row[data_odbioru]</td></tr>";
                }
            } else {
                $sql = "SELECT Nazwisko, Imie, Z.id, kod_koloru, pojemnosc, data_odbioru FROM klienci K INNER JOIN zamowienia Z ON K.Id = Z.id_klienta ORDER BY data_odbioru ASC;";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>$row[id]</td><td>$row[Nazwisko]</td><td>$row[Imie]</td><td style='background-color: #$row[kod_koloru]'>$row[kod_koloru]</td><td>$row[pojemnosc]</td><td>$row[data_odbioru]</td></tr>";
                }
            }
            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: 000000000</p>
    </footer>
    <?php
    $conn->close();
    ?>
</body>

</html>