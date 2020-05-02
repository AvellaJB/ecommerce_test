
</div>
</body>


<div class="footer">

<?php
//Le require_once est un include mais en plus stylé car il fait attention à si dans la page il y a pas déjà eu un include. 
//Si il y avais eu  include dans la page, cela pourrais créer des clash (typiquement dans notre cas avoir plusieurs session_start)
require_once("functions.php");

if (verify_authentification()){
   
    echo "Vous êtes Connecté";
    
}
else{
    
    echo "Vous êtes Deconnecté";
  
}

if (verify_authentification()){
   
    echo $_SESSION["pseudo"];
    exit(); 
}
else{
    echo "Qui êtes vous?";
    exit(); 
}
var_dump($_SESSION);




?>


</div>





</html>