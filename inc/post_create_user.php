<?php

//Ne pas oublier d'inclure les fonctions. 
include("functions.php");

//get_database_connection retourne $dbh, mais pour pour pourvoir récuper le retour de la fonction on l'assigne a une variable
//du même nom.
$dbh=get_database_connection();


if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["pseudo"])){

    //&& c'est un é logique, sert à tester plusieurs conditions en même temps
    //si on veux tester que tout est vrai on utilise &&
    //Le ou logique || (si au moins une de ses valeur est vrai alors on va dans le if)

$sql="INSERT INTO users (mail, password, pseudo) VALUES (:mail, :pass, :pseudo)";
$prepared=$dbh->prepare($sql);
$hashed_password= hash("sha256", $_POST["password"]);

//Voila ce qu'il se passe dans le $_POST, il fait lui même l'association clef valeur//
//$_POST = [
//     "email" => "jb@gh",
//     "password" => "dsd",
//     "pseudo" => "ssdg" 
// ];

//plutot que de tout mettre dans la fonction execute, ce qui n'est pas clair on fait notre tableau avant dans une variable//
$tab = [
    "mail" => $_POST["email"],
    "pass" => $hashed_password,
    "pseudo" => $_POST["pseudo"]
];

//Execute du tableau replacé par sa variable//

$result=$prepared->execute($tab);

header("Location: /ecommerce_test/index.php");

exit();

}

else{

    header("Location: page_create_user.php");

    exit();

}



?>