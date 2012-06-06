<?php
session_start()
?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <title>Titre</title>
    </head>

    <body>
    <?php $afficher = $_GET['afficher_news']; ?>
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
        <p><?php echo $donnees['titre']; ?><?php echo $donnees['contenu']; ?></p><br/> <img src="<?php echo $donnees['images']; ?>"/>
  
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

