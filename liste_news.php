<!DOCTYPE html>
<html>
    <head>
		<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js" ></script >
		<script type="text/javascript">
		tinyMCE.init({
		language : "fr",
        mode : "textareas",
        theme : "advanced",
        plugins : "emotions,spellchecker,advhr,insertdatetime,preview",
        entity_encoding : "raw",  
        height : "480",
        
        // Theme options - button# indicated the row# only
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect",
        theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,|,code,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,sub,sup,|,charmap,emotions",      
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true
		});
		</script>
		<link rel="stylesheet" media="screen" type="text/css" href="admin.css" />
        <meta charset="utf-8" />
        <title>Panel admin - Liste News</title>

    </head>
	
    <body>
		
		<?php include('logo.php'); ?>
		<?php include('menu.php'); ?>
		<div class="en_tete_une"><h4>Rédiger une News!</h4></div>
		<div class="barre_menu"></div>
		
	
	
		<div class="image_colonne">
		<div class="center">
		<div class="liste_articles">
		<div class="colonne_gauche">
		
		<h4><u><br/>Rédiger une news:</u></h4>
		<div class="dernieres_news">
		
	
	
			<div class="rediger_news">
			<form method="post" action="ajouter.php" name="rediger_news" enctype="multipart/form-data" style=" color: #ffffff;">
			<p>Titre: <br/><input type="text" name="titre" size="50%"/><br/><br/>
			Image (JPEG, JPG, PNG, GIF): <br><input type="file" name="image" /><br/><br/>
			Contenu: <br/><textarea name="contenu" cols="" rows=""></textarea><br/>
	
			<input type="submit" value="Envoyer"/>
			</p>
			</form>
			<p>Prenez le temps de bien remplir tous les champs, sinon il vous sera impossible de poster une news.</p>
			</div>
			

	
	
		<div class="en_tete_news"><h4 id="modifier">Liste des News:</h4></div>
    <?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT id, titre, contenu, date_creation FROM billets ORDER BY date_creation DESC');
    ?>
    
        <table>
			
			<thead>
				
			<td>Modifier</td>
			<td>Supprimer</td>
			<td>Titre</td>
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
			<td><?php echo '<a href="modifier.php?modifier_news=' . $donnees['id'] . '">'; ?>Modifier</a></td>
			<td><?php echo '<a href="supprimer.php?supprimer_news=' . $donnees['id'] . '">'; ?>Supprimer</a></td>
			<td><?php echo $donnees['titre']; ?></td>
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
