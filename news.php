<?php require ('../zelez-vaclav/partials/header.php') ?>
<?php require ('../zelez-vaclav/config/connection.php'); ?>
        <section class="news">
            <h1>
                Novinky
            </h1>
            <div class="products-items">
                    <div class="box">
                        <?php 
                            $i = 1;
                            $rows = mysqli_query($conn, "SELECT * FROM upload_news ORDER BY id DESC");
                        ?>
                        <?php 
                            foreach ($rows as $row) :
                        ?>
                        <div class="box-items">
                            <a href="januar.php">
                                <img class="img-click" src="../zelez-vaclav/tmp_img_news/<?php echo $row['image']; ?>" width="300" height="300" title="<?php echo $row['image']; ?>">
                                <p class="news-text"><?php echo $row['name']; ?></p>
                            </a>
                            
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
<?php require ('../zelez-vaclav/partials/footer.php') ?>
</body>
</html>