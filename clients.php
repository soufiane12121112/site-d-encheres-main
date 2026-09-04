<?php
// Incluez le fichier de connexion à la base de données (connexion.php)
require_once('connexion.php');

// Récupérez l'ID du client à supprimer depuis l'URL
if (isset($_GET['id'])) {
    $id_client = $_GET['id'];

    // Valider et nettoyer l'ID (assurez-vous qu'il s'agit d'un entier)
    if (!is_numeric($id_client)) {
        die("ID client invalide");
    }

    // Exécutez la requête SQL pour supprimer le client de la base de données
    $query = "DELETE FROM client WHERE id_client = :id_client"; // Modifiez "id" en "id_client"
    $stmt = $access->prepare($query);
    $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // La suppression a réussi, redirigez l'utilisateur vers une page appropriée
        header('Location: clients.php'); // Remplacez 'clients.php' par la page de destination souhaitée
        exit();
    } else {
        echo 'Erreur lors de la suppression du client';
    }
} 
?>
<?php
session_start();


if (isset($_SESSION["user_type"])) {
    
    $userName = $_SESSION["user_name"]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sidebar Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<style>
    /* Ajoutez ces styles CSS à votre fichier styles.css ou à votre section de style dans le document HTML */
.table-container {
    margin: 0 auto; /* Centre horizontalement */
    max-width: 95%; /* Largeur maximale du conteneur */
    padding: 10px; /* Marge intérieure pour l'espacement */
    
}

table {
    width: 150%; /* Pour occuper la largeur du conteneur */
    border-collapse: collapse; /* Supprimer les espaces entre les cellules */
   
}

table, th, td {
    background-color: #fff;
    border: 2px solid #0074D9;
}

th, td {
    padding: 22px; /* Marge intérieure pour les cellules */
    text-align: center; /* Centre le texte dans les cellules */
}
/* Définissez la couleur rouge pour l'icône */
.icone-rouge {
    color: red;
}


</style>

<body>
<?php



// Récupérer l'ID du client à supprimer depuis l'URL
if (isset($_GET['id'])) {
    $id_client = $_GET['id'];
    
    // Valider et nettoyer l'ID (assurez-vous qu'il s'agit d'un entier)
    if (!is_numeric($id_client)) {
        die("ID client invalide");
    }
    
    // Exécuter la requête SQL pour supprimer le client
    $query = "DELETE FROM clients WHERE id_client = :id_client";
    $stmt = $access->prepare($query);
    $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // La suppression a réussi, rediriger l'utilisateur vers une page appropriée
        header('Location: clients.php'); // Remplacez 'clients.php' par la page de destination souhaitée
        exit();
    } else {
        echo 'Erreur lors de la suppression du client';
    }
} else {
    echo 'ID du client non spécifié';
}
?>

    <div class="sidebar">
     <div class="Dashboard">
       <div class="profile-image">
            <img src="./images/admin.jpg" alt="Photo de profil">
       </div>
           <h1><center>Admin page</h1>
     </div>
        <br>
    
        <ul class="menu">
         <h3>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="accueil.php">Home</a></li>
            <li><a href="clients.php">Customers</a></li>
            <li><a href="produits.php">products</a></li>
            <li><a href="bid.php">Orders</a></li>
            <li><a href="messages.php">Messages</a></li>
            <li><a href="logout.php">Logout</a></li>
         </h3>
        </ul>
    </div>



  <!-- ... Le code HTML précédent ... -->

<div class="content">
    <div class="table-container">
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                // Connexion à la base de données (assurez-vous que cette partie est correctement configurée)
                require_once('connexion.php');

                // Exécutez la requête SQL pour récupérer les clients
                $query = "SELECT * FROM client";
                $result = $access->query($query);

                // Vérifiez s'il y a des résultats
                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_client'] . "</td>";
                        echo "<td>" . $row['nom'] .'  '.' '. $row['prenom']."</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['passwrd'] . "</td>";
                        echo '<td><a href="clients.php?id=' . $row['id_client'] . '"><i class="fas fa-trash icone-rouge"></i></a></td>';


                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Aucun client trouvé.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ... Le reste du code HTML ... -->

</body>
</html>

<?php
} else {
    
    header("location: connexion.html");
    exit; 
}
?>