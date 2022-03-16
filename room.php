<php ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <link rel="stylesheet" href="./style/global.css">
        <link rel="stylesheet" href="./style/room.css">
        <script src="./script/sidebar.js"></script>
        <script src="./script/slider.js"></script>
    </head>

    <body>
        <?php include "./components/sidebar.html"; ?>
        <?php include "./components/navbar.html"; ?>

        <div onclick="closesidebar()" class="content">
            <div class="roombox">
                <div class="left">
                    <section class="roomslides">

                        <div class="container">
                            <span id="previous" class="material-icons-round icons menuicon">chevron_left</span>
                            <span id="next" class="material-icons-round icons menuicon">chevron_right</span>
                    
                        <div id="slider" class="slider">
                            <img src="./assets/Duplex_1-hotel-neptune-berck_sur_mer.jpg" alt="">
                            <img src="./assets/Hotel-Neptune-Berck-Vue-Mer-PMR-1.jpg" alt="">
                            <img src="./assets/IMG_3753_copie_2.jpg" alt="">
                            <img src="./assets/hotel_neptune_burck_chanbre_terrasse_vue_mer_4.jpg" alt="">
                            <img src="./assets/Studio2p_1-hotel-neptune-berck_sur_mer.jpg" alt="">
                        </div>
                        </div>
                    
                    <section>
                    <div class="description">
                        <span><span class="bold">Etage:</span> 3</span>
                        <br>
                        <span><span class="bold">Max capacity (pers):</span> 2</span>
                        <br>
                        <span><span class="bold">Eposition:</span> view on sea</span>
                    </div>
                    
                </div>
                <div class="right">
                    <div style="display: flex;justify-content: space-between;align-items: flex-end;">
                        <h1>Price</h1>
                        <div class="price">
                            92,00€
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
        
    </body>

</php>