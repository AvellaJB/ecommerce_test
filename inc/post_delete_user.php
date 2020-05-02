<?php

include("functions.php");

$dbh=get_database_connection();


if (verify_authentification()){
    //On ne peux pas supprimer une valeur seule dans une ligne, on supprime la ligne directement. 
    //Si on voulais supprimer une valeur dans la ligne, on ferais un UPDATE avec une valeur NULL
    //IMPORTANT : Le delete fonctionne comme l'UPDATE si on mets pas de WHERE ça DELETE toute les données de la table.
    $sql="DELETE FROM users WHERE users_id=".$_SESSION["users_id"]."";

    $dbh->exec($sql);

    delete_session();

    header("Location: /ecommerce_test/index.php");
}

?>