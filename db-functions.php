<?php

/* Fonction de connexion à la base de données restaurant*/

function connexion(){
    try{
        $pdo = new PDO(
            'mysql:dbname=restaurant;host=127.0.0.1',
            'root',
            '',
            [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]
        );     
        

        /* Comme ça il n'y a pas de soucis de portabilité de la variable, il suffit d'appeler la fonction connexion */
        return $pdo;

    }catch(Exception $e){
        /* S'il y a une erreur (dans le login, mot de passe etc) on affiche un message (indiquant la nature de l'erreur) et on arrête tout */
        die('Erreur : '.$e->getMessage());
    }

}

connexion();

/* Récupérer tous les plats */

function findAll(){
    /* cette variable est égale au return de la fonction connexion() */
    $pdo = connexion();
    /* Requête sql pour savoir ce que l'on sélectionne */
    $sqlQuery = 'SELECT * FROM plat';
    /* nous ajoutons prepare afin de sécuriser les informations, ainsi, on execute uniquement ce qui a été préparé auparavant */
    $tousMenus = $pdo->prepare($sqlQuery);
    $tousMenus->execute();
    /* Tous les éléments sont stockés dans un tableau */
    $menus = $tousMenus->fetchAll();
    /* return indique ce qui sera rretourné lorsque l'on appelle la fonction */
            /* Pour chaque produit, on affiche ses informations */
            foreach ($menus as $menu) {
                echo "".$menu['id_plat']."   ".$menu['intitule']."<br>";
                }
    return $menus;

}

// findAll();




function findEntree(){
    $pdo = connexion();
    $sqlQuery = 'SELECT intitule FROM plat WHERE id_categorie = 1';
    /* nous ajoutons prepare afin de sécuriser les informations, ainsi, on execute uniquement ce qui a été préparé auparavant */
    $tousProduits = $pdo->prepare($sqlQuery);
    $tousProduits->execute();
    /* Tous les éléments sont stockés dans un tableau */
    $products = $tousProduits->fetchAll();
    /* return indique ce qui sera rretourné lorsque l'on appelle la fonction */
            /* Pour chaque produit, on affiche ses informations */
            foreach ($products as $product) {
                echo "".$product['intitule']."<br>";
                }
}

// findEntree();

function findPlat(){
    $pdo = connexion();
    $sqlQuery = 'SELECT intitule FROM plat WHERE id_categorie = 2';
    /* nous ajoutons prepare afin de sécuriser les informations, ainsi, on execute uniquement ce qui a été préparé auparavant */
    $tousProduits = $pdo->prepare($sqlQuery);
    $tousProduits->execute();
    /* Tous les éléments sont stockés dans un tableau */
    $products = $tousProduits->fetchAll();
    /* return indique ce qui sera rretourné lorsque l'on appelle la fonction */
            /* Pour chaque produit, on affiche ses informations */
            foreach ($products as $product) {
                echo "".$product['intitule']."<br>";
                }
}

// findPlat();

function findDessert(){
    $pdo = connexion();
    $sqlQuery = 'SELECT intitule FROM plat WHERE id_jour = 1';
    /* nous ajoutons prepare afin de sécuriser les informations, ainsi, on execute uniquement ce qui a été préparé auparavant */
    $tousProduits = $pdo->prepare($sqlQuery);
    $tousProduits->execute();
    /* Tous les éléments sont stockés dans un tableau */
    $products = $tousProduits->fetchAll();
    /* return indique ce qui sera rretourné lorsque l'on appelle la fonction */
            /* Pour chaque produit, on affiche ses informations */
            foreach ($products as $product) {
                echo "".$product['intitule']."<br>";
                }
}

// findDessert();

/* Changer un plat */
function changePlat($name,$id){
    $pdo = connexion();
    $sqlQuery = "UPDATE plat SET intitule='$name' WHERE id_jour = $id AND id_categorie = 2";
    $plat = $pdo->prepare($sqlQuery);
    $plat->execute();
    /* Tous les éléments sont stockés dans un tableau */
    $platChange = $plat->fetch();
    /* return indique ce qui sera rretourné lorsque l'on appelle la fonction */
            /* Pour chaque produit, on affiche ses informations */
    echo $platChange;
}

 changePlat('malicette au saumon',2);


function changeEntree($name,$id){
    $pdo = connexion();
    $sqlQuery = "UPDATE plat SET intitule='$name' WHERE id_jour = $id AND id_categorie = 1";
    $plat = $pdo->prepare($sqlQuery);
    $plat->execute();
    /* Tous les éléments sont stockés dans un tableau */
    $platChange = $plat->fetch();
    /* return indique ce qui sera rretourné lorsque l'on appelle la fonction */
            /* Pour chaque produit, on affiche ses informations */
    echo $platChange;
}

// changeEntree('Apéricube',1);


function changeDessert($name,$id){
    $pdo = connexion();
    $sqlQuery = "UPDATE plat SET intitule='$name' WHERE id_jour = :id AND id_categorie = 3";
    $plat = $pdo->prepare($sqlQuery);
    $plat->execute([
        "id" => $id
    ]);
    /* Tous les éléments sont stockés dans un tableau */
    $platChange = $plat->fetch();
    /* return indique ce qui sera rretourné lorsque l'on appelle la fonction */
            /* Pour chaque produit, on affiche ses informations */
    return $platChange;
}

// echo changeDessert('Glace à la fraise',1);

/* Récupérer l'id du jour */

function findIdJour(string $nomJour){
    $pdo = connexion();
    /* Pour éviter une attaque par faille, il faut utiliser les doubles points */
    $sqlQuery = "SELECT id_jour FROM jour WHERE nom_jour = :nomJour";
    $jour = $pdo->prepare($sqlQuery);
    /* On dit que nomJour que l'on a ciblé avec les deux point est égal à la variable $nomJour = on exécute uniquement ce qui est attendu dans nomJour */
    $jour->execute([
        "nomJour" => $nomJour
    ]);
    /* fetch récupère un élément dans un tableau. Il faut donc indiquer l'index recherché. Ici l'index est égal au nom de la column que l'on a select */
    $idJour = $jour->fetch();
    
    return $idJour["id_jour"];
}

/* On affiche le résultat de la fonction à l'écran */
echo findIdJour("Samedi");

?>