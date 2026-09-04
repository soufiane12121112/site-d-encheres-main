<?php
require("commande.php");

session_start();

$product = null;
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product = getProductById($product_id);
}

function displayBidForm($product) {
    if ($product) {
        echo '<form action="place_bid.php" method="post">';
        echo '<div class="row">';
        echo '<div class="col-md-3">';
        echo '<img src="' . $product->image . '" alt="' . $product->nom . '" width="100%">';
        echo '</div>';
        echo '<div class="col-md-3">';
        echo '<h1>' . $product->nom . '</h1>';
        echo '<p>Price: ' . $product->prix . ' MAD</p>';
        echo '<label for="bid_amount">New Price:</label>';
        echo '<input type="number" id="bid_amount" name="bid_amount" required>';
        echo '<input type="hidden" name="product_id" value="' . $product->id_produit . '">';
        echo '<button type="submit">Place Bid</button>';
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '<p>' . $product->description . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
    } else {
        echo '<p>No product selected or product not found.</p>';
    }
}
if (isset($_SESSION["user_type"])) {
    $userName = $_SESSION["user_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="images/icon.webp">
    <title>Product Information</title>
</head>
<body>
<div class="bare">
        <header data-bs-theme="dark">
            <div class="collapse text-bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4>About</h4>
                            <p class="text-body-secondary">Welcome to RapidBidder - Your Ultimate Online Auction Destination!
                               Discover, Bid, Win. RapidBidder is your go-to online auction platform for exciting deals on a variety of items. Join our community of savvy bidders and sellers today!"</p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4>
                            <?php
                                  echo '<span class="nav-link">Welcome, ' . $userName . '!</span>';
                            ?>
                            </h4>
                            <ul class="list-unstyled">
                                
                                <li><a href="contactus.php" class="text-white">contact us</a></li>
                                <li>
                                <?php
                                  echo '<a class="text-white" href="logout.php">Logout</a>';

                                ?>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="accueil.php" class="navbar-brand d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                        <strong>RapidBidder</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    </div>
    </header>

    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $product->image ?>" alt="<?= $product->nom ?>" width="100%">
        </div>
        <div class="col-md-6">
            <h1><?= $product->nom ?></h1>
            <p><?= $product->description ?></p>
            <p>Price: <?= $product->prix ?> MAD</p>
            <form action="place_bid.php" method="post">
                <label for="bid_amount">Your Bid Amount:</label>
                <input type="number" id="bid_amount" name="bid_amount" required>
                <input type="hidden" name="product_id" value="<?= $product->id_produit ?>">
                <button type="submit">Add Bid</button>
            </form>
        </div>
    </div>
</div>
    
<?php
} else {
    
    header("location: connexion.html");
    exit; 
}
?>

<div class="container">
	<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
		<p class="footer-text m-0">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This web site created <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="file:///C:/xampp/htdocs/shop3/index.html" target="_blank">soufiane-EST</a>
        </p>
	</div>
    </div>
</body>
</html>
