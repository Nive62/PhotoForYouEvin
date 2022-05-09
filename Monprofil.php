<?php
include ("include/entete.inc.php");
require("commarticle.php");
if(!isset($_SESSION['login'])){
  header('location:index.php');
  exit();
}

  $User=utilisateur();
  $Produits=achat();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
  <link href="css/monprofil.css" rel="stylesheet" />
  </head>
  <body>
    <div class="Carte">
      <div class="texte">
        <!-- Affiche simplement la photo, le nom, prenom, email, le grade, et le nombre de credit de la session donc de l'utilisateur-->
        <?php 
          echo '<img src="'.htmlentities($_SESSION['photoUser']).'"><br>';
          echo '<p><strong>Nom : </strong>'.htmlentities($_SESSION['nomUtilisateur']).'</p><br>';
          echo '<p><strong>Prénom : </strong>'.htmlentities($_SESSION['prenomUtilisateur']).'</p><br>';
          echo '<p><strong>Mail : </strong>'.htmlentities($_SESSION['emailUtilisateur']).'</p><br>';
          echo '<p><strong>Grade : </strong>'.htmlentities($_SESSION['type']).'</p><br>';
          echo '<p><strong>Crédits : </strong>'.htmlentities($_SESSION['credit']).'</p>';
        ?>
      </div>
    </div>
    <br><h3 class="photo">Les Photos que vous possédez</h3><br>
    <?php foreach($Produits as $produit):?> 
      <div class="card">
        <img class="oui" src="images/article/<?= $produit->photoArticle ?>">
          <div class="container">
            <p>Nom Article : <?= $produit->nom_article ?></p>
          </div>
      </div>
    <?php endforeach; ?>
  </body>
</html>