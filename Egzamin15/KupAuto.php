<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "kupauto");
    ?>
    <header>
        <h1>
            <em><strong>KupAuto! </strong></em>Internetowy Komis Samochodowy
        </h1>
    </header>
    <main class="first-main-container">
        <?php
        $sql = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10;";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo (
                "<img src=$row[zdjecie]></img><br>" .
                "<h4>Oferta dnia: Toyota $row[model]</h4><br>" .
                "<p>Rocznik: $row[rocznik], przebieg: $row[przebieg], rodzaj paliwa: $row[paliwo]</p><br>" .
                "<h4>Cena: $row[cena]</h4>"
            );
        }
        ?>
    </main>
    <main class="second-main-container">
        <h2>Oferty wyróżnione</h2>
        <section class="offers-container">
            <?php
            $sql = "SELECT nazwa, model, rocznik, cena, zdjecie FROM marki M INNER JOIN samochody S ON M.id = S.marki_id WHERE wyrozniony = TRUE LIMIT 4;";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo (
                    "<section>
                            <img src=$row[zdjecie] alt=$row[model]></img>
                            <h4>$row[model] $row[nazwa]</h4>
                            <p>Rocznik: $row[rocznik]</p>
                            <h4>Cena: $row[cena]</h4>
                        </section>"
                );
            }
            ?>
        </section>
    </main>
    <main class="third-main-container">
        <h2>Wybierz markę</h2>
        <form action="KupAuto.php" method="POST">
            <select name="cars" id="">
                <?php
                $sql = "SELECT nazwa FROM marki;";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo (
                        "<option value=$row[nazwa]>$row[nazwa]</option>"
                    );
                }
                ?>
            </select>
            <button type="submit">Wyszukaj</button>
        </form>

        <section class="offers-container">
            <?php
            if (isset($_POST["cars"])) {
                $nazwa = $_POST["cars"];
                $sql = "SELECT model, nazwa, cena, zdjecie FROM samochody S INNER JOIN marki M ON S.marki_id = M.id WHERE nazwa = '$nazwa;'";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo (
                        "<section>
                                <img src=$row[zdjecie] alt=$row[model]></img>
                                <h4>$row[model] $row[nazwa]</h4>
                                <h4>Cena: $row[cena]</h4>
                            </section>"
                    );
                }
            }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 000000000</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
    <?php
    $conn->close();
    ?>
</body>

</html>