<?php require_once ('../zelez-vaclav/partials/header.php'); ?>
<?php require_once ('../zelez-vaclav/config/connection.php'); ?>
    <div class="popup">
        <div class="popup-content">
            <h1>X</h1>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM notifications ORDER BY id DESC LIMIT 1");
            $lastNotification = mysqli_fetch_assoc($result);
            ?>
            <?php if ($lastNotification): ?>
                <p><?= htmlspecialchars($lastNotification["notification"]); ?></p>
            <?php endif; ?>

            <h2>Železiarstvo <span>VÁCLAV</span></h2>
        </div>
    </div> -->
        <section class="info">
            <div class="heading">
                <h1>Železiarstvo <strong>Václav</strong></h1>
                <p>Požičovňa a predaj nástrojov</p>
            </div>
            <div class="row">
                <div class="column">
                    <img class="image" src="img/banner-info.png" alt="info-banner">
                </div>
                <div class="column">
                    <img class="image" src="img/info-building.png" alt="info-building">
                </div>
            </div>
        </section>

        <section class="our-offer">
            <div class="offer">
                <h2>Naša Ponuka</h2>
                <div class="slider">
                    <div class="slide-track">
                        <div class="slide">
                            <img class="image" src="../zelez-vaclav/img/slide-img/rems.png" alt="">
                        </div>
                        <div class="slide">
                            <img class="image" src="../zelez-vaclav/img/slide-img/makita.png" alt="">
                        </div>
                        <div class="slide">
                            <img class="image" src="../zelez-vaclav/img/slide-img/bosch.png" alt="">
                        </div>
                        <div class="slide">
                            <img class="image" src="../zelez-vaclav/img/slide-img/dewalt.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/slide-img/narex.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/slide-img/fischer.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/test.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/test.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/test.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/test.png" alt="">
                        </div>

                        <div class="slide">
                            <img src="../zelez-vaclav/img/slide-img/rems.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/slide-img/makita.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/slide-img/bosch.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/slide-img/dewalt.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/slide-img/narex.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/slide-img/fischer.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/test.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/test.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/test.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="../zelez-vaclav/img/test.png" alt="">
                        </div>
                    </div>
                </div>
        </section>

        <section class="about-us">
            <h2>Niečo o nás</h2>
            <div class="container">
                <img src="../zelez-vaclav/img/logo-img.png" alt="">
                <p>
                    Predajňa bola otvorená začiatkom roka 2010 a vďaka našim zákazníkom fungujeme dodnes.
                    Vďaka spolupráci s našimi dodávateľmi, dokážeme podľa požiadaviek zákazníka zabezpečiť široký záber sortimentu.
                    Prioritou je pre nás spokojný zákazník a tomu podmieňujeme aj našu každodennú prácu.
                    V prípade potreby nás neváhajte kontaktovat.
                </p>
            </div>
        </section>
    </main>

    <?php require_once ('../zelez-vaclav/partials/footer.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>