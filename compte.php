<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="rapidbidder.css">
    <script>
        function showError(message) {
            alert(message);
        }
    </script>
</head>
<body class="form">
<?php
session_start();
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$password = $_POST["motdepasse"];
$confirmation = $_POST["confirmation"];

if ($password != $confirmation) {
    header("location: CREATION.html");
    echo '<script>alert("Password and confirmation do not match");</script>';
} else {
    $link = mysqli_connect("localhost", "root", "", "encheres");

    // Requête préparée pour vérifier si l'email existe déjà
    $stmt = mysqli_prepare($link, "SELECT email FROM client WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $emailExists = mysqli_num_rows($result) > 0;

    if ($emailExists || (isset($_SESSION["a"]) && $_SESSION["a"] == 2)) {
        echo "This email is already associated with an account. ";
        echo '<a href="creation.html">Change your email or password</a>';
        echo '<script>showError("This email is already associated with an account.");</script>';
    } else {
        // Hachage du mot de passe avant stockage (jamais en clair)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Requête préparée pour l'insertion : évite les injections SQL
        $stmt_insert = mysqli_prepare($link, "INSERT INTO client (email, passwrd, nom, prenom) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt_insert, "ssss", $email, $hashedPassword, $nom, $prenom);
        mysqli_stmt_execute($stmt_insert);

        header("location: accueil.html");
    }

    mysqli_close($link);
}
?>
</body>
</html>
