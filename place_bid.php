<?php

require("connexion.php");

session_start();

if (isset($_POST['product_id']) && isset($_POST['bid_amount'])) {
    $product_id = $_POST['product_id'];
    $bid_amount = $_POST['bid_amount'];
    $clientID = $_SESSION['id_client'];


    $currentPriceSql = "SELECT prix FROM produits WHERE id_produit = :product_id";
    $currentPriceStmt = $access->prepare($currentPriceSql);
    $currentPriceStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $currentPriceStmt->execute();
    $currentPrice = $currentPriceStmt->fetchColumn();
    

    $new_price = $currentPrice + $bid_amount;

    if ($new_price <= $currentPrice) {
        header("Location: accueil.php");
        echo "<script>alert('The new price must be higher than the current price');</script>";
        exit;
    }
    
    $updateSql = "UPDATE produits SET prix = :new_price WHERE id_produit = :product_id";
    $updateStmt = $access->prepare($updateSql);
    $updateStmt->bindParam(':new_price', $new_price, PDO::PARAM_INT);
    $updateStmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $updateStmt->execute();

   
    
    header("Location: accueil.php");
    exit;
} else {
}
?>
