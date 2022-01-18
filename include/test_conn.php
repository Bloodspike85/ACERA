<?php

session_start();

//Recuperation des informations a partir de l url

if (isset($_GET['id']) AND isset($_GET['password']))
{
	

    //On test la connection

    $user_courriel = $_GET['id'] ;
    $user_password = $_GET['password'];

    // Create connection
    $conn = new mysqli("localhost:3306", "root" , "Undertaker_852" , 'acera');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        

        $_SESSION['error_connection'] = "Id ou mot de passe non valable";

        sleep(10);
        
        
        header("Location: ../index.php");
    } else {
        

        echo "vérification de votre identitée ... <br> ";
        //test 

        $mysqlrequete = "SELECT * FROM acera.user";
       

        if( $result = $conn->query($mysqlrequete))
        {
            while ($data = mysqli_fetch_array($result)) 
        {
           

            // on vérifie que la personne qui s'identifie existe

            if($data["mail"] === $user_courriel  && $data["password"] === $user_password)
            {
                echo "connection autoriée ... <br> ";
                 
                //Récupération des informations user
                

                echo "Récupération informations utilisateur ... <br> ";

        
                
                $_SESSION['userid'] = $data['id'];
                $_SESSION['nom'] = $data['nom'];
                $_SESSION['prenom'] = $data['prenom'];
                $_SESSION['mail'] = $data['mail'];
                $_SESSION['administrateur'] = $data['administrateur'];
                $_SESSION['password'] = $data['password'];

                $mysqlrequete2 = "SELECT * FROM acera.user , acera.site WHERE site.user_courriel = '" .$data['mail'] . "'";
       

                if( $result2 = $conn->query($mysqlrequete2))
                {
                    while ($data2 = mysqli_fetch_array($result2))
                                    {

                                        echo "Récupération informations site internet ftp ... <br> ";



                                        echo "Récupération informations site internet de l'utilisateur ... <br> ";
                                        $_SESSION['ftp_id'] = $data2['ftp_id'];
                                        $_SESSION['ftp_adresse'] = $data2['ftp_adresse'];
                                        $_SESSION['ftp_password'] = $data2['ftp_password'];
                                        $_SESSION['ftp_port'] = $data2['ftp_port'];

                                        header("Location: ../acera.php");
                                        exit();

                                        
                                        

                                    }


                }
                else
                {
                    $_SESSION['error_connection'] = "Id ou mot de passe non valable";
                    printf("Erreur : %s\n", $conn->error);
                }
        

        
               

                
            }

            
        }

        }

        else
        {
            $_SESSION['error_connection'] = "Id ou mot de passe non valable";
            printf("Erreur : %s\n", $conn->error);
        }
        
        
        
        $_SESSION['error_connection'] = "Id ou mot de passe non valable";
        header("Location: ../index.php");
        
    }

}
else
{
	$_SESSION['error_connection'] = "Id ou mot de passe non valable";
    header("Location: ../index.php");
}


?>