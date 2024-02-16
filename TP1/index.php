<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coach Sportif - Bienvenue</title>
        <link rel="stylesheet" type="text/css" href="CSS/index2.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#tarifs">Coach</a></li>
                    <li><a href="#horaires">horaires</a></li>
                </ul>
            </nav>
        </header>

        <section id="accueil">
            <div class="hero">
                <h1>Transformez votre vie avec notre coach sportif</h1>
                <p>Atteignez vos objectifs de fitness et de bien-être</p>
                <h2>Nos Services</h2>
                <?php
                    ob_start();
                    // Appel du script de connexion au serveur et à la base de données
                        require("required/connect.php");
                    // Requête SQL pour les horraire
                        $sql ="SELECT libelle FROM `sport`; ";
                        $result = $connexion->query($sql);
                        $ligne = $result->fetch();
                        if ($ligne!= false) {
                            echo "<h3>" . $ligne["libelle"] . "</h3>";
                            while ($row = $result->fetch()) {
                                echo "<h3>" . $row["libelle"] . "</h3>";
                            }
                        } 
                        else {
                            echo "Aucune donnée trouvée dans la base de données.";
                        }

            ?>
            </div>
        </section>

        

        <section id="tarifs">
            <div class="container">
                <h2>Coach</h2>    
            </div>
            <div class="liens-container">
                <p>Thomas Dupont</p>
                <a><img src="visuel-entreprise-sportif-optez.jpeg"></a><a>
                    <p>Âge : 32 ans</p>
                    <p>Sexe : Masculin</p>

                    <p>Téléphone : 01 23 45 67 89</p>
                    <p>E-mail : thomas.dupont@email.com</p>

                    <p>Profil professionnel :</p>

                    <p>Diplômé en Sciences du Sport et de l'Éducation Physique (Licence STAPS)</p>
                    <p>Certifié en tant que coach sportif personnel par la Fédération Française de Fitness et de Gymnastique Volontaire (FFFGV)</p>
                    <p>Plus de 7 ans d'expérience en tant que coach sportif personnel</p>
                    <p>Spécialisé dans la remise en forme, la perte de poids, la musculation et la nutrition</p>
                    <p>Expérience dans la gestion de groupes pour des cours collectifs de fitness</p>
                    <p>Capacité à créer des programmes d'entraînement personnalisés en fonction des objectifs individuels</p>
                    <p>Connaissance approfondie de l'anatomie humaine et des principes de l'entraînement</p>
                    <p>Passionné par la santé et le bien-être, axé sur l'amélioration de la qualité de vie de ses clients</p></a>
            </div>
        </section>

    	<section id="horaires">
    	    <div class="container">
                <h3>Veuillez vous connecter pour accèder à nos sceance</h3>
                <div class="contact-form">
                    <form action="src/identification.php" method="post">
                        <label for="login">Login :</label>
                        <input type="text" id="login" name="login" required>
                        <label for="motDePasse">Mot de passe :</label>
                        <input type="password" id="motDePasse" name="motDePasse" required>
                        <button type="submit">Connexion</button>
                    </form>
                    <a>Vous n'avez pas encore de compte inscrivez vous </a>
                    <a href="src/inscription.php">ici</a>
                </div>
                
    	    </div>
    	</section>

        

        <footer>
            <div class="container">
                <p>&copy; 2023 Coach Sportif. Tous droits réservés.</p>
            </div>
        </footer>
    </body>
</html>
