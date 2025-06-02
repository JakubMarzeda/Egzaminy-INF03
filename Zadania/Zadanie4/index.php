<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obsługa plików w php</title>
</head>
<body>
    <?php
        $filename = "log.txt";
        if(!file_exists($filename)) {
            file_put_contents($filename, "");
        }
        $entry = date("Y-m-d H-i-s") . " - odwiedzieny \n";
        file_put_contents($filename, $entry, FILE_APPEND);
        echo "<h2>Dziennik odwiedzin</h2>";
        echo "<pre>";
        echo file_get_contents($filename);
        echo "</pre>";

        $gatunkiFilmow = "gatunki.txt";
        if(!file_exists($gatunkiFilmow)) {
            file_put_contents($gatunkiFilmow, "");
        }
        $conn = new mysqli("localhost", "root", "", "dane");
        $sql = "SELECT id, nazwa FROM gatunki;";
        $result = $conn->query($sql);
        while($row=$result->fetch_assoc()) {
            file_put_contents($gatunkiFilmow, "$row[id]. $row[nazwa]\n", FILE_APPEND);
        }

        echo "<h2>Gatunki filmów</h2><pre>";
        echo file_get_contents($gatunkiFilmow);
        echo "</pre>";
        $conn->close();
    ?> 
</body>
</html>