<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil d'inscription</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

   
</head>
<body>
    <div class="card-panel grey lighten-3">
    <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Astral Shop</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="connexion.php">Se Connecter</a></li>
        <li><a href="recuPasse.php">Forgot Password </a></li>
        <li><a class="active" href="index.php">S'enregistrer</a></li>
      </ul>
    </div>
  </nav>
  


    <div class="card-panel white">
        <div class="blue-text text-darken-2">
    <!-- <div class=" text-darken-2">This is a card panel with dark blue text</div>
  </div> -->
            

    <div class="row">
    <form class="col s12" action="../controllers/userController.php" method="post" id="inscription">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" name="nom">
          <label for="first_name">First Name / Nom</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="prenom">
          <label for="last_name">Last Name / Prénom(s)</label>
        </div>
      </div>
     
      <div class="row">
        
        <div class="input-field col s4">
          <input id="email" type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>

        <div class="input-field col s4">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password / Mot de passe</label>
        </div>

        <div class="input-field col s4">
          <input id="confirmPass" type="password" class="validate">
          <label for="confirmPass">Confirmez votre mot de passe / Confirm Password</label>
        </div>
      </div>


      <div class="row">
        
        <div class="input-field col s4">
          <input id="user_name" type="text" class="validate" name="username">
          <label for="user_name">username / Nom d'utilisateur</label>
        </div>

        <div class="input-field col s4">
          <input id="Userpassword" type="password" class="validate" name="Userpassword">
          <label for="Userpassword">Password / Mot de passe</label>
        </div>

        <div class="input-field col s4">
          <input id="email" type="password" class="validate" name="email">
          <label for="email">Confirmez votre mot de passe / Confirm Password</label>
        </div>
      </div>

      <div class="input-field col s4">
          <input id="profil" type="text" class="validate" name="profil" value="client" hidden>
          
        </div>
      </div>
      
      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
    </form>
   
    </div>
  </div>
    </div>
    </div>

</body>
</html>