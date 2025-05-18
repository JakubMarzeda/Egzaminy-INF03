<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="form-container">
        <h1>Login form</h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login" value="Login">
    </form>
    </section>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
            if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                if ($username == "admin" && $password == "admin") {
                    setcookie("username", $username, time() + 3600 * 30);
                    echo "Login successful!";
                    header("Location: index.php?username=$username");
                } else {
                    echo "Invalid username or password.";
                }
            }
        }
    ?>
</body>
</html>