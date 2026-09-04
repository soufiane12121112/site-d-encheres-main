<?php
require_once('connexion.php');

if (isset($_GET['id'])) {
    $id_produit = $_GET['id'];
    
    // Récupérer les détails du produit depuis la base de données en utilisant l'ID
    $query = "SELECT * FROM produits WHERE id_produit = :id_produit";
    $stmt = $access->prepare($query);
    $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo 'Produit non trouvé';
        exit();
    }
} else {
    echo 'ID du produit non spécifié';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_produit = $_POST['nom'];
    $prix_produit = $_POST['prix'];
    $description_produit = $_POST['description'];
    
    // Mettez à jour les informations du produit dans la base de données
    $query = "UPDATE produits SET nom = :nom_produit, prix = :prix_produit, description = :description_produit WHERE id_produit = :id_produit";
    $stmt = $access->prepare($query);
    $stmt->bindParam(':nom_produit', $nom_produit, PDO::PARAM_STR);
    $stmt->bindParam(':prix_produit', $prix_produit, PDO::PARAM_STR);
    $stmt->bindParam(':description_produit', $description_produit, PDO::PARAM_STR);
    $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirigez l'utilisateur vers la page de liste des produits après la modification
        header('Location: produits.php'); // Remplacez 'produits.php' par la page de destination souhaitée
        exit();
    } else {
        echo 'Erreur lors de la mise à jour du produit';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Modifier le produit</title>
</head>
<style>
    /* Styles pour centrer la page */
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    /* Style du titre */
    h2 {
        text-align: center;
    }

    /* Styles pour le formulaire */
    form {
        width: 80%;
        max-width: 600px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f5f5f5;
        text-align: left;
        margin-top: 20px;
    }

    /* Styles pour les étiquettes et les champs de formulaire */
    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
    }

    /* Style du bouton "Enregistrer les modifications" */
    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Style du bouton "Retourner" */
    .btn-retourner {
        background-color: #d9534f;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    .btn-retourner:hover {
        background-color: #c9302c;
    }
</style>
<body>
    <h2>Modifier le produit</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="nom">Nom du produit:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $produit['nom']; ?>" required>
        
        <label for="prix">Prix du produit:</label>
        <input type="text" id="prix" name="prix" value="<?php echo $produit['prix']; ?>" required>
        
        <label for="description">Description du produit:</label>
        <textarea id="description" name="description" required><?php echo $produit['description']; ?></textarea>
        
        <button type="submit">Enregistrer les modifications</button>
        <a class="btn-retourner" href="produits.php">Retourner</a>
    </form>
</body>
</html>
