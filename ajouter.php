<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre</title>
    </head>

    <body>

    <?php 
			$_POST['titre'] AND 
			$_POST['contenu'] AND
    		$name = $_FILES['image']['name'] AND    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
			$type = $_FILES['image']['type'] AND    //Le type du fichier. Par exemple, cela peut être « image/png ».
			$size = $_FILES['image']['size'] AND    //La taille du fichier en octets.
			$tmp = $_FILES['image']['tmp_name'] AND//L'adresse vers le fichier uploadé dans le répertoire temporaire.
			$_FILES['image']['error']    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
			
	?>
	
	<?php
	
			if (isset($_POST['titre']) AND (isset($_POST['contenu'])) AND (isset($_FILES['image'])) AND $_FILES['image']['error']== 0)
			{	
				$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
				$name = pathinfo($name) ;
				$nomimage2 = uniqid('', false).'.'.$ext;
						
				move_uploaded_file($tmp, 'uploads/' . basename($nomimage2));
				$nomimage2 = 'uploads/'.$nomimage2;
				
				try
				{
					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
					$bdd = new PDO('mysql:host=localhost;dbname=aulongcours', 'root', '', $pdo_options);
    				$req = $bdd->prepare('INSERT INTO billets(titre, contenu, date_creation, images) VALUES(:titre, :contenu, NOW(), :images)');
					$req->execute(array(
											'titre'=> $_POST['titre'],
											'contenu'=> $_POST['contenu'],
											'images'=> $nomimage2,
										));
    
				}
					catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
			header('Location: liste_news.php');
			}
			else
			{
				echo "Vérifier votre titre, le contenu, ainsi que votre image";
				header('Location: liste_news.php');
			}
	?>

     
    </body>
</html>

	<?php/*if (isset($_POST['titre']) AND (isset($_POST['contenu'])) AND (isset($_FILES['image'])) AND $_FILES['image']['error']== 0)
			{	
				
				
				
				$tablo = pathinfo($_FILES['image']['name']) ;
				$ext = strtolower($tablo['extension']) ;
				$nomimage2 = uniqid('', false).'.'.$ext;
							
				move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . basename($_FILES['image']['name']));  /opt/lampp/htdocs/blog/site/Admin/*/?>
