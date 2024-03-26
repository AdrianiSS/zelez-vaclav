<?php
    $maintenance = true;

    if ($maintenance) {
        include 'maintenance.php';
        exit();
    }
    $pageTitle = "Kontakt";
    require_once ('partials/header.php');
?>
        <section class="contact-info">
            <h1>Železiarstvo VÁCLAV</h1>
            <div class="adress">
                <address>
                    <h3 class="heading">Radoslav Václav<br>Železiarstvo VÁCLAV<br>Korešp. adresa<br>Sad Kpt. Nálepku 46-11/ 18<br>018 51 Nová Dubnica<br>Slovenská republika</h3>
                    <h3 class="opening-hours">OTVÁRACIE HODINY:<br>Pondelok - Piatok: 7.00 - 16.00h<br>Sobota: 8.00 - 11.00h</h3>
                </address>
            </div>
            <div class="info-map">
                <p>
                    Prevádzka<br>
                    Centrum II 1762/ 71<br>
                    018 41 Dubnica nad Váhom<br>
                    IČO: 45 385 670<br>
                    DIČ: 1071645850<br>
                    IČ DPH: SK1071645850<br>
                    Živnostenský register Obvodný úrad Trenčín č. 350-29286<br>
                    Mob.: +421 948 848 014<br>
                    Skype: zeleziarstvo.vaclav<br>
                    E-mail: info@zeleziarstvovaclav.sk
                </p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2619.6828478667517!2d18.175442512383675!3d48.95952457122644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4714984991a241c7%3A0xecf5e52b988c7341!2zxb1lbGV6aWFyc3R2byBWw6FjbGF2!5e0!3m2!1ssk!2ssk!4v1698961031069!5m2!1ssk!2ssk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <?php require_once ('./partials/footer.php') ?>
</body>
</html>