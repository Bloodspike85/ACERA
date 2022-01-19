 var Liste_active = false;
 var Last_Key_Pressed = null;
 var file; 




function debug(texte)
{
	console.log(texte);
}

/************************** Authentification *****************************************/

function Verification_connection()
{
	

	let id = document.getElementById("id").value;
	let password = document.getElementById("pass-word").value;

	if(id != "")
	{
		debug("Ca n'est pas vide : " . id);
		if(password != "")
		{
			location.replace("../include/test_conn.php?id=" + id + "&password=" + password );
			
		}
		else
		{
			
			location.reload();
		}
	}

	else
	{
		location.reload();
	}


	
	
	
	
}



/*******************************ACERA******************************************************/

function Get_html(m_file)
{
	var file = m_file;
	
	var Reader = new FileReader();
	
	Reader.onload = function(progressEvent)
	{
		debug('on load ok');
		
		var lines = this.result.split('<br>');
		var texte = ""
		
		for(var line = 0; line < lines.length ; line++)
		{
			debug(lines[line]);
			texte += lines[line];
		}
		document.getElementById("Main_text_holder").innerHTML = texte;
		ConversionHTML();
		
	}
	
	Reader.readAsText(file);
	
	
	
	//debug(texte);
}


function reset_text()
{
	document.getElementById("Main_text_holder").innerHTML = "";
	
	document.getElementById("HTML_texte_holder").value = "";
	
	
}

function click_handle(nom,argument)
{
	
	if (typeof argument === 'undefined') 
	{
		argument = '';
	}
	
	switch (nom) 
	{
		case "Lien":
		  argument = prompt("Quelle est l'adresse du lien ?");
		  break;
		
		
		case "Quitter":
			argument = confirm('Voulez vous vraiment quitter ACERA?');
			if(argument)
			{
				location.replace("index.php");
				
			}
		break;
		
		case 'Nouveau':
		argument = "";
		debug("Nouveau");
		reset_text();
		break;
		
		case 'Ouvrir' :
		debug("Ouverture en cours");
		argument= "";
		var file_loader = document.getElementById('file_uploader');
		file_loader.click();
		break;
		
		case 'Sauvegarder' :
		debug("Sauvegarde en cours");
		argument= "";
		var FileName = prompt("Comment voulez vous appeler votre article ?");
		Save_file(document.getElementById('HTML_texte_holder').value, FileName);
		break;
		
		case 'Image' :
		debug("Choix image");
		argument= "";
		var file_loader = document.getElementById('image_uploader');
		file_loader.click();
		break;
		
		case 'ftp' :
		debug("Preparation ftp");
		argument = alert("Envoie FTP");
		window.open('./include/ftp_handler.php');
				
			
		//Ouverture page ftp handler
		
		break;
	 }
	
	document.execCommand(nom, false, argument);
	
	
	
}

function ConversionHTML() 
{
	
  document.getElementById("HTML_texte_holder").value = document.getElementById("Main_text_holder").innerHTML;
}



function Save_file(donnee,fileName) 
{
	var file = new Blob([donnee], {type: '.html'});
	
    if (window.navigator.msSaveOrOpenBlob) 
        window.navigator.msSaveOrOpenBlob(file, fileName);
    else 
	{ 
        var a = document.createElement("a"),
                url = URL.createObjectURL(file);
        a.href = url;
        a.download = fileName + '.html';
        document.body.appendChild(a);
        a.click();
        setTimeout(function() 
		{
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);  
        }, 0); 
    }
}

function GetImage_Name()
{
	var img = document.getElementById('image_uploader');
	
	
	
	
	
}
