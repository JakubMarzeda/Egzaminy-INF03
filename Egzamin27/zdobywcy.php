<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "zdobywcy");
    ?>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>
    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>
    <main>
        <section class="left-container">
            <img src="logo.png" alt="logo zdobywcy">
            <h3>razem z nami:</h3>
            <ul>
                <li>wyjazdy</li>
                <li>szkolenia</li>
                <li>rekreacja</li>
                <li>wypoczynek</li>
                <li>wyzwania</li>
            </ul>
        </section>
        <section class="right-container">
            <h2>Dołącz do naszego zespołu!</h2>
            <p>Wpisz swoje dane do formularza:</p>
            <form action="zdobywcy.php" method="post">
                <label for="lastname">Nazwisko: </label><input type="text" name="lastname" id="lastname">
                <label for="name">Imię: </label><input type="text" name="name" id="name">
                <label for="function">Funkcja: </label>
                <select name="function" id="function">
                    <option value="uczestnik">Uczestnik</option>
                    <option value="przewodnik">Przewodnik</option>
                    <option value="zaopatrzeniowiec">Zaopatrzeniowiec</option>
                    <option value="organizator">Organizator</option>
                    <option value="ratownik">Ratownik</option>
                </select>
                <label for="email">Email: </label><input type="email" name="email" id="email">
                <button type="submit" name="add-participiant">Dodaj</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["add-participiant"]) && !empty($_POST["lastname"]) && !empty($_POST["name"]) && !empty($_POST["function"]) && !empty($_POST["email"])) {
                    $sql = "INSERT INTO osoby (nazwisko, imie, funkcja, email) VALUES ('$_POST[lastname]', '$_POST[name]', '$_POST[function]', '$_POST[email]');";
                    $conn->query($sql);
                }
            } 
            ?>
            <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Funckja</th>
                    <th>Email</th>
                    <?php
                    $sql = "SELECT imie, nazwisko, imie, funkcja, email FROM osoby;";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>$row[nazwisko]</td><td>$row[imie]</td><td>$row[funkcja]</td><td>$row[email]</td></tr>";
                    }
                    ?>
                </tr>
            </table>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 0000000</p>
    </footer>
    <?php
    $conn->close();
    ?>
</body>

</html>