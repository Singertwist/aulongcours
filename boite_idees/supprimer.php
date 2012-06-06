	<?php 	$supprimer = $_GET['supprimer_idee']; ?>
	<?php
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On ajoute une entrée dans la table jeux_video
    $bdd->query('SELECT id FROM boite_idees');
    $bdd->exec('DELETE FROM boite_idees WHERE id = '.$supprimer.'');
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

 <?php header('Location: ../admin.php');?>
