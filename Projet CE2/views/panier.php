<?php
session_start();

include_once("../connexion/db_connection.php");

if(isset($_GET["del"])){
    $id_del=$_GET["del"];
    unset($_SESSION["panier"][$id_del]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
         <link rel="stylesheet" href="../delete.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body class="light-blue">
    
<a href="./boutique.php" class="link">Boutique</a>
<section>
    <table class="striped">
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantite</th>
            <th></th>
        </tr>

        <?php
        $total=0;
        if(isset($_SESSION["panier"]) && is_array($_SESSION["panier"])){
            $ids= array_keys($_SESSION["panier"]);
        }if(empty($ids)){
            echo "Votre panier est vide";
        } else{

            $produits= $dbco->prepare("SELECT * FROM produit WHERE id IN (".implode(',', $ids).")");
            $produits->execute();

            foreach($produits as $produit):
                $total = $total + $produit["prix"]* $_SESSION["panier"][$produit["id"]];

                ?>
                <tr>
                    <td><img src="../images/<?= $produit["img"]?>" class="affiche" alt=""></td>
                    <td><?= $produit["nom"]?></td>
                    <td><?= $produit["prix"]?></td>
                   <td><?= $_SESSION["panier"][$produit["id"]]?></td> 
                   <td><a href="panier.php?del=<?=$produit["id"]?>"> <img src="../images/delete.jpg" alt="12" class="delete"></a></td>
                </tr>

                <?php endforeach; } ?>
        
                <tr class="total">
                    <th><center>total: <?=$total?> $</center></th>
                </tr>



    </table>
    <div id="paypal-button-container"></div>
</section>


                    <script src="https://www.paypal.com/sdk/js?client-id=AZFOsHA77K5HwnVojkZ08Fb5EjUjyBIbVxYWsrRTKdKyKX-VneYkhZoDukaqDJL_5iCYuVKTVRCO_TMx&currency=CAD"></script>

                    <script>
                        paypal.Buttons({
                            createOrder: function(data, actions){
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '<?= $total ?>'
                                        }
                                    }]
                                });
                            },
                            onApprove: function(data, actions){
                                return actions.order.capture().then(function(details){
                                    alert('Transaction complétée par' + details.payer.name.given_name + '!');
                                });
                            },
                            onError: function(err){
                                console.log("erreur dans le paiement", err);
                                alert("paiement échoué");
                            }
                        }).render('#paypal-button-container').then(function(){

                        });
                    </script>
</body>
</html>