<DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <link rel="stylesheet" href="/ecommerce_test/css/style.css">
        <meta charset="utf-8">
        <style>@import url('https://fonts.googleapis.com/css2?family=Old+Standard+TT&display=swap');</style>
    </head>
    <body>
            <div id="connectform">
                <?php
                if (isset($_GET["user_not_logged_in"]) && ($_GET["user_not_logged_in"]=="1")){
                    echo "<h1>Vous ne pouvez pas modifier vos infos sans vous connecter </h1>";
                }
                else {
                    echo "<h1>Si vous souhaitez vous connecter</h1>";
                }
            
                ?>
                <form action="post_login_user.php" method="post">
                    <label>Email </label>
                    <input name="email" type="email" placeholder="Email"></input>
                    <br>
                    <label>Password </label>
                    <input name="password" type="password" placeholder="Password"></input>
                    <br>
                    <input type="submit"></input>
                </form>
            </div>
    </body>
</hmtl>