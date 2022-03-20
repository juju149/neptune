<?php
require_once "./functions/functions.php";
require_once "./functions/function_chambre.php";
$list_chambres = getChambres($bdd);
$list_tarifs = getTarifs($bdd);
if (!empty($_GET["chambre_id"]) && !empty($_GET["action"])) {
    $chambre = new Chambre($_GET["chambre_id"]);
    $verif = verifParam(post_list: ["capacite", "exposition", "douche", "etage", "tarif_id"]);
    $action = $_GET["action"];
    if ($action == "add" && $verif) {
        $chambre->add();
    } elseif ($action == "modify" && $verif) {
        $chambre->modify();
    } elseif ($action == "delete") {
        $chambre->delete();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="./styles/clients.css">
    <link rel="stylesheet" href="../style/global.css">
    <script src="../script/sidebar.js"></script>
    <script src="../script/slider.js"></script>
    <script src="./scripts/functions.js"></script>
    <title>Chambres admin Neptune</title>
</head>

<body>
    <?php include "./components/sidebar.html"; ?>
    <?php include "./components/navbar.html"; ?>
    <div onclick="closesidebar()" class="content">
        <h1 class="title">Rooms panel</h1>
        <div class="clientpannel">
            <br>
            <div class="categoryline">
                <span class="civilite">Capacité</span>
                <span class="nom">Exposition</span>
                <span class="prenom">Douche</span>
                <span class="email">Etage</span>
                <span class="adresse">Tarifs</span>
                <span class="catbtn"></span>
                <span class="catbtn"></span>
            </div>
            <ul class="clientlist">
                <li>
                    <form class="addclientline" action="/chambres.php?chambre_id=new&action=add" method="post">
                        <input type="number" required name="capacite" min="0" required>
                        <input type="text" required name="exposition" required>
                        <input type="number" required name="douche" min="0" required>
                        <input type="number" required name="etage" min="0" required>
                        <select name="tarif_id">
                            <?php foreach ($list_tarifs as $tarif) : ?>
                                <option value="<?= $tarif["id"] ?>"><?= $tarif["prix"] ?> €</option>
                            <?php endforeach; ?>
                        </select>
                        <input class="addclientbtn" type="submit" value="Ajouter" required>
                        <span class="catbtn"></span>
                    </form>
                </li>
                <?php foreach ($list_chambres as $chambre) : ?>
                    <li>
                        <form action="/admin/chambres.php/?chambre_id=<?= $chambre["id"] ?>&action=modify" method="post" required>
                            <input type="number" value="<?= $chambre["capacite"] ?>" name="capacite" min="0" required>
                            <input type="text" value="<?= $chambre["exposition"] ?>" name="exposition" required>
                            <input type="number" value="<?= $chambre["douche"] ?>" name="douche" min="0" required>
                            <input type="number" value="<?= $chambre["etage"] ?>" name="etage" min="0" required>
                            <select name="tarif_id">
                                <?php foreach ($list_tarifs as $tarif) : ?>
                                    <option value="<?= $tarif["id"] ?>" <?= $chambre["tarif_id"] == $tarif["id"] ? "selected" : "" ?>><?= $tarif["prix"] ?> €</option>
                                <?php endforeach; ?>
                            </select>
                            <input class="saveBtn" type="submit" value="Modifier">
                            <button class="deleteButton" onclick="deleteChambre(<?= $chambre['id'] ?>)" type="button">Supprimer</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>