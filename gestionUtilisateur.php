<?php
include "include/entete.inc.php";

if($_SESSION['type'] != 'admin'){
	header('location:index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="css/gestionUtilisateur.css" rel="stylesheet" />


</head>
<body>
	<div>
		<h1 class="Gestion">Gestion Utilisateur</h1>
    		<div>
				<table>
					<tr>
						<th>Id </th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Mail</th>
						<th>Type</th>
						<th>Etat</th>
						<br>
					</tr>
					<?php
    				    $req = $zxy->query("SELECT * FROM evinp4y.utilisateur");
    				    $data = $req->fetchAll();
    				    echo '';
    				    foreach ($data as $li){
    				        echo '<tr>
    				         	<th>'.$li['id_user'].'</th>
    				         	<td>'.$li['Nom'].'</td>
    				         	<td>'.$li['Prenom'].'</td>
    				         	<td>'.$li['Mail'].'</td>
    				         	<td>'.$li['Type'].'</td>';
								// Affiche un tableau des users et avec un bouton pour changer le grade accès uniquement au admin
						
							if($li['Type'] == 'client'){
								echo '<td><a href="gestion_pdo.php?id_user='.$li['id_user'].'&Type='.$li['Type'].'"><button>'.$li['Type'].' </td>';
							}
						
							if($li['Type'] == 'admin'){
								echo '<td><a href="gestion_pdo.php?id_user='.$li['id_user'].'&Type='.$li['Type'].'"><button>'.$li['Type'].' </td>';
							}
    				

							if($li['Type'] == 'photographe'){
								echo '<td><a href="gestion_pdo.php?id_user='.$li['id_user'].'&Type='.$li['Type'].'"><button>'.$li['Type'].' </td>';
							}
    				        echo '</tr/>';
    				    }
    				?>
				</table>
			</div>
	</div>
</body>