<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8" />
        <title>Panel admin - Modifier News</title>
        <link rel="stylesheet" media="screen" type="text/css" href="admin.css" />
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

    </head>

    <body>
		<?php include('logo.php'); ?>
		<?php include('menu.php'); ?>
		<div class="en_tete_une"><h4>Modifier une News!</h4></div>
		<div class="barre_menu"></div>
		
	
	
		<div class="image_colonne">
		<div class="center">
		<div class="liste_articles">
		<div class="colonne_gauche">
		
		<h4><u><br/>Modifier une news:</u></h4>
		<div class="dernieres_news">			
	
 	<?php 	$modifier = $_GET['modifier_news']; ?>
    <?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM billets WHERE id = '.$modifier.'');
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
		
		$titre = $donnees['titre'];
		$contenu= $donnees['contenu'];		
		
    }
    
    $reponse->closeCursor(); // Termine le traitement de la requête

}
catch(Exception $e)
{
    // En cas d'erreur précédemment, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}


?>
	
	<div class="rediger_news">
	
	<form method="post" action="<?php echo'suite_modifier.php?suite_modifier_news=' .$modifier.'';?>" name="rediger_news">
	<p>
	Titre: <br/><input type="text" size="50%" name="titre" value="<?php echo $titre; ?>"/><br/><br/>
	Contenu: <br/><textarea name="contenu" cols="" rows=""><?php echo $contenu; ?> </textarea><br/>
	<input type="submit" value="Envoyer"/>
	</p>
	</form>
	
	</div>
	
	</div>
	 
  
  	</div>
  	<?php include('colonne_droite_admin.php'); ?>
	</div>
	</div>
  
  
	<?php include('footer.php'); ?>
	

    
    </body>
</html>
