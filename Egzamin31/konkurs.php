<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <main>
        <section class="left-container">
            <h3>Konkursowe nagrody</h3>
            <button onclick="location.reload()">Losuj nowe nagrody</button>
            <table>
                <tr>
                    <th>Nr</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Wartość</th>
                </tr>
                <?php
                    $conn = new mysqli("localhost", "root", "", "konkurs");
                    $sql = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;";
                    $result = $conn->query($sql);
                    $number = 1;
                    while($row=$result->fetch_assoc()) {
                        echo "<tr>
                                <td>$number</td>
                                <td>$row[nazwa]</td>
                                <td>$row[opis]</td>
                                <td>$row[cena]</td>
                            </tr>";
                        $number += 1;
                    }
                    $conn->close();
                ?>
            </table>
        </section>
        <section class="right-container">
            <img src="puchar.png" alt="Puchar dla wolontariusza">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.png">Kwerenda1</a></li>
                <li><a href="kw2.png">Kwerenda2</a></li>
                <li><a href="kw3.png">Kwerenda3</a></li>
                <li><a href="kw4.png">Kwerenda4</a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Numer zdającego: 00000000</p>
    </footer>
</body>
</html>