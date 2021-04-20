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
    <title>Association_vehicule_conducteur </title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "vtc");
    $mysqli->set_charset("utf8");
    $rq = "SELECT * FROM association_vehicule_conducteur";
    $resultat = $mysqli->query($rq);
    echo '<table>';
    echo '<tr id="tab"><td>id_association</td><td>conducteur</td><td>vehicule</td><td>Modification</td><td>Supression</td></tr>';
    while ($ligne = $resultat->fetch_assoc()) {
        echo  '<tr>' . '<td>' . $ligne['id_association'] . '</td> ' . '<td>' . $ligne['id_conducteur'] . '</td>' . '<td>' . $ligne['id_vehicule'] . '</td>' . '<td>' . '<button type="button" class="btn btn-success">Modifier</button>' . '</td>' . '<td>' . '<button type="button" class="btn btn-danger">Supprimer</button>' . '</td>' . '</tr>';
    }
    echo '</table>';
    $mysqli->close();



    try {
        $bdd = new PDO('mysql:host=localhost;dbname=vtc', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ?>
    </form>

    <div id="formmp3">
        <h1>Association_vehicule_conducteur</h1>
        <div id="success"></div>
        <?php
        // error('success');
        ?>
        <form class="formulaire" action="./validator.php" method="POST" name="uploadMP3">
            <label for="associtation_conducteur_vehicule">Conducteur</label>
            <select name="associtation_conducteur_vehicule" id="associtation_conducteur_vehicule">
                <option value="" disabled selected>Choisissez le Conducteur</option>
                <?php
                $reponse = $bdd->query('SELECT * FROM conducteur');
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['nom']; ?>"> <?php echo $donnees['prenom']; ?></option>
                <?php
                }
                ?>
            </select>
            <label for="association_vehicule_conducteur">Vehicule</label>
            <select name="association_vehicule_conducteur" id="association_vehicule_conducteur">
                <option value="" disabled selected>Choisissez le Vehicule</option>
                <?php
                $reponse = $bdd->query('SELECT * FROM vehicule');
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['marque']; ?>"> <?php echo $donnees['marque']; ?></option>
                <?php
                }
                ?>
            </select>



            <input type="submit" value="ajouter cette association" name="submit">
        </form>
    </div>

</body>

<?php
include('./inc/footer.php');
?>
<!-- @copyright Thoumire MATHIEU -->

</html>