<?php
session_start();

$email = $_POST["email"];
$password = $_POST["motdepasse"];

$link = mysqli_connect("localhost", "root", "", "encheres");

$query_client = "SELECT * FROM client WHERE email='$email' AND passwrd='$password';";
$result_client = mysqli_query($link, $query_client);

if (mysqli_num_rows($result_client) > 0) {
    $user_info = mysqli_fetch_assoc($result_client);
    $_SESSION["user_type"] = "client";
    $_SESSION["user_name"] = $user_info["nom"]; 
    header("location: accueil.php");
} else {
    $query_admin = "SELECT * FROM admin WHERE email='$email' AND passwrd='$password';";
    $result_admin = mysqli_query($link, $query_admin);

    if (mysqli_num_rows($result_admin) > 0) {
        
        $_SESSION["user_type"] = "admin";
        $_SESSION["user_name"] = "Admin"; 
        header("location: admin.php");
    } else {
        echo '<script>alert("Authentication failed. Please check your email and password.");</script>';
        echo '<script>window.location.href = "connexion.html";</script>';
    }
}

mysqli_close($link);
?>
