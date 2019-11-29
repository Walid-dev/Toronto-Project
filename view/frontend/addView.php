<div id="" class="container-fluid">
    <div class="section_h1_titles">
        <img class="img-fluid text-center" src="public/images/annonces.png" width="180" alt="">
    </div>
    <div class="article_wrapper">
        <?php
        while ($data = $posts->fetch()) {
            ?>
            <div>
                <h2><?= $data['type'] ?></h2>
                <h5><?= $data['title'] ?></h5>
                <hr>
                <?= '<img class="img-fluid mb-3" src="data:image/jpeg;base64,' . $data['image'] . '" />' ?>
                <p> <?= shortArticle($data); ?></p>
                <blockquote class="blockquote mb-3 mt-2 article_author_and_date text-left">
                    <footer class="blockquote-footer">Par <?= $data['author'] ?><br><cite title="Source Title"> le <?= $data['creation_date_fr'] ?></cite></footer>
                </blockquote>
                <a href="index.php?action=post&amp;id=<?= $data['id'] . "#postContainer" ?>" class="btn btn-md btn-info">Lire...</a>
            </div>
        <?php
    }
    $posts->closeCursor();
    ?>

    </div>

    <div id="pagination" class="text-black text-center"><?= paginationAdds(); ?></div>
</div>