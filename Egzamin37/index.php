<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
</head>

<body>
    <section class="content-container">
        <header>
            <img src="baner.jpg" alt="Polska">
        </header>
        <section class="top-left-container">
            <h4>Podaj początek nazwy miasta</h4>
            <form action="index.php" method="POST">
                <input type="text" name="beginning-of-the-city-name">
                <button name="search" type="submit">Szukaj</button>
            </form>
        </section>
        <section class="right-container">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra</h1>
            <?php
                $conn = new mysqli("localhost", "root", "", "wykaz");
                if(isset($_POST["search"])) {
                    $beginningOfTheCityName = $_POST["beginning-of-the-city-name"];
                    $sql = "SELECT M.nazwa as nazwaMiasta, W.nazwa as nazwaWojewodztwa FROM miasta M INNER JOIN wojewodztwa W ON M.id_wojewodztwa = W.id WHERE M.nazwa LIKE '$beginningOfTheCityName%' ORDER BY M.nazwa ASC;";
                    echo "<p>$beginningOfTheCityName</p>";
                    echo "<table>";
                    echo "<tr>
                        <th>Miasto</th>
                        <th>Województwo</th>
                    </tr>";
                    $result = $conn->query($sql);
                    while($row=$result->fetch_assoc()) {
                        echo "<tr>
                        <td>$row[nazwaMiasta]</td>
                        <td>$row[nazwaWojewodztwa]</td>
                    </tr>";
                    }
                    echo "</table>";
                }
                $conn->close();
            ?>
        </section>
        <section class="bottom-left-container">
            <p>Egzamin INF .03</p>
            <p>Autor: 0000000000</p>
        </section>
    </section>
</body>

</html>