<?php
$user = "root";
$password = "";
$dns = "mysql:host=localhost;dbname=neptune";

$bdd = new PDO($dns, $user, $password);

function getRooms($bdd){
    $sth = $bdd->query("SELECT * FROM chambres");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function getTarifs($bdd){
    $sth = $bdd->query("SELECT * FROM tarifs");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}
