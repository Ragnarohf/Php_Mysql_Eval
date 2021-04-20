<?php
require_once("./inc/pdo.php");
// function requetes MySQl

// functions courantes
function error($input)
{
    global $erreur;

    if (array_key_exists("$input", $erreur)) {
        echo "<div class='error'>" . $erreur[$input] . "</div>";
    }
}
//  @copyright Thoumire MATHIEU 