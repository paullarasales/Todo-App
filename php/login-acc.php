<?php
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];


    echo "trying terminal in pushing update";

    if (empty($password)) {
        echo "<script>alert('Please enter your password')</script>";
    } else {
        require_once "../database/dbcon.php";

        try {
            // Query to retrieve the stored password hash based on the email
            $query = "SELECT password FROM account WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $storedHash = $stmt->fetchColumn();

            if ($storedHash) {
                // Verify the user-provided password with the stored hash
                if (password_verify($password, $storedHash)) {
                    // Passwords match, the user-provided password is correct
                    // You can proceed with authentication or other actions here
                    session_start();
                    $_SESSION["email"] = $email; // Store user's email in the session
                    header("Location: ../dashboard.php"); // Redirect to dashboard
                    exit(); // Terminate script
                } else {
                    // Passwords do not match, the user-provided password is incorrect
                    echo "<script>alert('Incorrect password')</script>";
                }
            } else {
                // Email not found in the database
                echo "<script>alert('Email not registered')</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
