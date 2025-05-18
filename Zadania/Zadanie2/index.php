<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset(($_COOKIE["username"]))) {
        $username = $_GET["username"];
        echo "<h1>Witaj $username</h1>";
    } else {
        echo "<h1>Nie jesteś zalogowany</h1>";
        echo "<a href='login.php'>Zaloguj się</a>";
    }

    ?>
    <h3>Wybierz tryb</h3>
    <input type="radio" name="mode" value="black" onchange="changeBackroundColor(this.value)"><label
        for="black">Dark</label><br>
    <input type="radio" name="mode" value="white" onchange="changeBackroundColor(this.value)"><label
        for="white">Light</label>
    <script>
        changeBackroundColor = (color) => {
            if (color == "black") {
                document.body.style.backgroundColor = "#000000";
                document.body.style.color = "#FFFFFF";
            } else if (color == "white") {
                document.body.style.backgroundColor = "#FFFFFF";
                document.body.style.color = "#000000";
            }
        }
    </script>
</body>

</html>