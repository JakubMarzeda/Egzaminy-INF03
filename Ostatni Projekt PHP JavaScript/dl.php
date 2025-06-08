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
        <dl>
            <dt>HTML</dt>
            <dd>HyperText Markup Language, the standard markup language for documents designed to be displayed in a web browser.</dd>
            <dt>CSS</dt>
            <dd>Cascading Style Sheets, a style sheet language used for describing the presentation of a document written in HTML or XML.</dd>
            <dt>JavaScript</dt>
            <dd>A programming language that conforms to the ECMAScript specification, commonly used to create interactive effects within web browsers.</dd>
        </dl>
    </main>
    <?php
        require_once "utils.php";
        if (isset($_POST["logout"])) {
            logout();
        }
    ?>
</body>

</html>