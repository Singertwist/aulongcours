<!DOCTYPE html>
<html>
    <head>
		<!--<link rel="stylesheet" media="screen" type="text/css" href="admin.css" />-->
		<link rel="stylesheet" media="screen" type="text/css" href="admin.css" />
		<meta charset="utf-8" />
        <title>Panel administration d'Au long cours</title>
		<script type="text/javascript" src="js/heure_date.js"></script>
		<script type="text/javascript" src="js/calendrier.js"></script>
    <body>
		<?php include('logo.php'); ?>
		<?php include('menu.php'); ?>
		<div class="en_tete_une"><h4>Bienvenue sur le panel administration d'Au long cours!</h4></div>
		<div class="barre_menu"></div>
	
	
	
		<div class="image_colonne">
		<div class="center">
		<div class="liste_articles">
		<div class="colonne_gauche">
		<img src="images-admin/image-accueil.png" alt="image admin">
		
		<h4><u><br/>Les dernières news publiées:</u></h4>
		<div class="dernieres_news">	
		
		<?php
	
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    $nbbilletspages = 3;
    // On récupère tout le contenu de la table jeux_video
    $req = $bdd->query('SELECT COUNT(id) AS nbbilellets FROM billets');
	$donnees = $req->fetch();
	$req->closeCursor();
	$nbpage = ceil($donnees['nbbilellets'] / $nbbilletspages);
	?>
		
		<?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    
    
	if (isset($_GET['page']))
    {
		$page = $_GET['page'];
	}
	else
	{
		$page = 1;
	}
	$premierBilletAafficher = ($page - 1) * $nbbilletspages;
    $reponse = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC LIMIT ' . $premierBilletAafficher . ', ' . $nbbilletspages);
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <div class="liste_news">
        <h5><u><?php echo $donnees['titre']; ?></u></h5> 
        
        <?php 
		$position_point = strpos(strip_tags($donnees['contenu']), ".", 50);
		$contenunews_raccourci = substr(strip_tags($donnees['contenu']), 0, $position_point+1);
		echo stripslashes($contenunews_raccourci); ?><?php echo '<a href="afficher.php?afficher_news=' . $donnees['id'] . '">'; ?> Lire la suite</a>
		
		
       <!--ici fonction-->
        
        <br/><span class="date_idees"><em><?php echo $donnees['date_creation'];?></em></span><br/></br>
        <div class="separation"></div>
       </div> 
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
	
	<div class="separation"></div>
	<!--Nombre de pages-->
	
		<div class="num_page">
	<?php
	echo 'Page: ';
	for ($i = 1 ; $i <= $nbpage ; $i++)
	{
    echo '<a href="admin.php?page=' . $i . '">' . $i . '</a> ';
	}
	?></div>
	
	
	
	
	
	
	<!--Début boite à idée-->
  	
	<div class="en_tete_boite_idees"><h4 id="boite-idees">La boîte à liens et idées:</h4></div>
	<div class="boite_idees">
	<p>
	<form method="post" name="boite_idees" action="boite_idees/boite_idees.php">
	<textarea name="contenu" placeholder="Boîte à idées!" rows="10" cols="50"></textarea><br/>
	<input type="submit" value="Envoyer"/><input type="reset" value="Supprimer"/>
	</form>
	</p>
	<?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM boite_idees ORDER BY date_creation DESC LIMIT 0, 10');
    ?>
    <div class="derniere_idees"><h3>Les dernières idées:</h3></div>
    <?php
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <div class="texte_idees"><p>
        <?php echo $donnees['contenu']; ?>  <span class="date_idees"><em><?php echo $donnees['date_creation'];?></em></span> <?php echo '<a href="boite_idees/supprimer.php?supprimer_idee=' . $donnees['id'] . '">'; ?>Supprimer </a>
        </p></div>
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
