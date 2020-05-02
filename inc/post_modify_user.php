<?php

include("functions.php");

$dbh=get_database_connection();

//Pour UPDATE nous avons deux choix, 
//On peux envoyer l'ID qu'on veux modifier dans notre formulaire
//Ou alors étant donné que c'est l'utilisateur courant 

if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["pseudo"])){

    if (verify_authentification()){

        //Très important le WHERE dans la fonction Update, sinon il update toutes les lignes de la table

        $sql="UPDATE users SET mail =:mail, password=:pass, pseudo=:pseudo WHERE users_id=".$_SESSION["users_id"]."";
    
        $prepared=$dbh->prepare($sql);
        $hashed_password= hash("sha256", $_POST["password"]);

        $tab = [
        "mail" => $_POST["email"],
        "pass" => $hashed_password,
        "pseudo" => $_POST["pseudo"]
        ];
        $result=$prepared->execute($tab);
        //Nous avons créer une fonction qui mets à jour le pseudo dans $_SESSION en même temps qu'il fait
        //la modification dans la base de donnée. 
        //Voir le functions.php.

        update_session($_SESSION["users_id"]);

        header("Location: /ecommerce_test/index.php");
    }
    else {
        header("Location: page_login.php?user_not_logged_in=1");
    }
}

