<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>
    <h1>Connexion</h1>

     <form action="../controllers/connexionController.php" method="post">

        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username">

        
        <label for="password">Mot de passe</label>
        <input type="text" id="password" name="password">

        <button>Se connecter</button>
        <p>Mot de passe oublié ?<a href="recuPasse.php">Cliquez ici</a></p>

        
   
</body>
</html>