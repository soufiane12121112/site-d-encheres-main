<?php
// Include your database connection code
require("connexion.php"); // Make sure to use the correct path

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert the message into the database
    $insertSql = "INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
    $insertStmt = $access->prepare($insertSql);
    $insertStmt->bindParam(':name', $name, PDO::PARAM_STR);
    $insertStmt->bindParam(':email', $email, PDO::PARAM_STR);
    $insertStmt->bindParam(':subject', $subject, PDO::PARAM_STR);
    $insertStmt->bindParam(':message', $message, PDO::PARAM_STR);
    $insertStmt->execute();

    if ($insertStmt->execute()) {
        // Message sent successfully, show a JavaScript alert
        echo '<script>alert("Message sent successfully!");</script>';
        echo '<script>window.location.href = "contactus.php";</script>';
        exit;
    } else {
        // Error handling in case of a database error
        echo '<script>alert("Error: Message could not be sent. Please try again.");</script>';
    }
    }

?>
