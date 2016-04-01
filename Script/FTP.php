#!/usr/bin/php5
<?php

function connect_general()
{
	$conn_id = ftp_connect("backito.comli.com") or die("Impossible de se connecter au serveur " . $ftp_serv);
	$login_result = ftp_login($conn_id, "a4924267", "etna123");
	return ($conn_id);
}

function connect_personal_serv()
{
	$ftp_serv = readline("enter the adress of your ftp server:\n=> ");
	$conn_id = ftp_connect($ftp_serv) or die("Impossible de se connecter au serveur " . $ftp_serv);
	$login = readline("enter the login of your serveur:\n=> ");
	$pass = readline("enter the password of your server:\n=> ");
	$login_result = ftp_login($conn_id, $login, $pass);
	return ($conn_id);
}

$content = ftp_nlist($conn_id, ".");

$usrbackup = "test.txt";	// nom du fichier/dossier a envoyer, uniquement le nom, et pas le chemin

$file = 'test.txt';			// a remplacer par le chemin absolu du fichier/dossier a envoyer
$remote_file = 'test.txt';	// c'est le nom du fichier/dossier qui vas etre cree sur le serveur

function upload_file()
{
	$conn_id = connect_general();
	$serv_path = "Sauvegardes";
	$file = readline("give the relative path of the file you want to upload");

	if (ftp_put($conn_id,"/Sauvegardes/" . $file, $file, FTP_BINARY))
	{
		echo "Le fichier $file a été chargé avec succès\n";
	}
	else
	{
		echo "Il y a eu un problème lors du chargement du fichier $file\n";
	}
}


// function check_serv()
// {
// 	$conn_id = connect_general();
// 	if(in_array($usrbackup, $content))
// 	{
// 		echo "fichier present sur le serveur\n";
// 	}
// 	else
// 	{
// 		echo "fichier inexistant sur le serveur\n";
// 	}
// }

// $override = readline();
// 	if ($override == 'yes')
// 	{
// 		if (ftp_put($conn_id, 'Sauvegardes', './'$usrbackup, FTP_ASCII))
// 		{
// 			echo "le fichier $usrbackup a ete telecharge";
// 		}
// 		else
// 		{
// 			echo "Il y a eu un problème lors du chargement du fichier $file\n";
// 		}
// 	}


// Fermeture de la connexion
ftp_close($conn_id);