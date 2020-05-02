<?php
session_start();
//Une fonction a dans les parenthèses des arguments. 
//A savoir , les variables définies à l'intérieur de la fonctions sont locales à la fonction. 
//On parle du SCOPE de ses variables en anglais.
//$_SESSION est un SCOPE GLOBAL et donc il peux être utilisé partout PHP le reconnaît.
//On include connect database pour pouvoir faire appel à $dbh dans le script, mais il n'est pas
//encore dispo au sein de la fonction.

function get_database_connection(){
    $dsn = 'mysql:dbname=users_tf;host=127.0.0.1';
    $user_db = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user_db, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    return $dbh;
    
}

function update_session($id_user){
    //On viens chercher le pseudo pour pouvoir mettre à jour notre $_SESSION à la modification de notre base de donnée
    $sql="SELECT users_id , pseudo FROM users WHERE users_id=:user_id";
    //Vue qu'on est dans une fonction, et que le paramettre est établis par celui qui fait appel à la fonction, on ne peux pas savoir
    // si c'est fiable. Donc par précaution on prépare la requête. 
    //Vue qu'on est en PHP on ne sais pas ce qu'on peux avoir dans $id_user on pourrais avoir une injection (chaine de caractère); 
    //global permet d'aller chercher une variable en dehors du SCOPE de la fonction
    //et grâce au include il va aller le chercher dans connect database. 
    global $dbh; 
    $prepared=$dbh->prepare($sql);
    $tab = [
        "user_id" => $id_user, 
    ];
    $result=$prepared->execute($tab);
    $result_fetch=$prepared->fetch(PDO::FETCH_ASSOC);
    
    if ($result_fetch["users_id"]){
        
        $_SESSION["pseudo"]=$result_fetch["pseudo"];
    
    }
}

/**Première ligne : On décrit rapidemment le rôle de la fonction
 * Lignes suivantes : On décrit les paramètre attendus (Type, et leurs rôle)
 * A la fin on décrit la valeur de retour si il y en a une et ce qu'elle veux dire
 */
function verify_authentification(){
    if (!empty($_SESSION["users_id"])){
       return true; 
    }
    else {
        return false;
    }
}

function delete_session(){
    setcookie("PHPSESSID", "",time()-86400, "/");
    session_unset($_SESSION);
    session_destroy($_SESSION);
}

?>