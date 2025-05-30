<?php
    $conn = new mysqli("localhost", "root", "", "dane");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
        $tytul = $_POST["tytul"];
        $rok = $_POST["rok"];
        $gatunek = $_POST["gatunek"];
        $ocena = $_POST["ocena"];
        $sql = "INSERT INTO filmy (tytul, rok, gatunki_id, ocena) VALUES ('$tytul', $rok, $gatunek, $ocena);";  
        if ($conn->query($sql)) {
            echo "Film $tytul został dodany do bazy";
        } 
    }
    $conn->close();
?>