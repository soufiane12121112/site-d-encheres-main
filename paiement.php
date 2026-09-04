<?php
session_start();


if (isset($_SESSION["user_type"])) {
    
    $userName = $_SESSION["user_name"]; 
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-devise-width,initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="images/icon.webp">
        <title>Page de paiement</title>
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
        <div class="co">
            <form action="">
                <div class="ro">
                    <div class="col">
                        <h3 class="ti">paiement </h3>
               
                       <div class="inputbox">
                           <div class="oh">
                            <span> cartes accéptées:</span>
                            <div class="ima">
                            <img src="images\capture3.png" alt=""></div>
                    </div> 
                   </div>
                        <div class="inputbox">
                            <span> nom sur la carte:</span>
                            <input type="text" placeholder="prenom-nom">
                        </div>
                        <div class="inputbox">
                            <span> numéro du carte:</span>
                            <input type="text" placeholder="1111-2222-3333-4444">
                            <div class="inputbox">
                                <span> exp mois</span>
                                <input type="text" placeholder="janvier">
                            </div>
                            <div class="ann">
                            <div class="inputbox">
                                <span> exp année:</span>
                                <input type="text" placeholder="2023">
                            </div>
                        </div>
                            <div class="fle">
                                <div class="inputbox">
                                    <span> CVV:</span>
                                    <input type="text" placeholder="123 456">
                                </div>
                            </div>
                            <input type="submit" value="passer à la caisse" class="submit-btn ">
                           </form>
        </div>
        <div class="container">
	<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
		<p class="footer-text m-0">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This web site created <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="file:///C:/xampp/htdocs/shop3/index.html" target="_blank">soufiane-EST</a>
        </p>
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

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form input[type="text"],
        .form input[type="email"],
        .form input[type="password"] {
            width: 50%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form input[type="submit"]:hover {
            background-color: #555;
        }

        .form h3 {
            margin-top: 10px;
        }

        .co {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .ro {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .col {
            margin-bottom: 20px;
        }

        .ti {
            margin-bottom: 20px;
        }

        .inputbox {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .inputbox span {
            margin-bottom: 5px;
        }

        .ima {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ima img {
            width: 200px; /* Adjust the size as needed */
            height: auto;
        }

        .ann {
            display: flex;
        }

        .ann .inputbox {
            flex: 1;
            margin-right: 10px;
        }

        .fle {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fle .inputbox {
            flex: 1;
            margin-right: 10px;
        }

        .submit-btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #555;
        }
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
    </style>