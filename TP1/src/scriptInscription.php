<?php
	ob_start();
	require("../required/connect.php");

	// On récupère les données saisies dans le formulaire
	$nomSaisi = $_POST['login'];
	$motPasseSaisi = $_POST['motDePasse'];

	// On vérifie si le login existe déjà dans la base de données
	$sql = "SELECT login FROM utilisateur WHERE login='$nomSaisi'";
	$result = $connexion->query($sql);
	$ligne = $result->fetch();

	if ($ligne) {
	    // Le login existe déjà, redirigez avec un message d'erreur
	    header("location:inscription.php?error=Le login est déjà utilisé. Veuillez en choisir un autre.");
	    exit; // Quittez le script
	} else {
	    // Le login est unique, insérez-le dans la base de données
	    $sql = "INSERT INTO `utilisateur` (`id`, `login`, `mdp`) VALUES (NULL, '$nomSaisi', '$motPasseSaisi');";
	    $connexion->query($sql);
	    
	    // Redirigez l'utilisateur vers la page de consultation des frais ou toute autre page appropriée
	    header("location:../index.php");
	    exit; // Quittez le script
	}

	// Fermez la connexion au SGBD
	$connexion = null;
?>
