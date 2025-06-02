<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    <nav>
        <a href="kwerendy.txt">KWERENDA1</a>
        <a href="kwerendy.txt">KWERENDA2</a>
        <a href="kwerendy.txt">KWERENDA3</a>
        <a href="kwerendy.txt">KWERENDA4</a>
    </nav>
    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>
    <main>
        <h4>Wybierz rodzaj wypieków</h4>
        <form action="piekarnia.php" method="POST">
            <select name="rodzaj" id="">
                <?php
                    $conn = new mysqli("localhost", "root", "", "piekarnia");
                    $sql = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
                    $result = $conn->query($sql);
                    while($row=$result->fetch_assoc()) {
                        echo "<option value='$row[Rodzaj]'>$row[Rodzaj]</option>";
                    }
                ?>
            </select>
            <button name="select">Wybierz</button>
        </form>
        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["select"])) {
                    $rodzaj = $_POST["rodzaj"];
                    $sql = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$rodzaj';";
                    $result = $conn->query($sql);
                    while($row=$result->fetch_assoc()) {
                        echo "<tr>
                            <td>$row[Rodzaj]</td>
                            <td>$row[Nazwa]</td>
                            <td>$row[Gramatura]</td>
                            <td>$row[Cena]</td>
                        </tr>";
                    }
                }
                $conn->close();
            ?>
        </table>
    </main>
    <footer>
        <p>AUTOR: Jakub M</p>
        <p>Data: <?php echo date("Y-m-d H:i:s")?></p>
    </footer>
</body>
</html>