<?php require ('../zelez-vaclav/partials/header.php'); ?>
<?php require ('../zelez-vaclav/config/connection.php'); ?>
        <section class="products">
            <h1>Produkty</h1>
            <div class="products-container">
                <p>
                - spojovací a kotviaci materiál Mungo, Fischer ...<br>
                - železiarsky tovar, poštové schránky ...<br>
                - elektrické náradie Makita, Ferm ...<br>
                - komunálne ručné náradie, kliešte, kľúče, kufre ... <br>
                Wiha, Knipex, Jonnesway, Stanley, Sola ...<br>
                - zdvíhacia a upínacia technika, rebríky<br>
                - zváracia technika<br>
                </p>
                <p>
                - vŕtacia a rezná technika <br>
                - stavebná chémia Cyklon, Soudal ...<br>
                - ochranné pracovné pomôcky rukavice, okuliare, respirátory ...<br>
                - farby, lazúry, laky, riedidlá ...<br>
                - vodovodné batérie, príslušenstvo Slovarm<br>
                ...
                </p>
            </div>
            <div class="rectangle" style="--width: 10"></div>
            <section class="offer-container">
                <h1>Požičovňa náradia</h1>
                <p>V galérii si môžete vybrať vhodný stroj na zapožičanie. V prípade potreby Vám s výberom ochotne pomôžeme. Tešíme sa na Vašu návštevu.</p>
                <h3>Zapožičať si môžete:</h3>
                <div class="products-items">
                    <div class="box">
                        <?php 
                            $i = 1;
                            $rows = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id DESC");
                        ?>
                        <?php 
                            foreach ($rows as $row) :
                        ?>
                        <div class="box-items">
                            <h1><?php echo $row["name"]; ?></h1>
                            <img class="img-click" src="../zelez-vaclav/tmp/<?php echo $row['image']; ?>" width="300" height="300" title="<?php echo $row['image']; ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </section>
        
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="../zelez-vaclav/js/script.js"></script>
<?php require ('../zelez-vaclav/partials/footer.php') ?>
</body>
</html>