<?php
require_once "./functions/functions.php";
require_once "./class/Client.php";
$list_pays = getPays($bdd);
$list_client = getClients($bdd);

if (!empty($_GET["client_id"]) && !empty($_GET["action"])) {
    $client = new Client($_GET["client_id"]);
    $action = $_GET["action"];
    $verif = verifParam(["civilite", "nom", "prenom", "email", "adresse", "codePostal", "ville", "pays"]);
    if ($action == "modify" && $verif) {
        $client->modify();
    } elseif ($action == "delete") {
        $client->delete();
    } elseif ($action == "add" && $verif) {
        $client->add();
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/clients.css">
    <link rel="stylesheet" href="../style/global.css">
    <script src="../script/sidebar.js"></script>
    <script src="../script/slider.js"></script>
    <script src="./scripts/functions.js"></script>
    <title>Neptune ADMIN</title>
</head>

<body>
    <?php include "./components/sidebar.html"; ?>
    <?php include "./components/navbar.html"; ?>
    <div onclick="closesidebar()" class="content">

        <h1 class="title">Client panel</h1>
        <div class="clientpannel">
            <input class="searchbar" type="search" id="search" onkeyup="search()" placeholder="Search for names..">
            <div class="categoryline">
                <span class="civilite">Civilité</span>
                <span class="nom">Nom</span>
                <span class="prenom">Prenom</span>
                <span class="email">Email</span>
                <span class="adresse">adresse</span>
                <span class="codePostal">Code postal</span>
                <span class="ville">Ville</span>
                <span class="pays">Pays</span>
                <span class="catbtn"></span>
            </div>
            <ul class="clientlist">
                <li>
                    <form class="addclientline" method="post" action="?action=add">
                        <select class="civilite" name="civilite">
                            <option value="Mademoiselle">Mademoiselle</option>
                            <option value="Madame">Madame</option>
                            <option value="Monsieur">Monsieur</option>
                        </select>
                        <input class="nom" type="text" name="nom">
                        <input class="prenom" type="text" name="prenom">
                        <input class="email" type="text" name="email">
                        <input class="adresse" type="text" name="adresse">
                        <input class="codePostal" type="text" name="codePostal">
                        <input class="ville" type="text" name="ville">
                        <select class="pays" name="pays">
                            <?php foreach ($list_pays as $pays) : ?>
                                <option value="<?= $pays["id"]; ?>"> <?= $pays["nom"]; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <input class="addclientbtn" type="submit" value="Ajouter">
                    </form>
                    <?php
                    if (array_key_exists("action", $_GET)) {
                        if ($_GET["action"] == "add") {
                            echo $errorAdd;
                        }
                    }
                    ?>
                </li>
                <?php foreach ($list_client as $client) : ?>
                    <li class="clientline">
                    <form method="post" action="?client_id=<?= $client["id"]; ?>&action=modify">
                        <select class="civilite" name="civilite">
                            <option value="Mademoiselle" <?= "Mademoiselle" == $client["civilite"] ? "selected" : ""; ?>>Mademoiselle</option>
                            <option value="Madame" <?= "Madame" == $client["civilite"] ? "selected" : ""; ?>>Madame</option>
                            <option value="Monsieur" <?= "Monsieur" == $client["civilite"] ? "selected" : ""; ?>>Monsieur</option>
                        </select>
                        <input class="nom" type="text" name="nom" value="<?= $client["nom"] ?>" required="required">
                        <input class="prenom" type="text" name="prenom" value="<?= $client["prenom"] ?>" required="required">
                        <input class="email" type="text" name="email" value="<?= $client["email"] ?>" required="required">
                        <input class="adresse" type="text" name="adresse" value="<?= $client["adresse"] ?>" required="required">
                        <input class="codePostal" type="text" name="codePostal" value="<?= $client["codePostal"] ?>" required="required">
                        <input class="ville" type="text" name="ville" value="<?= $client["ville"] ?>" required="required">
                        <select class="pays" name="pays">
                            <?php foreach ($list_pays as $pays) : ?>
                                <option value="<?= $pays["id"]; ?>" <?= $pays["id"] == $client["pays_id"] ? "selected" : ""; ?>> <?= $pays["nom"]; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <input class="saveBtn" type="submit" value="Modifier">
                    </form>

                        <div class="moreicon">
                            <a href="./reservations.php?client_id=<?= $client['id'] ?>"><span class="material-icons-round" style="color: var(--primary-color);">event</span></a>
                            <span onclick="deleteConfirm(<?= $client['id'] ?>)" class="material-icons-round deleteoption">delete</span>
                        </div>
                        <div class="itemicon">
                            <span class="material-icons-round oneicons">edit</span>
                        </div>
                        <div class="select">
                            <a href="./reservations.php?client_id=<?= $client['id'] ?>"><span class="selectoption">Ses reservations</span></a>
                            <br>
                            <span  class="selectoption deleteoption">Delete</span>
                        </div>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</body>

</html>