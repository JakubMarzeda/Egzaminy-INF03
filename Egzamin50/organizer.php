<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <section class="header-container">
        <header class="left-header"><h2>MÓJ ORGANIZER</h2></header>
        <header class="middle-header">
            <form action="organizer.php" method="POST">
                <label for="wydarzenie">Wpis wydarzenia: </label>
                <input type="text" name="wydarzenie">
                <input type="submit" name="zapisz" value="ZAPISZ">
            </form>
            <?php
                $conn = new mysqli("localhost", "root", "", "egzamin6");
                if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["zapisz"] && $_POST["wydarzenie"]) {
                    $wydarzenie = $_POST["wydarzenie"];
                    $sql = "UPDATE zadania SET wpis = '$wydarzenie' WHERE dataZadania = '2020-08-27';";
                    $conn->query($sql);
                }
            ?>
        </header>
        <header class="right-header">
            <img src="logo2.png" alt="Mój organizer">
        </header>
    </section>
    <main>
        <?php
            $sql = "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien';";
            $result = $conn->query($sql);
            while($row=$result->fetch_assoc()) {
                echo "<section class='calendar-block'>";
                echo "<h6>$row[dataZadania], $row[miesiac]</h6>";
                echo "<p>$row[wpis]</p>";
                echo "</section>";
            }
        ?>
    </main>
    <footer>
        <?php
            $sql = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01';";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo "<h1>miesiąc: $row[miesiac], rok: $row[rok]</h1>";
            $conn->close();
        ?>
        <p>Stronę wykonał: 00000000</p>
    </footer>
</body>
</html>