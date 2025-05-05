<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <section class="events-container">
    <h1>Events</h1>
    <?php
        $conn = new mysqli("localhost", "root", "", "wydarzenia");
        $category_id = $_GET["category"];
        $sql = "SELECT zdjecie, tytul, data, miejsce, opis, cena, nazwa FROM eventy E INNER JOIN kategorie K ON E.id_kategorii = K.id WHERE K.id = $category_id";
        $result = $conn->query($sql);
        while($row=$result->fetch_assoc()) {
            echo "<section class='event'>";
            echo "<img src='$row[zdjecie]'/>";
            echo "<p>$row[tytul] $row[nazwa]</p>";
            echo "<p>$row[cena]</p>";
            echo "</section>";
        }
    ?>
    </section>
</body>
</html>