<?php
session_start();

if (isset($_SESSION["user_type"])) {
    $userName = $_SESSION["user_name"];
?>

<?php
// Include your database connection code
require("connexion.php"); // Make sure to use the correct path

// Fetch bid information from the database based on bid ID
$bidId = $_GET['bid_id']; // Assuming bid ID is passed via query parameter
$sql = "SELECT * FROM bids WHERE bid_id = :bidId";
$stmt = $access->prepare($sql);
$stmt->bindParam(':bidId', $bidId, PDO::PARAM_INT);
$result = $stmt->execute();

if ($result) {
    $bid = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $bid = array(); // No bid found
}

// Close the database connection
$access = null; // Unset the PDO object

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>View Bid</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<style>
    /* Add these CSS styles to your styles.css or in your HTML style section */

    .table-container {
        margin: 0 auto;
        max-width: 95%;
        padding: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        background-color: #fff;
        border: 2px solid #0074D9;
    }

    th, td {
        padding: 12px;
        text-align: center;
    }

    /* Define the red color for the icon */
    .icone-rouge {
        color: red;
    }
</style>

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
            <li><a href="produits.php">products</a></li>
            <li><a href="bid.php">Orders</a></li>
            <li><a href="messages.php">Messages</a></li>
            <li><a href="logout.php">Logout</a></li>
         </h3>
        </ul>
    </div>
<?php
// ... Your PHP code to check session ...

echo '<div class="content">';
echo '    <div class="table-container">';
echo '        <table>';
echo '            <thead>';
echo '                <tr>';
echo '                    <th>Bid ID</th>';
echo '                    <th>Client ID</th>';
echo '                    <th>Product ID</th>';
echo '                    <th>Current Price</th>';
echo '                    <th>New Price</th>';
echo '                </tr>';
echo '            </thead>';
echo '            <tbody>';
if (!empty($bid)) {
    echo '<tr>';
    echo '<td>' . $bid['bid_id'] . '</td>';
    echo '<td>' . $bid['client_id'] . '</td>';
    echo '<td>' . $bid['product_id'] . '</td>';
    echo '<td>' . $bid['current_price'] . '</td>';
    echo '<td>' . $bid['new_price'] . '</td>';
    echo '</tr>';
}
echo '            </tbody>';
echo '        </table>';
echo '    </div>';
echo '</div>';

// ... Rest of your PHP code ...

?>
</body>
</html>


<?php
} else {

    header("location: connexion.html");
    exit;
}
?>
