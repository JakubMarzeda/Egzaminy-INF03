<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $conn = new mysqli("localhost", "root", "", "wydarzenia");
        $sql = "SELECT zdjecie, tytul, data, miejsce, opis, cena FROM eventy ORDER BY data LIMIT 1;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo "<img src='$row[zdjecie]' alt='$row[tytul]'>";
        echo "<h4>Wydarzenie dnia: $row[tytul]</h4>";
        echo "<p>$row[data] $row[miejsce]</p>";
        echo "<p>$row[opis] $row[cena]</p>";
        $conn->close();
    ?>
</body>
</html>