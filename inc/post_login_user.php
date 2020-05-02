<?php

//Nous allons créer une cession (utilisation de cookies de session)

include("functions.php");

$dbh=get_database_connection();

if (!empty($_POST["email"]) && !empty($_POST["password"])){


$sql="SELECT users_id , pseudo FROM users WHERE mail=:mail and password=:pass";

//EN SQL on a 4 grand type d'opérations le CRUD
//Create, read, update, delete. 
//Create : Insert into
//Read : Select
//Update : Update
//Delete : Delete


$prepared=$dbh->prepare($sql);
$hashed_password= hash("sha256", $_POST["password"]);

$tab = [
    "mail" => $_POST["email"],
    "pass" => $hashed_password,
];

var_dump($tab);

$result=$prepared->execute($tab);


//Le Fetch assoc permet de retourner un tableau clef valeur ce qui est plus pratique


$result_fetch=$prepared->fetch(PDO::FETCH_ASSOC);
var_dump($result_fetch);

    if ($result_fetch["users_id"]){

        //On peux créer son propre Cookie sans faire appel à $_SESSION et en utilisant la base de donnée, c'est elle
        //qui portera la cession.
        $_SESSION["users_id"]=$result_fetch["users_id"];
        $_SESSION["pseudo"]=$result_fetch["pseudo"];
        header("Location: /ecommerce_test/index.php");
        exit();


    }
    else {
        header("Location: page_login.php");
        exit();
    }

    }

else{
    
    header("Location: page_login.php");

    exit();


}

?>