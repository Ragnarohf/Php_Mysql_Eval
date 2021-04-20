<?php
// j'appelle une fois mon PDO qui est la connexion a ma base de données
require_once("./inc/pdo.php");

// function requetes MySQl

// functions courantes

//functions d'erreur

// je pose mon tableau d'erreur
$erreur = [];
//gestion erreur champs => créee une div avec la class 'error' voir CSS
function error($input)
{
    global $erreur;

    if (array_key_exists("$input", $erreur)) {
        echo "<div class='error'>" . $erreur[$input] . "</div>";
    }
}

//functions de verifications de mes inputs pour evitez toute injection SQL et savoir si je recupere les bonnes données
function verifInput($input, $obligatoire = false, $type = false)
// ici deux parametres optionnels, le param $obligatoire et le param $type, le param $input correspond a mon champ, la où mon utilisateur ecris 
{
    global $erreur; //je récupère le tableau d'erreur
    //je verifie toujours que mes données $_POST ne soit pas vide et existe
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

            default:

                $retour = "";
                break;
        }
    }
    return $retour;
}
//  @copyright Thoumire MATHIEU 