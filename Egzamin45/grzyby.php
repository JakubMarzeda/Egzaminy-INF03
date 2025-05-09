<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grzybobranie</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <section class="title-container">
            <h1>Czas na grzyby!</h1>
        </section>
        <section class="logo-container">
            <a href="podgrzybek.jpg"><img src="podgrzybek-miniatura.jpg" alt="Grzybobranie"></a>
        </section>
    </header>
    <main>
        <section class="left-container">
            <h3>Grzyby jadalne</h3>
            <?php
                $conn = new mysqli("localhost", "root", "", "grzybobranie");
                $sql = "SELECT id, nazwa, potoczna FROM grzyby WHERE jadalny = 1;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()){
                    echo "<p>$row[id]. $row[nazwa] ($row[potoczna])</p>";
                }
            ?>
            <h3>Polecamy do zup</h3>
            <ul>
                <?php
                    $sql = "SELECT potoczna, R.nazwa as rodzina FROM grzyby G INNER JOIN rodzina R ON G.rodzina_id = R.id INNER JOIN potrawy P ON G.potrawy_id = P.id WHERE P.nazwa = 'zupa';";
                    $result = $conn->query($sql);
                    while($row=$result->fetch_assoc()) {
                        echo "<li>$row[potoczna], rodzina: $row[rodzina]</li>";
                    }
                ?>
            </ul>
        </section>
        <section class="right-container">
            <?php
                $sql = "SELECT nazwa_pliku, nazwa FROM grzyby;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()) {
                    echo "<img src='$row[nazwa_pliku]' title='$row[nazwa]'/>";
                }
                $conn->close();
            ?>
        </section>
    </main>
    <footer>
        <p>Autor: 000000000</p>
    </footer>
</body>
</html>