<?php

if (isset($_POST["signup"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($password)) {
        echo "<script>alert('Please enter your password')</script>";
    } else {
        require_once "../database/dbcon.php";

        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO account (email, password) VALUES (:email, :password)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->execute();

            header("Location: ../login.php");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
