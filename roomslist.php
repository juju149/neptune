<?php
require "./functions.php";
$tarifs_list = getTarifs($bdd);
$rooms_list = getRooms($bdd);
$date_start = htmlspecialchars($_GET["date_start"]);
$date_end = htmlspecialchars($_GET["date_end"]);
$capacity = htmlspecialchars($_GET["capacity"]);
$rooms = searchRoom($bdd, $date_start , $date_end, $capacity);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="./style/global.css">
    <link rel="stylesheet" href="./style/roomlist.css">
    <script src="./script/navbar.js"></script>
    <script src="./script/sidebar.js"></script>
    <style>
        header{
            background-color: var(--background-color);
            box-shadow: 0px 5px 40px 0px rgba(0,0,0,0.35);  
        }
    </style>
</head>

<body>
    <?php include "./components/sidebar.html"; ?>
    <?php include "./components/navbar.html"; ?>

    <div onclick="closesidebar()" class="content">

        <form class="findroom" method="GET" action="./roomslist.php">
            <div class="option">
                <div class="optionlLabel">De</div>
                <input type="date" name="date_start" id="date_start" value="<?= $date_start ?>">
            </div>
            <div class="option">
                <div class="optionlLabel">A</div>
                <input type="date" name="date_end" id="date_end" value="<?= $date_end ?>">
            </div>
            <div class="option">
                <div class="optionlLabel">Personne</div>
                <select value="<?= $capacity ?>" name="capacity" class="value">
                    <option value="" <?= empty($capacity) ? "selected" : ""; ?>>N'importe</option>
                    <option value="2" <?= $capacity == 2 ? "selected" : ""; ?>>2</option>
                    <option value="3" <?= $capacity == 3 ? "selected" : ""; ?>>3</option>
                    <option value="4" <?= $capacity == 4 ? "selected" : ""; ?>>4</option>
                </select>
            </div>
            <div>
                <input type="submit" class="findroombutton" value="Find room"></input>
            </div>
        </form>

        <div class="roomsList">
            <?php if (!empty($rooms)) { ?>
                
                
                <?php foreach ($rooms as $room) : ?>
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
                <?php }else{ ?>
                    <lottie-player style="position: absolute;left: 50%;top: 50%;transform: translate(-50%,-50%);width: 40vw" src="./assets/lotties/lf30_editor_qryajg8h.json"  background="transparent"  speed="1"  loop  autoplay></lottie-player>
                <?php } ?>
        </div>

    </div>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>

</html>