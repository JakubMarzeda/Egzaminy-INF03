<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="register.php" method="POST">
        <h1>Register</h1>
        <label for="username">Username: </label><input type="text" name="username"><br>
        <label for="email">E-mail: </label><input type="email" name="email"><br>
        <label for="password">Password: </label><input type="password" name="password"><br>
        <label for="confirm-password">Confirm password: </label><input type="password" name="confirm-password"><br>
        <input type="submit" name="register" value="Register">
    </form>
    <?php
        $conn = new mysqli("localhost", "root", "", "users");
        require_once "utils.php";

        $requiredFields = ["username", "email", "password", "confirm-password"];

        function checkSimilarityPassword($password1, $password2) {
            return $password1 === $password2;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"]) && validateEmptyValues($requiredFields)) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirm-password"];
            if (checkSimilarityPassword($password, $confirmPassword)) {
                if (checkIfUserExists($conn, $email)) {
                    echo "User with this email already exists!";
                    exit;
                }
                $hashedPassword = hashPassword($password);
                $createdAtAcount = date("Y-m-d");
                $sql = "INSERT INTO users (username, email, password, created_at) VALUES ('$username', '$email', '$hashedPassword', '$createdAtAcount')";
                $conn->query($sql);
                echo "<script>alert('Account created successfully!');
                    window.location.href='login.php'</script>";
                $conn->close();
            } else {
                echo "Passwords must be the same!";
            }
        } 
    ?>
</body>
</html>