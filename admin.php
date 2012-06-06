<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" media="screen" type="text/css" href="admin.css" />
		<meta charset="utf-8" />
        <title>Panel administration de la Mine d'Infos</title>
		<script type="text/javascript" src="js/heure_date.js"></script>
		<script type="text/javascript" src="js/calendrier.js"></script>
    <body>
		
	<div class="haut"><h3><a href="admin.php">Bienvenue sur le panel d'administration d'au long court!</a><div id="date_heure"></div></h3></div>
	<ul id="menu_horizontal">
		<li><a href="admin.php">Accueil</a></li>
		<li><a href="liste_news.php">Panel News</a></li>
		</ul>
	<!-- Début colonne de droite-->
	<div class="droite">
	<div class="en_tete_boite_idees"><h3>La boîte à liens et idées:</h3></div>
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
	<!--Fin colonne de droite-->
	<!--Début colonne gauche-->
	<div class="gauche">
	<div class="en_tete_calendrier"><h3>Calendrier:</h3></div>
	<div class="calendrier">
	<script type="text/javascript">
            calendrier();
        </script>
	
	</div>
	
	
	</div>
	<!--Fin colonne gauche-->
	
	<!-- Début colonne milieux-->
	<div class="centre">
		<div class="en_tête"><h3>Les dernières news publiées</h3></div>
		<div class="dernieres_news">	
		<?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
        // On affiche chaque entrée une à une
        
    while ($donnees = $reponse->fetch())
    {
    ?>
        
        <div class="couleur"><h3><?php echo $donnees['titre']; ?></h3> 
        
        <?php 
		$position_point = strpos(strip_tags($donnees['contenu']), ".", 50);
		$contenunews_raccourci = substr(strip_tags($donnees['contenu']), 0, $position_point+1);
		echo stripslashes($contenunews_raccourci); ?><?php echo '<a href="afficher.php?afficher_news=' . $donnees['id'] . '">'; ?> Lire la suite</a>
		
		
       <!--ici fonction-->
        
        <br/><span class="date_idees"><em><?php echo $donnees['date_creation'];?></em></span>
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


	?></div>
	
  
    
    </body>
</html>
