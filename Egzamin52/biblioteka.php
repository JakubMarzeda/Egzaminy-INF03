<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </header>
    <main>
        <section class="left-container">
            <h2>Dodaj czytelnika</h2>
            <form action="biblioteka.php" method="post">
                <label for="imie">imię:</label><input type="text" name="imie"><br>
                <label for="nazwisko">nazwisko:</label><input type="text" name="nazwisko"><br>
                <label for="rok-urodzenia">rok urodzenia:</label><input type="number" name="rok-urodzenia"><br>
                <input type="submit" name="dodaj" value="DODAJ">
            </form>
            <?php
                $conn = new mysqli("localhost", "root", "", "biblioteka");
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dodaj"])) {
                    $imie = $_POST["imie"];
                    $nazwisko = $_POST["nazwisko"];
                    $rok_urodzenia = $_POST["rok-urodzenia"];
                    $kod = substr($imie, 0, 2) . substr($rok_urodzenia, -2) . substr($nazwisko, 0, 2);
                    $sql = "INSERT INTO czytelnicy(imie, nazwisko, kod) VALUES ('$imie', '$nazwisko', '$kod');";
                    if ($conn->query($sql)) {
                        echo "Czytelnik: $nazwisko został dodany do bazy danych";
                    }
                }
            ?>
        </section>
        <section class="middle-container">
            <img src="biblioteka.png" alt="biblioteka">
            <h4>ul. Czytelnicza 25 <br>12-120  Książkowice <br>tel.: 123123123 <br>e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a></h4>

        </section>
        <section class="right-container">
            <h3>Nasi czytelnicy:</h3>
            <ul>
                <?php
                    $sql = "SELECT imie, nazwisko FROM czytelnicy;";
                    $result = $conn->query($sql);
                    while($row=$result->fetch_assoc()) {
                        echo "<li>$row[imie] $row[nazwisko]</li>";
                    }
                    $conn->close();
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>Projekt witryny: 00000000</p>
    </footer>
</body>
</html>