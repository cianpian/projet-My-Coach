<?php
	// Définitions de constantes pour la connexion à MySQL
	define ('SERVEUR', 'localhost'); 
	define ('BASE', 'mycoach');
	define ('NOM', 'root');
	define ('MOTPASSE', '');


	// Connexion à la base de données
	try {
			$connexion= new PDO("mysql:host=".SERVEUR.";dbname=".BASE,NOM,MOTPASSE);
	} catch ( Exception $e ) {
		  die ("\n Connection à ".SERVEUR." impossible :  ".$e->getMessage());
	}
?>
