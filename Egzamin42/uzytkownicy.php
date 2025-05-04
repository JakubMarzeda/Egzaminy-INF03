<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header class="left-header">
        <h2>Nasze osiedle</h2>
    </header>
    <header class="right-header">
        <?php
            $conn = new mysqli("localhost", "root", "", "portal");
            $sql = "SELECT COUNT(*) as uzytkownicy FROM dane;";
            $result = $conn->query($sql);
            while ($row=$result->fetch_assoc()) {
                echo "<h5>Liczba użytkowników portalu: $row[uzytkownicy]</h5>";
            }
        ?>
    </header>
    <section class="left-container">
        <h3>Logowanie</h3>
        <form action="uzytkownicy.php" method="post">
            <label for="login">login</label><br>
            <input type="text" name="login"><br>
            <label for="password">hasło</label><br>
            <input type="password" name="password"><br>
            <button type="submit">Zaloguj</button>
        </form>
    </section>
    <section class="right-container">
        <h3>Wizytówka</h3>
        <section class="card">
            <?php
                if (!empty($_POST["login"]) && !empty($_POST["password"])) {
                    $login = $_POST["login"];
                    $password = $_POST["password"];
                    $sql = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    if ($row) {
                        if (sha1($password) == $row["haslo"]) {
                            $sql = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy U INNER JOIN dane D ON U.id = D.id WHERE login = '$login';";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo "<img src='$row[zdjecie]' alt='osoba'/>";
                            $age = date("Y") - $row["rok_urodz"];
                            echo "<h4>$row[login] ($age)</h4>";
                            echo "<p>hobby: $row[hobby]</p>";
                            echo "<h1><img src='icon-on.png'/> $row[przyjaciol]</h1>";
                            echo "<a href='dane.html'><button>Więcej informacji</button></a>";
                        } else {
                            echo "hasło nieprawidłowe";
                        }
                    } else {
                        echo "login nie istnieje";
                    }
                }
                $conn->close();
            ?>
        </section>
    </section>
    <footer>
        <p>Stronę wykonał: 0000000</p>
    </footer>
</body>
</html>