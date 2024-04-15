<?php
session_start();

include_once("../connexion/db_connection.php");
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    
<a href="panier.php" class="link">Panier<span>
    <?php
    if(isset($_SESSION["panier"]) && is_array($_SESSION["panier"])){
        echo array_sum($_SESSION["panier"]);
    }
    ?></span></a>
</a>

    <section class="product_list">
        <?php
        $reponse= $dbco->prepare("SELECT * FROM produit");
        $reponse->execute();
        while($row= $reponse->fetch(PDO::FETCH_ASSOC)){

        
        ?>
        <!-- <form action="" method="post" class="product"> -->
            <table class="striped">

              <tr>
            <th>Image</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantite</th>
            <th></th>
        </tr>
            <!-- <div> -->
                <tr>

                
              <td><img src="../images/<?php echo $row["img"];?>" alt=""></td>  
            <!-- </div> -->

            <!-- <div> -->
                <td><h5><?php echo $row["nom"];?></h5></td>
               
                <td><h5><?php echo $row["prix"];?> $</h5></td>

                <td><h5><?php echo $row["quantite"];?> en stock</h5></td>
               

               <td><a href="../controllers/ajouter_panier.php?id=<?php echo $row["id"];?>">Ajouter à mon panier</a></td> 
            <!-- </div> -->
            </tr>
            </table>
            <!-- </form> -->


           <?php } ?>
    </section>
    
</body>
</html>


