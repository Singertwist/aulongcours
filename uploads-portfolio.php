<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" media="screen" type="text/css" href="admin.css" />
        <meta charset="utf-8" />
        <title>Panel admin - Liste News</title>

    </head>
	
    <body>
		
		<?php include('logo.php'); ?>
		<?php include('menu.php'); ?>
		<div class="en_tete_une"><h4>Uploader une photo dans le Portfolio!</h4></div>
		<div class="barre_menu"></div>
		
		<div class="image_colonne">
		<div class="center">
		<div class="liste_articles">
		<div class="colonne_gauche">
		
		<h4><u><br/>Uploader une photo dans le portfolio:</u></h4>
		<div class="dernieres_news">
		
	
	
			<div class="rediger_news">
			<form method="post" action="ajouter-portfolio.php" name="upload_portfolio" enctype="multipart/form-data" style=" color: #ffffff;">
			<p>
			Catégorie:  <select name="album">
								<option value=""></option>
								<option value="Canada">Canada</option>
								<option value="Slovénie">Slovénie</option>
						</select>	<br/><br/>
						
			Titre: <br/><input type="text" name="titre" size="50%"/><br/><br/>
			Image (JPEG, JPG, PNG, GIF): <br><input type="file" name="image" /><br/><br/>
			Description: <br/><textarea name="contenu" cols="" rows=""></textarea><br/>
	
			<input type="submit" value="Envoyer"/>
			</p>
			</form>
			<p>Prenez le temps de bien remplir tous les champs, sinon il vous sera impossible de poster une news.</p>
			</div>
			

	
	
		<div class="en_tete_news"><h4 id="modifier">Liste des albums:</h4></div>
    <?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM portfolio ORDER BY date_creation DESC');
    ?>
    
        <table>
			
			<thead>
				
			<td>Modifier</td>
			<td>Supprimer</td>
			<td>Titre</td>
			<td>Catégorie</td>
			<td>Date création</td>
			
			</tr>
			</thead>
		</table>	
    <?php
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>	 
		<table>
			<tr>
			<td><?php echo '<a href="modifier-image-portfolio.php?modifier-image-portfolio=' . $donnees['id'] . '">'; ?>Modifier</a></td>
			<td><?php echo '<a href="supprimer-image-portfolio.php?supprimer-image-portfolio=' . $donnees['id'] . '">'; ?>Supprimer</a></td>
			<td><?php echo $donnees['titre']; ?></td>
			<td><?php echo $donnees['album']; ?></td>
			<td><?php echo $donnees['date_creation']; ?></td>
			
			</tr>
        
        
        </table>
  
    <?php
    }
    
    $reponse->closeCursor(); // Termine le traitement de la requête

}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}


?>
	



	</div>
	
	</div>
	 
  
  	</div>
  	<?php include('colonne_droite_admin.php'); ?>
	</div>
	</div>
  
  
	<?php include('footer.php'); ?>
	
        
    </body>
</html>
