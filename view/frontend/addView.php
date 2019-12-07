<div id="" class="">
    <div id="articleSection1" class="section_h1_titles">
        <img class="img-fluid text-center" src="public/images/annonces.png" width="135" alt="">
        <hr class="hr_title mb-2 mt-4">
        <h4 class="text-centers title_text pt-3 pb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam blanditiis, est, placeat et neque a maiores tenetur amet, porro esse voluptates nesciunt omnis at nostrum tempore eum aut quas error?</h4>
    </div>
    <div id="pagination2" class="pagination pagination_hide_add text-black text-center"><?= paginationAdds(); ?><a class="pagination_slide_add">Lire Plus</a></div>
    <div class="article_wrapper">
        <?php
        while ($data = $posts->fetch()) {
            ?>
            <div class="article_box">
                <div class="add_content">
                    <h5><?= strip_tags($data['title']) ?></h5>
                    <hr>
                    <?= '<img class="img-fluid mb-3" src="data:image/jpeg;base64,' . $data['image'] . '" />' ?>
                    <p> <?= shortArticle($data); ?></p>
                    <blockquote class="blockquote mb-3 mt-2 article_author_and_date text-left">
                        <footer class="blockquote-footer">Par <?= strip_tags($data['author']) ?><br><cite title="Source Title"> le <?= $data['creation_date_fr'] ?></cite></footer>
                    </blockquote>
                    <a href="index.php?action=post&amp;id=<?= $data['id'] . "#postContainer" ?>" class="btn btn-md btn-yellow">Lire</a>
                </div>

            </div>
        <?php
    }
    $posts->closeCursor();
    ?>

    </div>
</div>