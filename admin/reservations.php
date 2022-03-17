<?php
require 'functions.php';
$reservation = getReservation($bdd);
modifyPlaning($bdd);
deletePlanning($bdd);
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
        <h1 class="title">Les réservations</h1>
        <div class="clientpannel" style="max-width: 1000px;">
            <?php if (!$reservation || empty($reservation)) : ?>
                Il n y a pas de reservation
            <?php else : ?>
                <div class="categoryline">
                    <span class="civilite">Chambre ID</span>
                    <span class="nom">Jour</span>
                    <span class="prenom">Acompte</span>
                    <span class="email">Un rat ? (paye)</span>
                    <span class="catbtn"></span>
                </div>
                <ul class="clientlist">
                    <?php foreach ($reservation as $r) : ?>
                        <li class="clientline">
                            <form action="/client.php/?client_id=<?= $_GET["client_id"] ?>&action=modify&chambre_id=<?= $r["chambre_id"] ?>&jour=<?= $r["jour"] ?>" method="post">
                                <div><?= $r["chambre_id"] ?></div>
                                <div style="text-transform: lowercase;"><?= date("F j, Y", strtotime($r["jour"])) ?></div>
                                <select name="acompte">
                                    <option value="1" <?= $r["acompte"] == "1" ? "selected" : "" ?>>Oui</option>
                                    <option value="2" <?= $r["acompte"] == "0" ? "selected" : "" ?>>Non</option>
                                </select>
                                <select name="paye">
                                    <option value="1" <?= $r["paye"] == "1" ? "selected" : "" ?>>Oui</option>
                                    <option value="2" <?= $r["paye"] == "0" ? "selected" : "" ?>>Non</option>
                                </select>
                                <input class="saveBtn" type="submit" value="Modifier">
                            </form>
                            <div class="moreicon">
                                <span class="material-icons-round deleteoption" onclick="deletePlanning(<?= $_GET['client_id'] ?>, <?= $r['chambre_id'] ?>, '<?= $r['jour'] ?>')">delete</span>
                            </div>
                            
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>