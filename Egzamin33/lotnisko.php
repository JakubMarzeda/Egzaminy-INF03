<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>

<body>
    <section class="header-container">
        <header class="first-header">
            <img src="zad5.png" alt="logo lotnisko">
        </header>
        <header class="second-header">
            <h1>Przyloty</h1>
        </header>
        <header class="third-header">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt" target="_blank" download="">Pobierz…</a>
        </header>
    </section>

    <main>
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
                $conn = new mysqli("localhost", "root", "", "egzamin");
                $sql = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
                $result = $conn->query($sql);
                while($row=$result->fetch_assoc()) {
                    echo "<tr>
                        <td>$row[czas]</td>
                        <td>$row[kierunek]</td>
                        <td>$row[nr_rejsu]</td>
                        <td>$row[status_lotu]</td>
                    </tr>";
                }
            ?>
        </table>
    </main>
    <section class="footer-container">
        <footer class="first-footer">

            <?php
                if(isset($_COOKIE["ciasteczko"])) {
                    echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
                } else {
                    setcookie("ciasteczko", 1, TIME() + 7200);
                    echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
                }
            ?>
        </footer>
        <footer class="second-footer">
            <p>Autor: 00000000</p>
        </footer>   
    </section>
</body>

</html>