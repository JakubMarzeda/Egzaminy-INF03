<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="POST">
        <h1>Login</h1>
        <label for="email">E-mail: </label><input type="email" name="email"><br>
        <label for="password">Password: </label><input type="password" name="password"><br>
        <input type="submit" name="login" value="Login">
    </form>
    <?php
        $conn = new mysqli("localhost", "root", "", "users");
        require_once "utils.php";

        function samePasswords($conn, $email, $password) {
            $sql = "SELECT password FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            return password_verify($password, $row["password"]);
        }

        function saveLogToFile() {
            $logFile = fopen("logs.txt", "a");
            $date = date("Y-m-d H:i:s");
            $browser = $_SERVER["HTTP_USER_AGENT"];
            $ip = $_SERVER["HTTP_CLIENT_IP"] ?? $_SERVER["REMOTE_ADDR"];
            $logEntry = "User logged in at $date from IP: $ip using browser: $browser\n";
            fwrite($logFile, $logEntry);
            fclose($logFile);
        }

        $requiredFields = ["email", "password"];
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]) && validateEmptyValues($requiredFields)) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            if (checkIfUserExists($conn, $email) && samePasswords($conn, $email, $password)) {
                saveLogToFile();
                setcookie("email", "$email", time()+3600);
                echo "<script>alert('Logged successfully!');
                    window.location.href='home.php'</script>";
                $conn->close();
            } else {
                echo "<script>alert('This account does not exist!')</script>";
            }
        }
    ?>
</body>
</html>