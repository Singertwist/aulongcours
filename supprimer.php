<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre</title>
    </head>

    <body>
	<?php 	$supprimer = $_GET['supprimer_news']; ?>
	<?php
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On ajoute une entrée dans la table jeux_video
    $bdd->query('SELECT id FROM billets');
    $bdd->exec('DELETE FROM billets WHERE id = '.$supprimer.'');
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

 <?php header('Location: liste_news.php');?>
    </body>
</html>
