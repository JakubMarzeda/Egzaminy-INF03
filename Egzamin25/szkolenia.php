<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
    <?php
        $conn = new mysqli("localhost", "root", "", "firma");
    ?>
    <section class="page-container">
        <header>
            <img src="baner.jpg" alt="Szkolenia">
        </header>
        <section class="main-container">
            <nav>
                <ul>
                    <li><a href="index.html">Strona główna</a></li>
                    <li><a href="szkolenia.php">Szkolenia</a></li>
                </ul>
            </nav>
            <main>
                <?php
                    $sql = "SELECT Data, Temat FROM szkolenia ORDER BY Data ASC;";
                    $result = $conn->query($sql);
                    $file = fopen("harmonogram.txt", "w") or die("Unable to open file!");
                    while($row = $result->fetch_assoc()) {
                        fwrite($file, $row["Data"]." ".$row["Temat"]."\n");
                        echo "<p>$row[Data] $row[Temat]</p>";
                    }
                    fclose($file);
                ?>
            </main>
        </section>
        <footer>
            <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
            <p>Autor: 00000000</p>
        </footer>
    </section>
    <?php
        $conn->close();
    ?>
</body>
</html>