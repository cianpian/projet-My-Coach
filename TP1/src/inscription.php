<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coach Sportif - Bienvenue</title>
        <link rel="stylesheet" type="text/css" href="../CSS/index3.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="../index.php">Retour à l'accueil</a></li>
                </ul>
            </nav>
        </header>
        <section id="inscription">
    	    <div class="container">
                <h3>Formulaire de connexion</h3>
                <?php
                    // Affichez le message d'erreur s'il existe
                    if (isset($_GET['error'])) {
                        echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
                    }
	                  ?>
                <div class="contact-form">
                    <form action="scriptInscription.php" method="post">
                        <label for="login">Login :</label>
                        <input type="text" id="login" name="login" required>
                        <label for="motDePasse">Mot de passe :</label>
                        <input type="password" id="motDePasse" name="motDePasse" required>
                        <button type="submit">Inscription</button>
                    </form>
                </div> 
    	    </div>
    	</section>
    	<footer>
            <div>
                <p>&copy; 2023 Coach Sportif. Tous droits réservés.</p>
            </div>
        </footer>
	</body>
</html>