<?php
try {
    $user = "root";
    $password = "";
    $dns = "mysql:host=localhost;dbname=neptune";
    //mdp: Neptune1

    $bdd = new PDO($dns, $user, $password);
} catch (Exception $e) {
    die('Erreur'.$e->getMessage());
}

function getRooms($bdd){
    $sth = $bdd->query("SELECT * FROM chambres");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function getTarifs($bdd){
    $sth = $bdd->query("SELECT * FROM tarifs");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function getPays ($bdd) {
    $pays = $bdd->query('SELECT * from pays');
    return $pays->fetchAll(PDO::FETCH_ASSOC);
}

function searchRoom($bdd, $date_start, $date_end, $capacity){
    if (!empty($capacity)) {
        $rooms =  $bdd->query("SELECT DISTINCT id, capacite, exposition, douche, etage, tarif_id FROM chambres INNER JOIN planning ON planning.chambre_id=chambres.id WHERE capacite = '$capacity' AND jour NOT BETWEEN '$date_start' AND '$date_end'"); 
    }
    else {
        $rooms =  $bdd->query("SELECT DISTINCT id, capacite, exposition, douche, etage, tarif_id FROM chambres INNER JOIN planning ON planning.chambre_id=chambres.id WHERE jour NOT BETWEEN '$date_start' AND '$date_end'"); 
    }
   
    return $rooms->fetchALl(PDO::FETCH_ASSOC);
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}