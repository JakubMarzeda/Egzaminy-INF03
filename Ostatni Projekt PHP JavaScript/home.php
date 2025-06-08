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
    <?php
    require_once "utils.php";
    if (isset($_COOKIE["email"])) {
        $email = $_COOKIE["email"];
        echo "<h1>Welcome $email</h1>";
    } else {
        header("Location: login.php");
    }

    if (isset($_POST["logout"])) {
        logout();
    }
    ?>
</body>

</html>