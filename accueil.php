
<?php
    require("commande.php");
    $myproduits=afficher()
?>
<?php
session_start();


if (isset($_SESSION["user_type"])) {
    
    $userName = $_SESSION["user_name"]; 
?>
<?php

function calculateExpirationTime($remainingTimeMinutes) {
    return strtotime("+" . $remainingTimeMinutes . " minutes");
}

$expirationTimes = array();

foreach ($myproduits as $produit) {
    $expirationTimes[$produit->id_produit] = calculateExpirationTime(60);
}
?>
<?php
function calculateRemainingTime($endTime) {
    // Calculate the remaining time in minutes based on the end time
    $currentTime = time();
    $remainingTime = ($endTime - $currentTime) / 60; // Convert to minutes
    return max(0, round($remainingTime)); // Ensure the remaining time is not negative and round it
}
?>

<!-- Inside the loop that displays your products -->
<input type="hidden" name="remaining_time" value="<?= calculateRemainingTime($expirationTimes[$produit->id_produit]) ?>">




<!DOCTYPE html>
<html lang="en">
<head>
    <meta sharset="UTF-8"> 
     <meta http-equiv="X-UA-Compatible" content="IE-edge">
     <link rel="shortcut icon" href="images/icon.webp">
    <meta name="viewport" content="width-devise-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <title>RapidBidder</title>
      
</head>
<body>
<body>
<script>
    // Function to start the countdown timer for a product
    function startCountdown(productID, remainingTime) {
        const countdownElement = document.getElementById(`countdown-${productID}`);
        const endTimeKey = `end_time_${productID}`;

        // Retrieve the stored end time from localStorage
        const storedEndTime = localStorage.getItem(endTimeKey);
        let endTime;

        if (storedEndTime) {
            // If there's a stored end time, parse it
            endTime = parseInt(storedEndTime, 10);
        } else {
            // Calculate the end time and store it in localStorage
            endTime = new Date().getTime() + (remainingTime * 60 * 1000);
            localStorage.setItem(endTimeKey, endTime);
        }

        function updateCountdown() {
            const currentTime = new Date().getTime();
            const timeDifference = endTime - currentTime;

            if (timeDifference <= 0) {
                countdownElement.textContent = 'Time Expired';
                // You can redirect the last client to the payment page here

                // Clear the stored end time
                localStorage.removeItem(endTimeKey);
            } else {
                const hours = Math.floor(timeDifference / (1000 * 60 * 60));
                const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
                countdownElement.textContent = `Time Left: ${hours}h ${minutes}m ${seconds}s`;
            }
        }

        // Update the countdown every second
        const countdownInterval = setInterval(updateCountdown, 1000);

        // Initial call to set the countdown
        updateCountdown();
    }

    document.addEventListener("DOMContentLoaded", function () {
        <?php foreach ($myproduits as $produit): ?>
            startCountdown(<?= $produit->id_produit ?>, 60); // 60 minutes
        <?php endforeach; ?>
    });
</script>





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
                                if (isset($_SESSION["user_type"])) {
                                  echo '<span class="nav-link">Welcome, ' . $userName . '!</span>';
                            ?>
                            </h4>
                            <ul class="list-unstyled">
                                
                                <li><a href="contactus.php" class="text-white">contact us</a></li>
                                <li>
                                <?php
                                  echo '<a class="text-white" href="logout.php">Logout</a>';
                                }
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
                   
    <div class="RapidBidder py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

     <?php foreach ($myproduits as $produit): ?>
        <div class="col">
            <div class="card shadow-sm">
                <title><?= $produit->nom ?></title>
                <img src="<?= $produit->image ?>"  alt="<?= $produit->nom ?>" class="product-image">
                <div class="card-body">
                    <!-- Display the countdown timer for each product -->
                    <p id="countdown-<?= $produit->id_produit ?>"></p>
                    <p class="card-text"><?= substr($produit->description, 0, 200); ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <form action="information.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $produit->id_produit ?>">
                                <input type="hidden" name="remaining_time" value="60"> <!-- 60 minutes -->
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Bid now</button>
                            </form>
                        </div>
                        <small class="text-body-secondary"><?= $produit->prix ?>MAD</small>
                    </div>
                </div>
            </div>
        </div>
     <?php endforeach; ?> 
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

<style>
        
        .navbar {
            background-color: #343a40; 
        }

        .navbar-brand {
            color: white; 
        }

        .nav-link {
            color: white !important; 
        }

        .nav-link:hover {
            color: #ff5722 !important; 
        }

        .logout-button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: darkred;
        }
        .product-image {
            width: 300px;
            height: auto; 
        }

    </style>
