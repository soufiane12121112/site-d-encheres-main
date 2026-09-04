<?php
// Incluez le fichier de connexion à la base de données (connexion.php)
require_once('connexion.php');


if (isset($_GET['id'])) {
    $id_produit = $_GET['id'];

    // Valider et nettoyer l'ID (assurez-vous qu'il s'agit d'un entier)
    if (!is_numeric($id_produit)) {
        die("ID produit invalide");
    }

    // Exécutez la requête SQL pour supprimer le produit de la base de données
    $query = "DELETE FROM produits WHERE id_produit = :id_produit"; // Modifiez "id" en "id_produit"
    $stmt = $access->prepare($query);
    $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // La suppression a réussi, redirigez l'utilisateur vers une page appropriée
        header('Location: produits.php'); // Remplacez 'produits.php' par la page de destination souhaitée
        exit();
    } else {
        echo 'Erreur lors de la suppression du prouit';
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
    max-width: 70%; /* Largeur maximale du conteneur */
    padding: 10px; /* Marge intérieure pour l'espacement */
}

table {
    width: 130%; /* Pour occuper la largeur du conteneur */
    border-collapse: collapse; /* Supprimer les espaces entre les cellules */
}

table, th, td {
    background-color: #fff;
    border: 2px solid #0074D9;
}

th, td {
    padding: 12px; /* Marge intérieure pour les cellules */
    text-align: center; /* Centre le texte dans les cellules */
}

/* Définissez la couleur rouge pour l'icône */
.icone-rouge {
    color: red;
}


.ajouter-produit-btn {
    position: fixed;
    bottom: 20px; 
    right: 20px; 
    text-decoration: none;
    background-color: #007bff; 
    color: #fff; 
    border-radius: 50%; 
    width: 50px; 
    height: 50px; 
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px; 
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5); 
    z-index: 999; 
}


.circle-button span {
    line-height: 1;
}


.ajouter-produit-btn:hover {
    background-color: #0056b3; 
}

</style>

<body>
<?php




if (isset($_GET['id'])) {
    $id_client = $_GET['id'];
    

    if (!is_numeric($id_produit)) {
        die("ID produit invalide");
    }
    

    $query = "DELETE FROM produits WHERE id_produit = :id_produit";
    $stmt = $access->prepare($query);
    $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);

    if ($stmt->execute()) {

        header('Location: produits.php');
        exit();
    } else {
        echo 'Erreur lors de la suppression du produit';
    }
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
                    <th>Id</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Descritption</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                // Connexion à la base de données (assurez-vous que cette partie est correctement configurée)
                require_once('connexion.php');

                // Exécutez la requête SQL pour récupérer les clients
                $query = "SELECT * FROM produits";
                $result = $access->query($query);

                // Vérifiez s'il y a des résultats
                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_produit'] . "</td>";
                        echo '<th scope="row"><img width="100" height="100" src="' . $row['image'] . '"></th>';

                        echo "<td>" . $row['nom'] . "</td>";
                        echo "<td>" . $row['prix'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        
                        // Icônes de suppression et d'édition dans la même cellule
                        echo '<td>';
                        echo '<a href="produits.php?id=' . $row['id_produit'] . '"><i class="fas fa-trash icone-rouge"></i></a>';
                       echo "&nbsp;";
                       echo "&nbsp;";
                       echo '<a href="edit_produit.php?id=' . $row['id_produit'] . '"><i class="fas fa-edit icone-verte"></i></a>';
                        echo '</td>';
                        
                        echo "</tr>";
                    }
                    
                } else {
                    echo "<tr><td colspan='5'>Aucun produit trouvé.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
     <!-- Bouton "Ajouter un produit" -->
     <a href="addproduct.php" class="ajouter-produit-btn">
        <div class="circle-button">
            <span>+</span>
        </div>
    </a>
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