<?php
    //Démarrer une session
    session_start();
    
    if(isset($_SESSION['user_name'])){
        $nom=$_SESSION['user_name'];
    }
    else{
        header("location:../index.php#horaires");
    }
    if(isset($_SESSION['user_id'])){
    $id=$_SESSION['user_id'];
    }
    else{
        header("location:../index.php#horaires");
    }
    
    // test vérifiant la présence de la variable de session
    $sql = "SELECT id FROM utilisateur WHERE login='$nom'";
    $result = $connexion->query($sql);
    $ligne = $result->fetch();
    if ($id!= $ligne)
    {
        // Redirection vers la page de démarrage du site (connection.html)
        header("location:../index.php");
    }
    else
?>