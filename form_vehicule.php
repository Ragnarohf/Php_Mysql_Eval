<?php
// j'apelle ici les fichiers dont j'ai besoin ;
require_once("./inc/functions.php");
include('./inc/header.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicule </title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <?php
    // j'etablie une connection pour faire une requete a ma base pour sortir les resultats de ma table vehicule 
    //qui se trouve dans ma base vtc pour ensuite les remettres sous forme de tableau en html
    $mysqli = new mysqli("localhost", "root", "", "vtc");
    $mysqli->set_charset("utf8");
    $rq = "SELECT * FROM vehicule";
    $resultat = $mysqli->query($rq);
    echo '<table>';
    echo '<tr id="tab"><td>id_vehicule</td><td>Marque</td><td>Modele</td><td>Couleur</td><td>immatriculation</td><td>Modification</td><td>Supression</td></tr>';
    while ($ligne = $resultat->fetch_assoc()) {
        echo  '<tr>' . '<td>' . $ligne['id_vehicule'] . '</td> ' . '<td>' . $ligne['marque'] . '</td> ' . '<td>' . $ligne['modele'] . '</td>' . '<td>' . $ligne['couleur'] . '</td>' . '<td>' . $ligne['immatriculation'] . '</td>' . '<td>' . '<button type="button" class="btn btn-success">Modifier</button>' . '</td>' . '<td>' . '<button type="button" class="btn btn-danger">Supprimer</button>' . '</td>' . '</tr>';
    }
    echo '</table>';
    $mysqli->close();

    ?>

    <div id="formmp3">
        <h1>Vehicule</h1>
        <div id="success"></div>
        <?php
        // error('success');
        ?>
        <form class="formulaire" action="./validator.php" method="POST" name="vehicule">
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