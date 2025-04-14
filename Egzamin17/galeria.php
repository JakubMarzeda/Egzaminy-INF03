<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
        $conn = new mysqli("localhost", "root", "", "galeria");
    ?>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <main>
        <section class="left-main-container">
            <h2>Tematy zdjęć</h2>
            <ol>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li>Miasta</li>
                <li>Przyroda</li>
                <li>Samochody</li>
                <a href=""></a>
            </ol>
        </section>
        <section class="middle-main-container">
            <?php
                $sql = "SELECT plik, tytul, polubienia, imie, nazwisko FROM zdjecia Z INNER JOIN autorzy A ON Z.autorzy_id = A.id ORDER BY nazwisko ASC;";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<section class='generate-img-block'>";
                    echo  "<img src='$row[plik]' alt='zdjecie'></img>";
                    if ($row["polubienia"] > 40) {
                        echo "<p>Autor: $row[imie] $row[nazwisko].<br>Wiele osób polubiło ten obraz</p>";
                    } else {
                        echo "<p>Autor: $row[imie] $row[nazwisko]</p>";
                    }

                    echo "<a href='$row[plik]' download='$row[plik]'>Pobierz</a>";
                    echo "</section>";
                }
            ?>
        </section>
        <section class="right-main-container">
            <h2>Najbardziej lubiane</h2>
            <?php
                $sql = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100;";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo "<img src='$row[plik]' alt='$row[tytul]'></img>";
                }
            ?>
            <strong>Zobacz wszystkie nasze zdjęcia</strong>
        </section>
    </main>
    <footer>
        <h5>Stronę wykonał: 000000</h5>
    </footer>
    <?php
        $conn->close();
    ?>
</body>
</html>