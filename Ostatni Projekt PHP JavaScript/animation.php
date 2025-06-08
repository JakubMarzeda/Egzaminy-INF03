<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <nav>
        <a href="animation.php">Animation in CSS</a>
        <a href="dl.php">Definition list in HTML</a>
        <a href="video.php">Video in HTML</a>
        <a href="action.php">Eventy in JS</a>
        <form method="POST" style="display:inline;">
            <button type="submit" name="logout">Log out</button>
        </form>
    </nav>
    <main>
        <img src="https://www.teraz-srodowisko.pl/images/illustrations/wiadomosc/15343_large.jpg" alt="krajobraz">
    </main>
    <?php
        require_once "utils.php";
        if (isset($_POST["logout"])) {
            logout();
        }
    ?>
</body>

</html>