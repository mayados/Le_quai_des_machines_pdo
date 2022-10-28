<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
<div id="container-page">
    <?php

    /* Il faut avoir accès au tableau $_SESSION pour connaître le nombre de produits actuels */
    session_start();
    // require('functions.php');
    // showMessage();
    ?>
    <h1>Changer menu dans la base de données</h1>
        <section id="formulaire">
            <form action="traitement.php?action=ajouterMenu" method="post">
                <p>
                    <label>
                        <p class="label-p">Jour de la semaine :</p>
                        <!-- required pour indiquer que c'est un champ qui doit obligatoirement être rempli -->
                        <input required type="text" name="jour">
                    </label>
                </p>
                <p>
                    <label>
                        <p class="label-p">Entree :</p>
                        <input required type="text" name="entree">
                    </label>
                </p>
                <p>
                    <label>
                        <p class="label-p">Plat :</p>
                        <input required type="text" name="plat">
                    </label>
                </p>
                <p>
                    <label>
                        <p class="label-p">Dessert :</p>
                        <input required type="text" name="dessert">
                    </label>
                </p>
                <p>
                    <input id="ajouter" type="submit" name="submit" value="Changer le menu">
                </p>
            </form>
        </section>

        <a id="recap" href="recap.php">Retour accueil restaurant</a>            
        

    </div>
</body>
</html>