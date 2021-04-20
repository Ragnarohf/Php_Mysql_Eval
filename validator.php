<?php
// pour executer des requetes mysql j'ai besoin dans ce fichier d'appeler ma conexion a la bdd

require_once('./inc/functions.php');


if (!empty($_POST)) {

    // Gestion des données POST

    // vérification de tout les champs des formulaires
    //données text donc tous obligatoires
    $nom = verifInput("nom", true, "string");
    $prenom = verifInput("prenom", true, "string");

    // on verifie les erreurs avant de mettre dans la base pour evitez de pourrir la base
    //formulaire conducteur
    if (count($erreur) === 0) {

        // insertion en base 
        //verifions que le conducteur n'existe pas deja
        $rq = "SELECT id FROM conducteur WHERE name = :name";
        $query = $pdo->prepare($rq);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();

        if (!$result) {
            $rq = "INSERT INTO conducteur(nom, prenom)
            VALUES (:nom,:prenom)";
            $query = $pdo->prepare($rq);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $query->execute();
            echo $erreur;
            header("Location:index.php");
        } else {
            $erreur["nom"] = "Cette personne existe déjà";
            $erreur = serialize($erreur);
            header("Location:index?er=$erreur");
        }
    } else {
        $erreur = serialize($erreur);
        header("Location:index?er=$erreur");
    }


    //formulaire vehicule
    //données text donc tous obligatoires
    $marque = verifInput("marque", true, "string");
    $modele = verifInput("modele", true, "string");
    $couleur = verifInput("couleur", true, "string");
    $immatriculation = verifInput("immatriculation", true, "string");

    if (count($erreur) === 0) {

        // insertion en base 
        //verifions que le vehicule n'existe pas deja
        $rq = "SELECT id FROM vehicule WHERE immatriculation = :immatriculation";
        $query = $pdo->prepare($rq);
        $query->bindValue(':immatriculation', $immatriculation, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();

        if (!$result) {
            $rq = "INSERT INTO vehicules(marque, modele, couleur, immatriculation)
            VALUES (:marque, :modele, :couleur, :immatriculation)";
            $query = $pdo->prepare($rq);
            $query->bindValue(':marque', $marque, PDO::PARAM_STR);
            $query->bindValue(':modele', $modele, PDO::PARAM_STR);
            $query->bindValue(':couleur', $couleur, PDO::PARAM_STR);
            $query->bindValue(':immatriculation', $immatriculation, PDO::PARAM_STR);
            $query->execute();
            echo $erreur;
            header("Location:form_vehicule.php");
        } else {
            $erreur["immatriculation"] = "Cette immatriculation existe déjà";
            $erreur = serialize($erreur);
            header("Location:form_vehicule?er=$erreur");
        }
    } else {
        $erreur = serialize($erreur);
        header("Location:form_vehicule?er=$erreur");
    }

    //formulaire assoc
    //champs select non obligatoire
    $associtation_conducteur_vehicule = verifInput("associtation_conducteur_vehicule", false, "string");
    $association_vehicule_conducteur = verifInput("association_vehicule_conducteur", false, "string");
    if (count($erreur) === 0) {

        // insertion en base 
        //verifions que le conducteur n'existe pas deja
        $rq = "SELECT id FROM vehicule WHERE immatriculation = :immatriculation";
        $query = $pdo->prepare($rq);
        $query->bindValue(':immatriculation', $immatriculation, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();

        if (!$result) {
            $rq = "INSERT INTO vehicules(nom, prenom)
            VALUES (:nom,:prenom)";
            $query = $pdo->prepare($rq);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $query->execute();
            echo $erreur;
            header("Location:index.php");
        } else {
            $erreur["nom"] = "Cette personne existe déjà";
            $erreur = serialize($erreur);
            header("Location:index?er=$erreur");
        }
    } else {
        $erreur = serialize($erreur);
        header("Location:index?er=$erreur");
    }
}




//  @copyright Thoumire MATHIEU 