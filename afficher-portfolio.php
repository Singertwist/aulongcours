 <?php
try
{
    // On se connecte à MySQL
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    
    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM portfolio WHERE album = \'Slovénie\'');
    
    
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>	
		<img src="timthumb.php?src=<?php echo $donnees['images']; ?>&h=200&w=640"/> 
		<div class="ariane"><p><a href="/blog/index.php">Accueil</a> -> <a href="afficher.php?afficher_news=<?php echo $afficher; ?>"><?php echo $donnees['titre']; ?></a></p></div>
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
