<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        $conn = new mysqli("localhost", "root", "", "biblioteka");
    ?>
    <header>
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>
    <main>
        <section class="left-container">
            <h3>Polecamy dzieła autorów.</h3>
            <?php
                $sql = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko ASC;";
                $result = $conn->query($sql);
                echo "<ol>";
                while($row = $result->fetch_assoc()) {
                    echo "<li> $row[imie] $row[nazwisko]</li>";
                }
                echo "</ol>";
            ?>
        </section>
        <section class="middle-container">
            <h3>ul. Czytelnicza 25, Książkowice Wielkie</h3>
            <p><a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a></p>
            <img src="biblioteka.png" alt="książki">
        </section>
        <section class="right-container">
            <section class="top-right-container">
                <h3>Dodaj czytelnika</h3>
                <form action="biblioteka.php" method="post">
                    <label for="name">imię: </label><input type="text" name="name"><br>
                    <label for="lastname">nazwisko: </label><input type="text" name="lastname"><br>
                    <label for="symbol">symbol: </label><input type="number" name="symbol"><br>
                    <button type="submit">DODAJ</button>
                </form>
            </section>
            <section class="bottom-right-container">
                <?php
                    if (isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["symbol"])) {
                        $name = $_POST["name"];
                        $lastname = $_POST["lastname"];
                        $symbol = $_POST["symbol"];
    
                        $sql = "INSERT INTO czytelnicy (imie, nazwisko, kod) VALUES ('$name', '$lastname', '$symbol');";
    
                        if ($conn->query($sql)) {
                            echo "Czytelnik $name $lastname został(a) dodany do bazy danych";
                        }
                    }
                ?>
            </section>
        </section>
    </main>
    <footer>
        <p>Projekt strony: 00000000</p>
    </footer>
    <?php
        $conn->close();
    ?>
</body>

</html>