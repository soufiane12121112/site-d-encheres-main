<?php
session_start();

$email = $_POST["email"];
$password = $_POST["motdepasse"];

$link = mysqli_connect("localhost", "root", "", "encheres");

// Requête préparée : évite les injections SQL
$stmt = mysqli_prepare($link, "SELECT * FROM client WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result_client = mysqli_stmt_get_result($stmt);

if ($result_client && mysqli_num_rows($result_client) > 0) {
    $user_info = mysqli_fetch_assoc($result_client);

    // Vérifie le mot de passe haché au lieu d'une comparaison en clair
    if (password_verify($password, $user_info["passwrd"])) {
        $_SESSION["user_type"] = "client";
        $_SESSION["user_name"] = $user_info["nom"];
        header("location: accueil.php");
        exit;
    }
}

// Si aucun client ne correspond, on vérifie côté admin
$stmt_admin = mysqli_prepare($link, "SELECT * FROM admin WHERE email = ?");
mysqli_stmt_bind_param($stmt_admin, "s", $email);
mysqli_stmt_execute($stmt_admin);
$result_admin = mysqli_stmt_get_result($stmt_admin);

if ($result_admin && mysqli_num_rows($result_admin) > 0) {
    $admin_info = mysqli_fetch_assoc($result_admin);

    if (password_verify($password, $admin_info["passwrd"])) {
        $_SESSION["user_type"] = "admin";
        $_SESSION["user_name"] = "Admin";
        header("location: admin.php");
        exit;
    }
}

// Échec d'authentification (email inconnu ou mot de passe incorrect)
echo '<script>alert("Authentication failed. Please check your email and password.");</script>';
echo '<script>window.location.href = "connexion.html";</script>';

mysqli_close($link);
?>
