<div id="articleSection1" class="section_h1_titles">
    <img class="img-fluid text-center" src="public/images/articles.png" width="135" alt="">
    <hr class="hr_title mb-2 mt-4">
    <h4 class="text-centers title_text pt-3 pb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam blanditiis, est, placeat et neque a maiores tenetur amet, porro esse voluptates nesciunt omnis at nostrum tempore eum aut quas error?</h4>
</div>
<div id="pagination" class="pagination pagination_hide_article text-black text-center"><?= paginationArticles() ?><a class="pagination_slide_article btn-blue">Lire Plus</a></div>
<div class="article_wrapper">
    <?php
    while ($data = $posts->fetch()) {
        ?>
        <div class="article_box">
            <div class="article_content">
                <h5 class="mb-3 ml-2"><?= $data['title'] ?></h5>
                <?php if ($data['image'] != NULL) {
                    echo '<img class="img-fluid article_img" src="data:image/jpeg;base64,' . $data['image'] . '" />';
                } else {
                    echo '<img class="img-fluid article_img" src="public/images/toronto_logo.png" width="150" />';
                }
                ?>
                <p class="p-2"> <?= shortArticle($data); ?></p>
                <blockquote class="blockquote pl-3 article_author_and_date text-left">
                    <footer class="article_footer blockquote-footer">Par <?= $data['author'] ?><br><cite title="Source Title"> le <?= $data['creation_date_fr'] ?></cite></footer>
                </blockquote>
                <a href="index.php?action=post&amp;id=<?= $data['id'] . "#postContainer" ?>" class="btn btn-blue">Lire...</a>
            </div>
        </div>
    <?php
}
$posts->closeCursor();
?>

</div>