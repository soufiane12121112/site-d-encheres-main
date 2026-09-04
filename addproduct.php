<?php
require("commande.php");
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet
" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuwlolflfl" crossorigin="
anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity=
"sha384-b5kHyXgcpbZJ0/tY9U17kGkf1S@CWuKcCD3818YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="images/icon.webp">
<title>AddProduct</title>
</head>
<body>

<div class="album py-5 bg-light">
<div class="container">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<form method="post">
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
<input type="text" class="form-control" name="image" required>
</div>
<div class="mb-3">
<label for="exampleInput Password1" class="form-label">Nom du produit</label>
<input type="text" class="form-control" name="nom" required>
</div>
<div class="mb-3">
<label for="exampleInput Password1" class="form-label">Price</label>
<input type="number" class="form-control" name="prix" required>
</div>
<div class="mb-3">
<label for="exampleInput Password1" class="form-label">decription</label>
<textarea class="form-control" name="desc" required></textarea>
</div> 
<button type="submit" name="valider" class="btn btn-primary">Insert New Product</button>
</form>
</div></div></div>
</body>
<?php
if(isset($_POST['valider']))
{
if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
{
    if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
    {
    
        $image = htmlspecialchars(strip_tags($_POST['image']));
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $prix = htmlspecialchars(strip_tags($_POST['prix']));
        $desc = htmlspecialchars(strip_tags($_POST['desc']));

        ajouter ($image, $nom, $prix, $desc);
    }
}
}
?>
<style>
   

input[type="text"],
input[type="number"],
input[type="email"],
textarea {
    width: 50%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px; 
}


button {
    center;
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px; /* Adjust the font size as needed */
}

button:hover {
    background-color: #555;
}


label {
    font-size: 16px; /* Adjust the font size as needed */
    font-weight: bold; /* Add bold font weight if desired */
}
.form {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
    margin: 0;
    text-align: center;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

</style>