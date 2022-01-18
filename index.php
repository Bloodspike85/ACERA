

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" href="include/Acera_style.css" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/fonction_commune.js"></script>

<title>Authentification</title>
</head>
<body>
		

		<div id="Title_Holder"> ACERA <br> Aide à la Création et Rédaction d'Articles</div>

		
		<div id="Login_holder">

			<?php

			session_start();

			if(isset($_SESSION['error_connection']))
			{
				echo $_SESSION['error_connection'];
			}
			else {
				echo "Veuillez de  renseigner votre identité." ;
			}



			?>
			
			<form method="post">
	            <label for="id"><u>Identifiant :</u> </label>
	            <input type="text" id="id" />
	            <br />
	            
	            <label for="pass-word"><u>Mot de passe :</u> </label>
	            <input type="password" id="pass-word" />
	            <br />
	            
	            <input id="bouton_connection" type="button" value="Connection" onclick="Verification_connection()"/> 
        	</form>
		
		
		</div>
			

</body>
</html>