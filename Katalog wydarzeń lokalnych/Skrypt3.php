<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Skrypt4.php" method="GET">
        <select name="category" id="">
            <?php
                $conn = new mysqli("localhost", "root", "", "wydarzenia");
                $sql = "SELECT id, nazwa FROM kategorie";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()) {
                    echo "<option value='$row[id]'>$row[nazwa]</option>";
                }
            ?>
        </select>
        <button>Filtruj</button>
    </form>
</body>
</html>