<?php
$user = "root";
$password = "";
$dns = "mysql:host=localhost;dbname=neptune";

$bdd = new PDO($dns, $user, $password);

function verifParam($param)
{
    $required = array("civilite", "email", "nom", "prenom", "adresse", "codePostal", "ville", "pays");

    if (array_key_exists("action", $_GET)) {
        if ($_GET["action"] != $param) {
            return "";
        }
    }

    foreach ($required as $field) {
        if (!array_key_exists($field, $_POST)) {
            return "";
        }
    }

    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            // return "Un champ de peut pas etre vide";
        }
    }
}


function modifyClient($bdd)
{

    if (!array_key_exists("id", $_GET)) {
        return "";
    }

    $verif = verifParam("modify");

    if (is_string($verif)) {
        return $verif;
    }

    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $id = $_GET["id"];
    $bdd->query("UPDATE clients SET civilite = '$civilite', nom = '$nom', prenom = '$prenom', email = '$email', adresse = '$adresse', codePostal = '$codePostal', ville = '$ville', pays_id = '$pays' WHERE id = $id");
    header('Location: /');
}

function addClient($bdd)
{
    $verif = verifParam("add");
    if (is_string($verif)) {
        return $verif;
    }

    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $bdd->query("INSERT INTO clients (civilite, email, nom, prenom, adresse, codePostal, ville, pays_id) VALUES ('$civilite', '$email', '$nom', '$prenom', '$adresse', '$codePostal', '$ville', '$pays')");
    header('Location: /');
}

function getCountry($bdd)
{
    $sth = $bdd->query("SELECT * FROM pays", PDO::FETCH_ASSOC);
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function getClient($bdd)
{
    $sth = $bdd->query("SELECT * FROM clients");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function getRooms($bdd)
{
    $sth = $bdd->query("SELECT * FROM chambres");
    return $sth->fetchALl(PDO::FETCH_ASSOC);
}

function deleteClient($bdd)
{
    if (array_key_exists("id", $_GET) && array_key_exists("action", $_GET)) {
        if (!empty($_GET["id"]) && $_GET["action"] == "delete") {
            $id = $_GET["id"];
            $bdd->query("DELETE FROM planning WHERE client_id = $id");
            $bdd->query("DELETE FROM clients WHERE id = $id");
            header('Location: /');
        }
    }
}
