<?php
    $pageTitle = "Novinky";
    require_once ('partials/header.php')
?>
<?php require_once ('./config/connection.php'); ?>
<?php
    $pageTitle = "Novinky";
?>
        <section class="news">
            <h1>Novinky</h1>
            <div class="products-items">
                <div class="box">
                <?php $stmt = $conn->prepare("SELECT name, image FROM upload_news ORDER BY id DESC"); ?>
                        <?php 
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($row = $result->fetch_assoc()) :
                        ?>
                        <div class="box-items">
                            <h1><?= htmlspecialchars($row["name"]); ?></h1>
                            <img class="img-click" src="./config/tmp-img-news/<?= htmlspecialchars($row['image']); ?>" width="300" height="300" title="<?= htmlspecialchars($row['image']); ?>">
                        </div>
                        <?php endwhile; ?>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<?php require_once ('./partials/footer.php') ?>
</body>
</html>