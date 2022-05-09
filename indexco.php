<!-- Permet d'inclure l'entête dans le fichier sans le réécrire-->
<?php
include ("include/entete.inc.php");
if(!isset($_SESSION['login'])){
    header('location:index.php');
    exit();
}
if ((!isset($_SESSION['login'])) OR ($_SESSION['type'])=='visiteur') {
    header('location:index.php');
}
?> 

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>PhotoForYou</title>
		<meta charset="UTF-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">

      	<link href="css/index.css" rel="stylesheet" />
	</head>

	<body>

		<div class="contenant">
  			<img class="imageaccueil" src="images/carrousel/carrousel1.png" alt="Image d'accueil">
  			<div class="texte_centrer">Moins de temps à chercher. Plus de résultats. <br> Découvrez les images qui vous aideront à vous démarquer.</div>
			  <div class="texte_centrer">Moins de temps à chercher. Plus de résultats. <br> Découvrez les images qui vous aideront à vous démarquer.</div>
		</div>

		<div class="columns">
        <ul class="price">
            <li class="header">Essai</li>
            <li>0 € / mois</li>
            <li>5 photos offertes</li>
            <li>Usage privé</li>
            <li><a class="button">Souscrire</a></li>
        </ul>
    </div>

	<div class="columns">
        <ul class="price">
            <li class="header" style="background-color:#04AA6D">Formule Découverte</li>
            <li>9 € / mois</li>
            <li>20 crédits</li>
            <li>20 % de remise sur les photos</li>
            <li><a class="button">Souscrire</a></li>
        </ul>
    </div>

	<div class="columns">
        <ul class="price">
            <li class="header">Formule pro</li>
            <li>19 € / mois</li>
            <li>60 crédits</li>
            <li>30 % de remise sur les photos</li>
            <li><a class="button">Souscrire</a></li>
        </ul>
    </div>
	</body>
</html>