<?php
require "./functions.php";
$tarifs_list = getTarifs($bdd);
$rooms_list = getRooms($bdd);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="./style/global.css">
    <link rel="stylesheet" href="./style/home.css">
    <script src="./script/navbar.js"></script>
    <script src="./script/sidebar.js"></script>
</head>

<body>
    <?php include "./components/sidebar.html"; ?>
    <div class="autoshow"></div>
    <?php include "./components/navbar.html"; ?>

    <div onclick="closesidebar()" class="content">

        <div class="banner header">
            <img class="headerImg"
                src="./assets/interior-wall-mockup-with-sofa-cabinet-living-room-with-empty-white-wall-background-3d-rendering.jpg"
                alt="">
            <div class="headerInfo">
                <h2 class="hotelName">Neptune</h2>
                <h1 class="sloganHeader">Reservez dés maintenant</h1>
            </div>
        </div>

        <form class="findroom" method="GET" action="./roomslist.php">
            <div class="option">
                <div class="optionlLabel">De</div>
                <input type="date" min="" name="date_start" id="date_start">
            </div>
            <div class="option">
                <div class="optionlLabel">A</div>
                <input type="date" name="date_end" id="date_end">
            </div>
            <div class="option">
                <div class="optionlLabel">Personne</div>
                <select name="capacity" class="value">
                    <option value="">N'importe</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div>
                <input type="submit" class="findroombutton" value="Find room"></input>
            </div>
        </form>

        <div style="margin-top: 300px;" class="banner videoBanner">
            <div class="video">
                <img class="videoImage" src="./assets/pexels-pixabay-271639 (1).jpg" alt="">
            </div>
            <div class="videoInfo">
                <h2 class="hotelName">Vacances de rêve</h2>
                <h1 class="sloganVideo">Vivez une experience de rêve dans un hotel de qualité</h1>
                <br>
                <button>View more</button>
            </div>
        </div>

        <div class="roomsList">
            <div class="roomInfo">
                <h2 class="hotelName">Toutes nos chambres</h2>
                <h1 class="roomText">Quelques fabuleuses offres de nos meilleurs chambres, vous pourai bientôt y
                    être en clickant sur les bouttons ci-dessous !</h1>
                <br>
                <button>View all</button>
            </div>
            <?php foreach ($rooms_list as $room) : ?>
                
                    <div class="room">
                        <a style="text-decoration: none;color: var(--font-color)" href="./room.php?id=<?= $room["id"] ?>">
                            <img class="roomImage" src="https://picsum.photos/id/<?= $room["id"]+random_int(1,200) ?>/800" alt="">
                            <div class="singleroominfo">
                                <span class="titleRoom"><?= $room["id"] ?></span>
                                <span class="roomPrice">
                                    <?php foreach ($tarifs_list as $tarif) : ?>
                                        <span> <?= $tarif["id"] == $room["tarif_id"] ? $tarif["prix"].'€ par nuit' : ""; ?></span>
                                    <?php endforeach; ?>  
                                </span>
                            
                                    <br>
                                <a href="./room.php?id=<?= $room["id"] ?>"><button class="roombutton">Book now</button></a>
                            
                            </div>
                        </a>
                    </div>
                
            <?php endforeach; ?>
        </div>

        <div class="contactBanner">
            <h2>Touchez en un mot</h2>
            <span>Joignez nous par mail pour recevoir nos offres speciales</span>
            <br><br><br>
            <div>
                <input class="emailInput" type="email" name="email" id="">
            </div>
            <br><br><br>
            <button>send</button>
        </div>

        <div class="footer">

        </div>

    </div>

</body>

</html>