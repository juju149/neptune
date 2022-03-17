<?php
$user = "root";
$password = "";
$dns = "mysql:host=localhost;dbname=neptune";

$bdd = new PDO($dns, $user, $password);

function verifParam($get_list = [], $post_list = [])
{

    foreach ($post_list as $field) {
        if (!array_key_exists($field, $_POST)) {
            return false;
        }
        if (empty($_POST[$field])) {
            return false;
        }
    }

    foreach ($get_list as $field) {
        if (!array_key_exists($field, $_GET)) {
            return false;
        }
        if (empty($_GET[$field])) {
            return false;
        }
    }

    return true;
}

function modifyPlaning($bdd)
{
    $verif = verifParam(array("client_id", "action", "chambre_id", "jour"), array("acompte", "paye"));
    if (!$verif) {
        return false;
    }
    if ($_GET["action"] != "modify") {
        return false;
    }
    $client_id = $_GET["client_id"];
    $chambre_id = $_GET['chambre_id'];
    $jour = $_GET['jour'];
    $acompte = $_POST['acompte'] == "2" ? "0" : "1";
    $paye = $_POST['paye'] == "2" ? "0" : "1";
    $bdd->query("UPDATE planning SET acompte = '$acompte', paye = '$paye' WHERE chambre_id = '$chambre_id' AND jour = '$jour' AND client_id = '$client_id' ");
    header("Location: /client.php/?client_id=$client_id");
}


function modifyClient($bdd)
{


    $verif = verifParam(array("id", "action"), array("civilite", "email", "nom", "prenom", "adresse", "codePostal", "ville", "pays"));

    if (!$verif) {
        return false;
    }
    if ($_GET["action"] != "modify") {
        return false;
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
    $verif = verifParam(array("action"), array("civilite", "email", "nom", "prenom", "adresse", "codePostal", "ville", "pays"));
    if (!$verif) {
        return false;
    }
    if ($_GET["action"] != "add") {
        return false;
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

function getReservation($bdd)
{
    $verif = verifParam(["client_id"]);
    if (!$verif) {
        return false;
    }

    $client_id = $_GET["client_id"];
    $sth = $bdd->query("SELECT * FROM planning WHERE client_id = $client_id");
    return $sth->fetchALl(PDO::FETCH_ASSOC);

    return false;
}

function deleteClient($bdd)
{
    $verif = verifParam(array("id", "action"));
    if (!$verif) {
        return false;
    }
    if ($_GET["action"] != "delete") {
        return false;
    }

    $id = $_GET["id"];
    $bdd->query("DELETE FROM planning WHERE client_id = $id");
    $bdd->query("DELETE FROM clients WHERE id = $id");
    header('Location: /');
}

function deletePlanning($bdd)
{
    $verif = verifParam(array("client_id", "action", "chambre_id", "jour"));
    if (!$verif) {
        return false;
    }
    if ($_GET["action"] != "delete") {
        return false;
    }

    $client_id = $_GET["client_id"];
    $chambre_id = $_GET["chambre_id"];
    $jour = $_GET["jour"];
    $bdd->query("DELETE FROM planning WHERE client_id = $client_id AND chambre_id = $chambre_id AND jour = '$jour'");
    header("Location: /client.php/?client_id=$client_id");
}
