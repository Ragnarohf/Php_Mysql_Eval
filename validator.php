<?php
// pour executer des requetes mysql j'ai besoin dans ce fichier d'appeler ma conexion a la bdd

require_once('./inc/functions.php');


if (!empty($_POST)) {

    // Gestion des données POST

    // vérification de tout les champs du formulaires
    $titre = verifInput("titre", true, "string");
    $description = verifInput("description", true, "string");
    $ville = verifInput("ville", true, "string");
    $pays = verifInput("pays", true, "string");
    $prixParPersonne = verifInput("prixParPersonne", true, "string");
    $distanceDepuisParis = verifInput("distanceDepuisParis", false, "string");
    $typeDePension = verifInput("typeDePension", true, "string");
    $dateDeDepart = verifInput("dateDeDepart", false, "");
    $dateDeRetour = verifInput("dateDeRetour", false, "");
    $dateDeRetour = verifInput("dateDeRetour", false, "");

    // on verifie les erreurs avant de mettre dans la base pour evitez de pourrir la base
    if (count($erreur) === 0) {

        // insertion en base
        $rq = "SELECT id FROM location_voyage WHERE photo = :photoName";
        $query = $pdo->prepare($rq); //pdo variable prédéfini
        $query->bindValue(':photoName', $photoName, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(); // vérifie que le fichier photo n'est pas deja dans la base de donnée fetch recrache un tableau lisible par php

        if (!$result) {

            // $rq = "INSERT INTO location_voyage(titre)
            // VALUES 
            // (:titre)";
            var_dump("");
            $rq = "INSERT INTO location_voyage(titre,description,ville,pays,prix_par_personne,distance_depuis_paris,type_de_pension,date_de_depart,date_de_retour,photo)
            VALUES 
            (:titre,:description,:ville,:pays,:prix_par_personne,:distance_depuis_paris,:type_de_pension,:date_de_depart,:date_de_retour,:photo)"; // rq = requete
            $query = $pdo->prepare($rq);
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);
            $query->bindValue(':ville', $ville, PDO::PARAM_STR);
            $query->bindValue(':pays', $pays, PDO::PARAM_STR);
            $query->bindValue(':prix_par_personne', $prixParPersonne, PDO::PARAM_INT);
            $query->bindValue(':distance_depuis_paris', $distanceDepuisParis, PDO::PARAM_INT);
            $query->bindValue(':type_de_pension', $typeDePension, PDO::PARAM_STR);
            $query->bindValue(':date_de_depart', $dateDeDepart, PDO::PARAM_STR);
            $query->bindValue(':date_de_retour', $dateDeRetour, PDO::PARAM_STR);

            $query->execute();

            echo $erreur;
            header("Location:./formulaire.php");
        } else {
            $erreur["photo"] = "Cette photo existe déjà";

            $erreur = serialize($erreur); // transforme un tableau en chaine de caratère

            header("Location:./formulaire?er=$erreur");
        }
    } else {
        //$er ="il y a une erreur"; plus nécessaire c'est pour tester si on vois une erreur en remplaçant $erreur ici header("Location:../formulaire?er=$erreur");
        $erreur = serialize($erreur); // transforme un tableau en chaine de caratère
        //$erreur = unserialize($erreur);
        header("Location:./formulaire?er=$erreur");
    }
}




//  @copyright Thoumire MATHIEU 