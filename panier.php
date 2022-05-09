<?php
include ("include/entete.inc.php");
include("accesbase.php");
include ("include/panier.class.php");

if($_SESSION['login']!=TRUE)
{
	header("Location:connexion.php");
}

if($_SESSION['type'] == 'photographe'){
	header('location:indexco.php');
	exit();
}

$panier= new panier($zxy);

if(isset($_GET['del'])){
    $panier->del($_GET['del']);
}
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='css/cart.css' rel='stylesheet'>
    </head>
    <body>
        <table>
            <th>Produit</th>
            <th width="120">Nom</th>
            <th width="120">Prix</th>

            <tbody>
                <?php 
                    $poi=array_keys($_SESSION['panier']);
                    if(empty($poi)){
                        $ab = array();
                    }else {
                        $Req = $zxy -> prepare('SELECT * FROM evinp4y.article WHERE id_article IN ('.implode(',',$poi).')');
                        $Req -> execute();
                        $ab = $Req -> fetchAll(PDO::FETCH_OBJ);
                    }
                    foreach($ab as $product):
                ?>
                <tr>
                    <td>
                        <div ><img src="images/article/<?= $product->photoArticle ?>"></div>
                    </td>
                    <td>
                        <pre><?= $product->nom_article ?></pre>
                    </td>
                    <td>
                        <pre><?=$product->prix_article*$_SESSION['panier'][$product->id_article];?></pre>
                    </td>
                    <td><a href="panier.php?del=<?= $product->id_article ?>" class="Supp" data-abc="true">Supprimer</a> </td>
                </tr>
                <?php endforeach ;?>
            </tbody>
        </table>
        <aside>
            <div>
                <br><hr>
                <pre><strong>Prix Total : </strong><?=$panier->total();?> Crédits</pre>
                <hr><br>
                <a href="paiement.php?id=<?=$_SESSION['id_user'] ?>" class="btncommande" data-abc="true">Procéder à la commande</a> 
                <a href="boutique.php" class="btnboutique" data-abc="true">Revenir à la boutique</a>
                <a href="panier.php" class="btnstock" data-abc="true">Actualiser les stocks</a>
            </div>
        </aside>
    </body>
</html>