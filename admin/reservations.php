<?php
require_once "./functions/functions.php";
require_once "./class/Client.php";
if (!empty($_GET["client_id"])) {
    $client = new Client($_GET["client_id"]);
    $reservation = $client->reservation();
    $list_chambres = getChambres($bdd);
    if (!empty($_GET["action"])) {
        $verifPost = verifParam(post_list: ["chambre_id", "jour", "acompte", "paye"]);
        $verifGet = verifParam(get_list: ["chambre_id", "jour"]);
        $action = $_GET["action"];
        if ($action == "add" && $verifPost) {
            $err = $client->addReservation();
        } elseif ($action == "delete" && $verifGet) {
            $client->deleteReservation();
        } elseif ($action == "modify" && $verifGet) {
            $client->modifyPlaning();
        }
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
        <h1 style="text-align: center;">Les réservations</h1>
        <div class="clientpannel" style="max-width: 1000px;">
            <div class="categoryline">
                <span class="civilite">Chambre info</span>
                <span class="nom">Jour</span>
                <span class="prenom">Acompte</span>
                <span class="email">Un rat ? (paye)</span>
                <span class="catbtn"></span>
                <span class="catbtn"></span>
            </div>
            <ul class="clientlist">
                <li class="clientline">
                    <form action="/reservation.php/?client_id=<?= $_GET["client_id"] ?>&action=add" method="post">
                        <select name="chambre_id" id="">
                            <?php foreach ($list_chambres as $chambre) : ?>
                                <option value="<?= $chambre["id"] ?>">capacité: <?= $chambre["capacite"] ?> <br> exposition: <?= $chambre["exposition"] ?> || douche: <?= $chambre["douche"] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="date" name="jour">
                        <select name="acompte">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                        <select name="paye">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                        <input class="addclientbtn" type="submit" value="Ajouter">
                        <span class="catbtn"></span>
                        <?= !empty($err) ? "$err" : "" ?>
                    </form>

                </li>
                <?php if (!$reservation || empty($reservation)) : ?>
                    Il n y a pas de reservation
                <?php else : ?>
                    <?php foreach ($reservation as $r) : ?>
                        <?php
                        $chambre_id = $r["chambre_id"];
                        $chambre = $bdd->query("SELECT * FROM chambres WHERE id = $chambre_id");
                        $chambre = $chambre->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <li class="clientline">

                            <form action="/reservation.php/?client_id=<?= $_GET["client_id"] ?>&action=modify&chambre_id=<?= $r["chambre_id"] ?>&jour=<?= $r["jour"] ?>" method="post">
                                <div class="textInfo">Capacité : <?= htmlentities($chambre[0]["capacite"]) ?> Exposition : <?= htmlentities($chambre[0]["exposition"]) ?> Douche : <?= htmlentities($chambre[0]["douche"]) ?>
                                </div>
                                <div style="text-transform: lowercase;"><?= date("F j, Y", strtotime($r["jour"])) ?></div>
                                
                                
                                <select name="acompte">
                                    <option value="1" <?= $r["acompte"] == "1" ? "selected" : "" ?>>Oui</option>
                                    <option value="0" <?= $r["acompte"] == "0" ? "selected" : "" ?>>Non</option>
                                </select>
                                <select name="paye">
                                    <option value="1" <?= $r["paye"] == "1" ? "selected" : "" ?>>Oui</option>
                                    <option value="0" <?= $r["paye"] == "0" ? "selected" : "" ?>>Non</option>
                                </select>
                                <input class="saveBtn" type="submit" value="Modifier">
                                <button class="deleteButton" onclick="deletePlanning(<?= $_GET['client_id'] ?>, <?= $r['chambre_id'] ?>, '<?= $r['jour'] ?>')" type="button">Supprimer</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
</body>

</html>