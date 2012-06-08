<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" title="Design" href="index.css" />
        <title>Au long cours</title>
        <?php include('favicon.php'); ?>
    </head>

    <body>
    <?php include('logo.php'); ?>
    <?php include('menu.php'); ?>
    <?php $afficher = $_GET['afficher_news']; ?>
    
    	<div class="image_colonne">
	<div class="center">
	<div class="barre_menu"></div>
	<div class="liste_articles">
		
	
	<div class="colonne_gauche">
    <?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM billets WHERE id = '.$afficher.'');
    
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>	
		<img src="timthumb.php?src=<?php echo $donnees['images']; ?>&h=200&w=640"/> 
        <h3><?php echo $donnees['titre']; ?>:</h3>
        <p><?php echo $donnees['contenu']; ?></p>
  
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
	<div class="colonne_droite">
	<h3>Catégories:</h3>
				<dl>
				<dt><a href="">Moncton, qu'est ce donc?</a></dt>
				</dl>
				<dl>
				<dt><a href="">Université de Moncton</a></dt>
				</dl>
				<dl>	
				<dt><a href="">Préparatifs</a></dt>
				</dl>
				<dl>	
				<dt><a href="">Sur place</a></dt>
				</dl>	
				<dl>
				<dt><a href="">A l'aventure!</a></dt>
				</dl>
	</div>
	
	
	
	</div>
	</div>
	</div>
	<?php include('footer.php'); ?>

</body>
</html
