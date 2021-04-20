<?php

require_once("./inc/functions.php");
include('./inc/header.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Poke tour </title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <div id="formmp3">
        <h1>Conducteur</h1>
        <div id="success"></div>
        <?php
        // error('success');
        ?>
        <form class="formulaire" action="./validator.php" method="POST" name="uploadMP3">
            <input type="text" name="Marque" placeholder="Marque" id="Marque">
            <?php
            // error('id_association');
            ?>
            <input type="text" name="modele" placeholder="Modele" id="modele">
            <?php
            // error('id_vehicule');
            ?>
            <input type="text" name="couleur" placeholder="Couleur" id="couleur">
            <?php
            // error('id_association');
            ?>
            <input type="text" name="immatriculation" placeholder="Immatriculation (AAA-AAA-AAA)" id="immatriculation">
            <?php
            // error('id_association');
            ?>

            <input type="submit" value="Ajouter ce vehicule" name="submit">
        </form>
    </div>

</body>

<?php
include('./inc/footer.php');
?>
<!-- @copyright Thoumire MATHIEU -->

</html>