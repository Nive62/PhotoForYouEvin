<?php
include ("include/entete.inc.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Le design et les deux fichiers css viennent d'internet il servenr à avoir un beau formulaire-->
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/ajoutart.css">
<!--===============================================================================================-->
</head>


<!-- Formulaire d'inscription -->
  	<div class="Carte">
  				<form  method="post" action="ajoutphoto2.php"  id="form" enctype="multipart/form-data">

            <input type="file" onchange="actuPhoto(this)" id="photoUser" name="photoArticle" accept="image/jpeg, image/png, image/gif">

            <br><input class="rien" type="text" placeholder="Nom du produit"  name="nom_article" required>

          <input class="rien" type="text"  name="reference" placeholder="Référence" required>

          <input class="rien" type="number" name="prix_article" placeholder="Prix" required>

        <input class="rien" type="number"  name="quantite" placeholder="Quantité"  required><br>

        <br><h5>Catégorie : </h5>
        <div class="Categorie">
          <!-- Liste des catégorie récupéré dans une bdd -->
            <?php
                $query = "SELECT DISTINCT(Categorie) FROM evinp4y.categorie";
                $statement = $zxy->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach($result as $row)
                {
            ?>
            <div>
              <input class="categ" type="checkbox" id="<?php echo $row['Categorie']; ?>" name="categorie" value="<?php echo $row['Categorie']; ?>" required>
              <label for="coding"><?php echo $row['Categorie']; ?></label>
            </div>
            <?php
                }
            ?>
            <br>
        </div>
        <button class="btn3" type="submit" name="valider" class="btn btn-primary">Ajouter</button>
  				</form>
			</div>

<!------ Fonction verification  ---------->
<script>

function actuPhoto(element)
{
  var image=document.getElementById("photoUser");
  var fReader = new FileReader();
  fReader.readAsDataURL(image.files[0]);
  fReader.onloadend = function(event)
  {
    var img = document.getElementById("photoUser");
    img.src = event.target.result;
  }
}

(function() {
  "use strict"
  window.addEventListener("load", function() {
    var form = document.getElementById("form")
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add("was-validated")
    }, false)
  }, false)

}())
</script>