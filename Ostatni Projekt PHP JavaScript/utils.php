<?php
    function validateEmptyValues($fields) {
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                return false;
            }
        }
        return true;
    }

    function checkIfUserExists($conn, $email) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row) {
            return true;
        }
        return false;
    }

    function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    function logout() {
        setcookie("email", "", time()-3600, "/");
        header("Location: login.php");
    }
?>