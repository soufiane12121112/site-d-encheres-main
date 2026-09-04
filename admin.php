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
</head>
<body>
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
            <li><a href=".php">products</a></li>
            <li><a href="bid.php">Orders</a></li>
            <li><a href="messages.php">Messages</a></li>
            <li><a href="logout.php">Logout</a></li>
         </h3>
        </ul>
    </div>
    <div class="content">

    <div class="info-box">
    <h2><?php
        require_once "connexion.php";
        $sql = "SELECT * FROM `client`";
        $result = $access->query($sql);
        $nombre_de_ligne = $result->rowCount();
        echo "$nombre_de_ligne";
        ?></h2>
    <h3>Customers</h3>
</div>

<div class="info-box">
    <h2> <?php
        require_once "connexion.php";
        $sql = "SELECT * FROM `admin`";
        $result = $access->query($sql);
        $nombre_de_ligne = $result->rowCount();
        echo "$nombre_de_ligne";
        ?></h2>
    <h3>admin</h3>
</div>

<div class="info-box">
    <h2> <?php
        require_once "connexion.php";
        $sql = "SELECT * FROM `produits`";
        $result = $access->query($sql);
        $nombre_de_ligne = $result->rowCount();
        echo "$nombre_de_ligne";
        ?></h2>
    <h3>products</h3>
</div>
<div class="info-box">
    <h2> <?php
        require_once "connexion.php";
        $sql = "SELECT * FROM `commande`";
        $result = $access->query($sql);
        $nombre_de_ligne = $result->rowCount();
        echo "$nombre_de_ligne";
        ?></h2>
    <h3>Orders</h3>
</div>
<div class="info-box">
    <h2> <?php
        require_once "connexion.php";
        $sql = "SELECT * FROM `messages`";
        $result = $access->query($sql);
        $nombre_de_ligne = $result->rowCount();
        echo "$nombre_de_ligne";
        ?></h2>
    <h3>messages</h3>
</div>

</div>


      
    </div>
   
</body>
</html>
<?php
} else {
    
    header("location: connexion.html");
    exit; 
}
?>