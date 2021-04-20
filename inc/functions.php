<?php
require_once("./inc/pdo.php");
// function requetes MySQl

// functions courantes
//functions d'erreur
$erreur = [];
function error($input)
{
    global $erreur;

    if (array_key_exists("$input", $erreur)) {
        echo "<div class='error'>" . $erreur[$input] . "</div>";
    }
}
//functions de verifications de mes inputs 
function verifInput($input, $obligatoire = false, $type = false)
{
    global $erreur; //je récupère le tableau d'erreur
    if (!empty($_POST[$input]) && isset($_POST[$input])) {
        $retour = trim(strip_tags($_POST[$input]));
    } else {
        // je gère ici le champ obligatoire si $obligatoire = true
        $retour = "";
        if ($obligatoire) {
            $retour = "";
            $erreur[$input] = "Le champ $input n'est pas rempli.";
        }
    }
    // je gère ici le type de ma variable à envoyer dans la base
    if ($type && $retour !== "") {

        switch ($type) {
            case 'integer':
                $patern = "@[0-9]@";
                if (!preg_match($patern, $retour)) {
                    $erreur[$input] = "Le champ $input n'est pas au bon format.";
                } else {
                    $retour = intval($retour);
                }
                break;
            case 'string':
                $retour = strval($retour);
                break;
                // autres case possibles : array,object,boolean,NULL,...
            default:
                # code...
                $retour = "";
                break;
        }
    }
    return $retour;
}
//  @copyright Thoumire MATHIEU 