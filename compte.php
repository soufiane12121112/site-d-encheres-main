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
    $query = "SELECT email, passwrd FROM client;";
    $sql = mysqli_query($link, $query);
    $emailExists = false;

    while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
        if ($email == $row["email"]) {
            $emailExists = true;
            break;
        }
    }

    if ($emailExists || $_SESSION["a"] == 2) {
        echo "This email is already associated with an account. ";
        echo '<a href="creation.html">Change your email or password</a>';
        echo '<script>showError("This email is already associated with an account.");</script>';
    } else {
        $quer = "INSERT INTO client (email, passwrd, nom, prenom) VALUES ('$email', '$password', '$nom', '$prenom');";
        mysqli_query($link, $quer);
        header("location: accueil.html");
    }

    mysqli_close($link);
}
?>
</body>
</html>
