<?php
require("connexion.php");
function ajouter($image, $nom, $prix, $desc) {
    global $access;
    try {
        $sql = "INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)";
        $req = $access->prepare($sql);
        $req->execute(array($image, $nom, $prix, $desc));
        $req->closeCursor();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function afficher() {
    global $access;

    try {
        $sql = "SELECT * FROM produits ORDER BY id_produit DESC";
        $req = $access->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return array();
    }
}

function supprimer($id) {
    global $access;
    try {
        $sql = "DELETE FROM produits WHERE id_produit = ?";
        $req = $access->prepare($sql);
        $req->execute(array($id));
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getProductById($productId) {
    global $access;
    try {
        $sql = "SELECT * FROM produits WHERE id_produit = :productId";
        $stmt = $access->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt->closeCursor();
        return $product;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}



?>
