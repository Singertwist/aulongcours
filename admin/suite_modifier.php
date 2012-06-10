<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre</title>
    </head>

    <body>
	<?php 	$suite_modifier = $_GET['suite_modifier_news']; ?>
	<?php $nv_titre = $_POST['titre'] AND $nv_contenu = $_POST['contenu']; ?>
	
		<?php
	try
	{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
	$req = $bdd->prepare('UPDATE billets SET titre = :titre, contenu = :contenu WHERE id = :id');
	
	$req->bindValue(':titre', $nv_titre);
	$req->bindValue(':contenu', $nv_contenu);
	$req->bindValue(':id', $suite_modifier);
	$req->execute();
    
	}
	catch(Exception $e)
	{
    die('Erreur : '.$e->getMessage());
	}
	?>
	

	
	<?php header('Location: liste_news.php');?>
    </body>
</html>
