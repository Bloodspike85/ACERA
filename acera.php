<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href="include/Acera_style.css" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/fonction_commune.js"></script>


<title>ACERA</title>
</head>
<body onload="reset_text()">
<div id="Acera_holder">

<script>
 
</script>

	<div id="Title_Holder"> ACERA <br> Aide à la Création et Rédaction d'Articles</div>
	
	<?php

	session_start();

	echo "Bonjour " . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "<br>";


	?>
	
	<div id="Menu_Holder">
	
			<button id="b_nouveau" class="menu_bouton" onclick="click_handle('Nouveau')"> Nouveau </button>
			<button id="b_ouvrir" class="menu_bouton" onclick="click_handle('Ouvrir')"> Ouvrir </button>
			<button id="b_sauvegarder" class="menu_bouton" onclick="click_handle('Sauvegarder')"> Sauvegarder </button>
			<button id="b_quitter" class="menu_bouton" onclick="click_handle('Quitter')"> Deconnection </button>
			<input type="file" id="file_uploader" accept =".html" onchange="Get_html(this.files[0])"/>
	
	
	</div>
	
	
	<div id="Text_transform_Icone_Holder">
			
			 
			<button id="b_gras" class="menu_bouton" style="font-weight:bold;" onclick="click_handle('bold')"> Gras </button>
			<button id="b_italique" class="menu_bouton" style="font-style:italic;" onclick="click_handle('italic')"> Italique </button>
			<button id="b_surlignier" class="menu_bouton" style="text-decoration:underline;" onclick="click_handle('underline')"> Soulignier </button>
			<button id="b_lien" class="menu_bouton" onclick="click_handle('Lien')"> Lien </button>
			<button id="b_image" class="menu_bouton" onclick="click_handle('Image')"> Image </button>
			<button id="b_liste" class="menu_bouton" onclick="click_handle('Liste')"> Liste </button>
			
			<input type="file" id="image_uploader" accept = ".jpg .png" onclick="click_handle(this.id)"/>
	
	 </div>
	
	
	<div id="Main_text_holder" oninput="ConversionHTML()" contentEditable ></div> 
	<textarea id="HTML_texte_holder" > </textarea>
	
	
	<form action="./include/ftp_handler.php" method="post" enctype="multipart/form-data">
		Selection du fichier à envoyer sur le site :
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Envoie du fichier" name="submit">
		</form>



</div>
</body>
</html>

