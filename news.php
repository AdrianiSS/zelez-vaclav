<?php require_once ('../zelez-vaclav/partials/header.php') ?>
<?php require_once ('../zelez-vaclav/config/connection.php'); ?>
        <section class="news">
            <h1>Novinky</h1>
            <div class="products-items">
                    <div class="box">
                        <?php 
                            $rows = mysqli_query($conn, "SELECT * FROM upload_news ORDER BY id DESC");
                        ?>
                        <?php foreach ($rows as $row) : ?>
                        <div class="box-items">
                            <a href="januar.php">
                                <img class="img-click" src="../zelez-vaclav/tmp_img_news/<?= htmlspecialchars($row['image']); ?>" width="300" height="300" title="<?= htmlspecialchars($row['image']); ?>">
                                <p class="news-text"><?= htmlspecialchars($row['name']); ?></p>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
<?php require_once ('../zelez-vaclav/partials/footer.php') ?>
</body>
</html>