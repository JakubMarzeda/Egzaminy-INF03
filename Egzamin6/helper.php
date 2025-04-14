<?php
    // CONNECT TO DATABASE

    $conn = new mysqli("localhost", "root", "", "db_name");

    // SELECT

    $sql = "SELECT * FROM table_name";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo $row['name'];
    }

    // INSERT

    $name = $_POST['name'];
    $email = $_POST['email'];

    $result = $conn->query("INSERT INTO table_name (name, email) VALUES ('$name', '$email')");

    if($result){
        echo "Data inserted successfully";
    }


    // GET

    $id = $_GET['id'];

    
    // SET COOKIES

    $cookie_name = "user";
    $cookie_value = "John Doe";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
      } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }


    // CLOSE CONNECTION TO DATABSE

    $conn->close();
?>