<?php
// Mise en place d'une connexion basique
$conn_id = ftp_connect("backito.comli.com");

// Identification avec un nom d'utilisateur et un mot de passe
$login_result = ftp_login($conn_id, "a4924267", "etna123");

$content = ftp_nlist($conn_id, "Sauvegardes");

$usrbackup = "test.txt";

if(in_array($usrbackup, $content))
{
	echo "ecraser ancienne sauvegarde avec la nouvelle?\n=> ";
}
else
{
	echo "dossier de sauvegarde inexistant, en creer un nouveau?\n=>";
}
$file = 'test.txt';
$remote_file = 'test.txt';

// Mise en place d'une connexion basique
$conn_id = ftp_connect("backito.comli.com");

// Identification avec un nom d'utilisateur et un mot de passe
$login_result = ftp_login($conn_id, "a4924267", "etna123");

// Charge un fichier
if (ftp_put($conn_id, $file, $file, FTP_ASCII)) {
 echo "Le fichier $file a té chargé avec succès\n";
} else {
 echo "Il y a eu un problème lors du chargement du fichier $file\n";
}

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