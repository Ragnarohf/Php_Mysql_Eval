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
    <title>Conducteur </title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "vtc");
    $mysqli->set_charset("utf8");
    $rq = "SELECT * FROM conducteur";
    $resultat = $mysqli->query($rq);
    echo '<table>';
    echo '<tr><td>Nom</td><td>Prenom</td><td>Modif</td><td>Supress</td></tr>';
    while ($ligne = $resultat->fetch_assoc()) {
        echo  '<tr>' . '<td>' . $ligne['prenom'] . '</td> ' . '<td>' . $ligne['nom'] . '</td>' . '<td>' . '<button type="button" class="btn btn-success">Modifier</button>' . '</td>' . '<td>' . '<button type="button" class="btn btn-warning">Supprimer</button>' . '</td>' . '</tr>';
    }
    echo '</table>';
    $mysqli->close();

    ?>


    <div id="formmp3">
        <h1>Conducteur</h1>
        <div id="success"></div>
        <?php
        // error('success');
        ?>
        <form class="formulaire" action="./validator.php" method="POST" name="uploadMP3">
            <input type="text" name="prenom" placeholder="Prenom" id="prenom">
            <?php
            // error('id_association');
            ?>
            <input type="text" name="nom" placeholder="Nom" id="nom">
            <?php
            // error('id_vehicule');
            ?>

            <input type="submit" value="Ajouter ce conducteur" name="submit">
        </form>
    </div>

</body>

<?php
include('./inc/footer.php');
?>
<!-- @copyright Thoumire MATHIEU -->

</html>