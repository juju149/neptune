<?php
//connexion BDD
require_once '../functions.php';
$mesg_error = "";

//recuperation info page inscription
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['civility']) && !empty($_POST['adresse'])  && !empty($_POST['ville']) && !empty($_POST['code_postal'])&& !empty($_POST['pays_id']))
{
    $name = htmlspecialchars($_POST['nom']);
    $surname = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);
    $civility = htmlspecialchars($_POST['civility']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $ville = htmlspecialchars($_POST['ville']);
    $postal_code = htmlspecialchars($_POST['code_postal']);
    $pays_id = htmlspecialchars($_POST['pays_id']);

    $check = $bdd->query("SELECT email FROM clients WHERE email = '$email'");
    $row = $check->rowCount();

    $email = strtolower($email);
    
    if($row == 0){
        if(strlen($name) <= 100 && strlen($surname) <= 70 && strlen($email) <= 200 && filter_var($email, FILTER_VALIDATE_EMAIL)){
                if($password === $password_retype){

                    $password = password_hash($password, PASSWORD_BCRYPT);

                    $insert = $bdd->prepare('INSERT INTO clients(nom, prenom, email, password, civilite, adresse, ville, codePostal, pays_id) VALUES(:nom, :prenom, :email, :password, :civilite, :adresse, :ville, :codePostal, :pays_id)');
                    $insert->execute(array(  
                        'nom' => $name,
                        'prenom' => $surname,
                        'email' => $email,
                        'password' => $password,
                        'civilite' => $civility,
                        'adresse' => $adresse,
                        'ville' => $ville,
                        'codePostal' => $postal_code,
                        'pays_id' => $pays_id
                    ));
                    header('Location: form_connexion.php');
                    die();
                }else{ header('Location: inscription.php?reg_err=password'); die();}
        }else{ die();}
    }else{ header('Location: inscription.php?reg_err=already'); die();}
}


