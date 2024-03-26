<?php
    $maintenance = true;

    if ($maintenance) {
        include 'maintenance.php';
        exit();
    }
    $pageTitle = "Ponuka";
    require_once ('partials/header.php');
?>
<?php require_once ('./config/connection.php'); ?>

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
                        <?php $stmt = $conn->prepare("SELECT name, image FROM tb_upload ORDER BY id DESC"); ?>
                        <?php 
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($row = $result->fetch_assoc()) :
                        ?>
                        <div class="box-items">
                            <h1><?= htmlspecialchars($row["name"]); ?></h1>
                            <img class="img-click" src="./config/tmp/<?= htmlspecialchars($row['image']); ?>" onclick="openModal('<?= htmlspecialchars($row['image']); ?>')" width="300" height="300" title="<?= htmlspecialchars($row['image']); ?>">
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </section>
        <div id="imageModal" class="modal" onclick="closeModal(event)">
            <img class="modal-content" id="fullSizeImage">
            <div id="caption"></div>
        </div>
    </main>
    <script>
        function openModal(imageName) {
            let modal = document.getElementById("imageModal");
            let modalImg = document.getElementById("fullSizeImage");
            let captionText = document.getElementById("caption");
            let imagePath = "./config/tmp/" + imageName;
            modal.style.display = "block";
            modalImg.src = imagePath;
        }

        function closeModal(event) {
            if (event.target.classList.contains("modal") || event.target.classList.contains("close")) {
            let modal = document.getElementById("imageModal");
            modal.style.display = "none";
        }
    }
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<?php require_once ('./partials/footer.php') ?>
</body>
</html>