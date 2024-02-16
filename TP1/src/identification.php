<?php
ob_start();
// Appel du script de connexion au serveur et à la base de données
	require("../required/connect.php"); 

// On récupère les données saisies dans le formulaire
	$nomSaisi = $_POST['login'];
	$motPasseSaisi = $_POST['motDePasse'];

// On récupère dans la base de données le mot de passe qui correspond au nom saisi par le visiteur
	$sql = "SELECT mdp FROM utilisateur WHERE login='$nomSaisi'";
	$result = $connexion->query($sql);
	$ligne = $result->fetch();
	$motPasseBdd = $ligne['mdp'];

	// On vérifie que le mot de passe saisi est identique à celui enregistré dans la base de données

	if  ($motPasseBdd==$motPasseSaisi)
	// Le mot de passe est celui de la base utilisateur
	{
		$sql = "SELECT id FROM utilisateur WHERE login='$nomSaisi'";
		$result = $connexion->query($sql);	
		$ligne = $result->fetch();
		session_start();
		$_SESSION['user_id']=$ligne;
		$_SESSION['user_name']=$nomSaisi;
		// Retour vers la page de consultation des frais
		header("location:../index_connecter.php");
		// On quitte le script courant sans effectuer les éventuelles instructions qui suivent
		exit; 
	}
	else
	// Le mot de passe saisi ne correspond pas à celui de la base utilisateur ou login incorrecte
	{
		
		echo "Votre saisie est erronée, veuillez recommencez"; 
		// On inclut le formulaire d'identification (index.html)
		header("location:../index.php#horaires");
		// On quitte le script courant sans effectuer les éventuelles instructions qui suivent
		exit; 
		
	}
	// on ferme la connexion au SGBD
	$connexion=NULL;

?>
