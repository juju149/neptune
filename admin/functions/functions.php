<?php
$user = "root";
$password = "";
$dns = "mysql:host=localhost;dbname=neptune";

$bdd = new PDO($dns, $user, $password);

function verifParam($post_list = [], $get_list = [])
{
    foreach ($post_list as $field) {
        if (!array_key_exists($field, $_POST)) {
            return false;
        }
    }
    foreach ($get_list as $field) {
        if (!array_key_exists($field, $_GET)) {
            return false;
        }
    }  
    return true;
}


function getPays($bdd)
{
    $sth = $bdd->query("SELECT * FROM pays", PDO::FETCH_ASSOC);
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function getClients($bdd)
{
    $sth = $bdd->query("SELECT * FROM clients");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function getChambres($bdd)
{
    $sth = $bdd->query("SELECT * FROM chambres");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function getTarifs($bdd)
{
    $sth = $bdd->query("SELECT * FROM tarifs");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}
