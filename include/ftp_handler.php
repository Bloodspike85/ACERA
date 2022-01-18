<?php

session_start();

echo "Ceci est un test" ;

$target_file = basename($_FILES["fileToUpload"]["name"]);


echo $target_file ;



/*************************************************************************************************************** */

$ftp_server = $_SESSION['ftp_adresse'];

$ftp_connection = null;

// Mise en place d'une connexion basique

echo "Tentative de connection a " . $ftp_server . "<br>" ;

if( $_SESSION['ftp_port'] != 21)
{
    $ftp_connection = ftp_connect($ftp_server,$_SESSION['ftp_port']);
}
else
{
    $ftp_connection = ftp_connect($ftp_server);
}

$ftp_user_name = $_SESSION['ftp_id'];
$ftp_user_pass = $_SESSION['ftp_password'];


// Identification avec un nom d'utilisateur et un mot de passe
$login_result = ftp_login($ftp_connection, $ftp_user_name, $ftp_user_pass);

// Vérification de la connexion
if ((!$ftp_connection) || (!$login_result)) {
    echo "La connexion FTP a échoué !<br>";
    echo "Tentative de connexion au serveur $ftp_server pour l'utilisateur $ftp_user_name<br> ";
    exit;
} else {
    echo "Connexion au serveur $ftp_server, pour l'utilisateur $ftp_user_name<br><br>";
}

// Chargement d'un fichier
$upload = ftp_put($ftp_connection, $destination_file, $source_file, FTP_BINARY);

// Vérification du status du chargement
if (!$upload) {
    echo "Le chargement FTP a échoué!<br>";
} else {
    echo "Chargement de $source_file vers $ftp_server en tant que $destination_file<br>";
}

// Fermeture de la connexion FTP
ftp_close($ftp_connection);
?>