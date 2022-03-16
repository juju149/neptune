<php ?>

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

            <div class="findroom">
                <div class="option">
                    <div class="optionlLabel">De</div>
                    <input type="date" name="dateofbirth" id="dateofbirth">
                </div>
                <div class="option">
                    <div class="optionlLabel">A</div>
                    <input type="date" name="dateofbirth" id="dateofbirth">
                </div>
                <div class="option">
                    <div class="optionlLabel">Personne</div>
                    <span class="value">2 Adults 1 enfant</span>
                </div>
                <div>
                    <button class="findroombutton">Find room</button>
                </div>
            </div>

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
                <div class="room">
                    <img class="roomImage" src="./assets/Duplex_1-hotel-neptune-berck_sur_mer.jpg" alt="">
                    <div class="singleroominfo">
                        <span class="titleRoom">Duplex</span>
                        <span class="roomPrice">107€ par nuit</span>
                        <br>
                        <button class="roombutton">Book now</button>
                    </div>
                </div>
                <div class="room">
                    <img class="roomImage" src="./assets/IMG_3753_copie_2.jpg" alt="">
                    <div class="singleroominfo">
                        <span class="titleRoom">Lux Room</span>
                        <span class="roomPrice">90€ par nuit</span>
                        <br>
                        <button class="roombutton">Book now</button>
                    </div>
                </div>
                <div class="room">
                    <img class="roomImage" src="./assets/hotel_neptune_burck_chanbre_terrasse_vue_mer_4.jpg" alt="">
                    <div class="singleroominfo">
                        <span class="titleRoom">Burck</span>
                        <span class="roomPrice">98€ par nuit</span>
                        <br>
                        <button class="roombutton">Book now</button>
                    </div>
                </div>
                <div class="room">
                    <img class="roomImage" src="./assets/Hotel-Neptune-Berck-Vue-Mer-PMR-1.jpg" alt="">
                    <div class="singleroominfo">
                        <span class="titleRoom">Berck</span>
                        <span class="roomPrice">128€ par nuit</span>
                        <br>
                        <button class="roombutton">Book now</button>
                    </div>
                </div>
                <div class="room">
                    <img class="roomImage" src="./assets/Studio2p_1-hotel-neptune-berck_sur_mer.jpg" alt="">
                    <div class="singleroominfo">
                        <span class="titleRoom">Studio 2p</span>
                        <span class="roomPrice">90€ par nuit</span>
                        <br>
                        <button class="roombutton">Book now</button>
                    </div>
                </div>
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

</php>