<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" title="Design" href="index.css" />
        <script type="text/javascript">var _siteRoot='index.html',_root='index.html';</script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
		<?php include('favicon.php'); ?>
	   
        <title>Au long cours</title>
    </head>

    <body>
		<?php include('logo.php'); ?>
		

		
		<?php include('menu.php'); ?>
		<div class="en_tete_une"><h4>A la Une:</h4></div>
		
		<div class="slider">
		  <div id="header"><div class="wrap">
			<div id="slide-holder">
			<div id="slide-runner">
    <a href=""><img id="slide-img-1" src="images/nature-photo.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-2" src="images/nature-photo1.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-3" src="images/nature-photo2.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-4" src="images/nature-photo3.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-5" src="images/nature-photo4.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-6" src="images/nature-photo4.png" class="slide" alt="" /></a>
	<a href=""><img id="slide-img-7" src="images/nature-photo6.png" class="slide" alt="" /></a> 
    <div id="slide-controls">
     <p id="slide-client" class="text"><strong>post: </strong><span></span></p>
     <p id="slide-desc" class="text"></p>
     <p id="slide-nav"></p>
    </div>
	</div>
	
	<!--content featured gallery here -->
   </div>
   <script type="text/javascript">
    if(!window.slider) var slider={};slider.data=[{"id":"slide-img-1","client":"nature beauty","desc":"nature beauty photography"},{"id":"slide-img-2","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-3","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-4","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-5","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-6","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-7","client":"nature beauty","desc":"add your description here"}];
   </script>
  </div></div><!--/header-->
	</div>	
	<div class="image_colonne">
	<div class="center">
	<div class="barre_menu"></div>
	<div class="liste_articles">
		
	
	<div class="colonne_gauche">
	<h3><u>Liste des articles:</u></h3>
	    <?php
	
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    $nbbilletspages = 2;
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
    
    // On récupère tout le contenu de la table jeux_video
    
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
        <h5><?php echo $donnees['titre']; ?>:</h5>
        <p><img src="<?php echo $donnees['images']; ?>"/>
        <?php 
		$position_point = strpos(strip_tags($donnees['contenu']), ".", 1000);
		$contenunews_raccourci = substr(strip_tags($donnees['contenu']), 0, $position_point+1);
		echo stripslashes($contenunews_raccourci); ?><?php echo '<a href="afficher.php?afficher_news=' . $donnees['id'] . '">'; ?>														Lire la suite...</a></p>
        
         
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

	<!--Nombre de pages-->	
	<div class="num_page"><?php
	echo 'Page: ';
	for ($i = 1 ; $i <= $nbpage ; $i++)
	{
    echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
	}
	?></div>


















 



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
</html>
