<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $name = $_GET["name"];
            $lastname = $_GET["lastname"];
            echo "$name $lastname";
        }
        setcookie("name", $name, expires_or_options: time() + 3600 * 30);

        
    ?>
</body>
</html>