<DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageTitle; ?> </title>
        <link rel="stylesheet" href="/ecommerce_test/css/style.css">
        <meta charset="utf-8">
        <style>@import url('https://fonts.googleapis.com/css2?family=Old+Standard+TT&display=swap');</style>
    </head>
    <body>
            <div id="connectform">
                <h1>Si vous souhaitez vous connecter</h1>
                <form action="post_create_user.php" method="post">
                    <label>Email </label>
                    <input name="email" type="email" placeholder="Email"></input>
                    <br>
                    <label>Password </label>
                    <input name="password" type="password" placeholder="Password"></input>
                    <br>
                    <label>Pseudo</label>
                    <input name="pseudo" type="text" placeholder="Pseudo" maxlength="12"></input>
                    <br>
                    <input type="submit"></input>
                </form>
            </div>
    </body>
</hmtl>