<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "kalendarz");
    ?>
    <section class="header-container">
        <header class="first-header">
            <h1>Organizer: SIERPIEŃ</h1>
        </header>
        <header class="second-header">
            <form action="organizer.php" method="post">
                <label for="save-event">Zapisz wydarzenie: </label>
                <input name="save-event" type="text">
                <button type="input">OK</button>
            </form>
            <?php
            if (isset($_POST["save-event"])) {
                $event = $_POST["save-event"];
                $sql = "UPDATE zadania SET wpis = '$event' WHERE dataZadania = '2020-08-09';";
                $conn->query($sql);
            }
            ?>
        </header>
        <header class="third-header">
            <img src="logo2.png" alt="sierpień">
        </header>
    </section>
    <main>
        <?php
            $sql = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'sierpien';";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo (
                    "<section class='calendar-block'>
                        <h5>$row[dataZadania]</h5>
                        <p>$row[wpis]</p>
                    </section>"
                );
            }
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: 000000000</p>
    </footer>
    <?php
    $conn->close();
    ?>
</body>

</html>