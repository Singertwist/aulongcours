 <?php $_POST['contenu']; ?>

<?php
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On ajoute une entrée dans la table jeux_video
    $req = $bdd->prepare('INSERT INTO boite_idees(contenu, date_creation) VALUES(:contenu, NOW())');
    $req->execute(array(
	'contenu' => $_POST['contenu'],
	));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

<?php header('Location: ../admin.php'); ?>
