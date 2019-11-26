<div id="articleSection1" class="section_h1_titles">
    <img class="img-fluid text-center" src="public/images/ARTICLES.png" width="180" alt="">
</div>
<div class="article_wrapper">
    <?php
    while ($data = $posts->fetch()) {
        ?>
        <div>
            <h5><?= $data['title'] ?></h5>
            <hr>
            <?php if ($data['image'] != NULL) {
                echo '<img class="img-fluid" src="data:image/jpeg;base64,' . $data['image'] . '" />';
            } else {
                echo '<img class="img-fluid" src="public/images/toronto_logo.png" width="180" />';
            }
            ?>
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

<div id="pagination" class="text-black text-center"><?= paginationArticles() ?></div>