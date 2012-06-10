<?php

session_name("fancyform");
session_start();


$_SESSION['n1'] = rand(1,20);
$_SESSION['n2'] = rand(1,20);
$_SESSION['expect'] = $_SESSION['n1']+$_SESSION['n2'];


$str='';
if($_SESSION['errStr'])
{
	$str='<div class="error">'.$_SESSION['errStr'].'</div>';
	unset($_SESSION['errStr']);
}

$success='';
if($_SESSION['sent'])
{
	$success='<h1>Thank you!</h1>';
	
	$css='<style type="text/css">#contact-form{display:none;}</style>';
	
	unset($_SESSION['sent']);
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" media="screen" type="text/css" title="Design" href="index.css" />
        <link rel="stylesheet" type="text/css" href="jqtransformplugin/jqtransform.css" />
		<link rel="stylesheet" type="text/css" href="formValidator/validationEngine.jquery.css" />
        <script type="text/javascript">var _siteRoot='index.html',_root='index.html';</script>
		<?php include('../favicon.php'); ?>
	   <?=$css?>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js"></script>
		<script type="text/javascript" src="formValidator/jquery.validationEngine.js"></script>

		<script type="text/javascript" src="script.js"></script>
        <title>Au long cours</title>
    </head>

    <body>
		<?php include('../logo.php'); ?>
		

		
		<?php include('../menu.php'); ?>
		<div class="en_tete_une"><h4>Contact:</h4></div>
		
		
		<div class="image_colonne">
		<div class="center">
		<div class="colonne_gauche">
		<div class="image_contact"><img src="img/7163634533_aa18afe093_h.jpg" alt="photo contact"></div>
		<div class="liste_articles">
			
		
		<div id="main-container">

	<div id="form-container">
    <!--<h1>Au long cours</h1>
    <h2>Contactez moi! </h2>-->
    
    <form id="contact-form" name="contact-form" method="post" action="submit.php">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="15%"><label for="name">Nom et Prénom</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="name" id="name" value="<?=$_SESSION['post']['name']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="email">Adresse Email</label></td>
          <td><input type="text" class="validate[required,custom[email]]" name="email" id="email" value="<?=$_SESSION['post']['email']?>" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="subject">Objet</label></td>
          <td><select name="subject" id="subject">
            <option value="" selected="selected"> - Choisir -</option>
            <option value="Question">Questions</option>
            <option value="Business proposal">Faire un proposition</option>
            <option value="Advertisement">Publicité</option>
            <option value="Complaint">Réclamation</option>
          </select>          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><label for="message">Message</label></td>
          <td><textarea name="message" id="message" class="validate[required]" cols="35" rows="5"><?=$_SESSION['post']['message']?></textarea></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="captcha"><?=$_SESSION['n1']?> + <?=$_SESSION['n2']?> =</label></td>
          <td><input type="text" class="validate[required,custom[onlyNumber]]" name="captcha" id="captcha" /></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td colspan="2"><input type="submit" name="button" id="button" value="Envoyer" />
          <input type="reset" name="button2" id="button2" value="Recharger" />
          
          <?=$str?>          <img id="loading" src="img/ajax-load.gif" width="16" height="16" alt="loading" /></td>
        </tr>
      </table>
      </form>
      <?=$success?>
     
    </div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		</div>
			
		</div>
		
		</div>
		<?php include('../colonne_droite.php'); ?>
		</div>	
<?php include('../footer.php'); ?>
