<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div id="postSection">
    <div class="container-fluid">
        <div id="postWrapper" class="post_wrapper">
            <div class="info-container">
                <?php if ($post['image'] != NULL) {
                    echo '<img class="" src="data:image/jpeg;base64,' . $post['image'] . '" />';
                } else {
                    echo '<img class="" src="public/images/toronto_logo.png" />';
                }
                ?>
                <div class="content_article_post_box">
                    <?= checkUserTypeToComment($post, "Se connecter pour commenter ou envoyer un message"); ?>
                </div>
            </div>
            <div class="article">
                <a id="menuCircleLink" href="index.php#articleSection"><i class="fas fa-long-arrow-alt-left"></i></a>
                <div class="article_text">
                    <div class="section_h1_titles pt-2 pb-2">
                        <img class="img-fluid text-center" src="public/images/articles.png" width="120" alt="">
                        <hr class="hr_title mb-2 mt-3">
                    </div>
                    <h2><?= htmlspecialchars($post['title']) ?></h2>
                    <p class="post_text"><?= nl2br($post['content']) ?></p>
                    <?= $post['author'] ?><cite title="Source Title"> le <?= $post['creation_date_fr'] ?>
                </div>
                <?php
                if (isset($_SESSION['userUid'])) {
                    if ($post['author'] != $_SESSION['userUid']) {
                        require('view/frontend/messageModalView.php');
                    }
                }
                ?>
            </div>
            <div id="commentHeader" class="comment">
                <div id="commentHead" class="section_h1_titles pb-3 pt-2">
                    <img class="img-fluid text-center" src="public/images/commentaires.png" width="140" alt="">
                    <hr class="hr_title mb-1 mt-2">
                </div>
                <?php
                while ($comment = $comments->fetch()) {
                    ?>
                    <form id="signalCommentForm" class="signal_form" action="" method="post">
                        <div class="signal_box">
                            <p class="author_comment mb-1"><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?> :</p>
                            <p class="comment_text m-0"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                            <input type="hidden" value="<?= $comment['id'] ?>" name="commentId" />
                            <input type="hidden" value="1" name="commentStatus" />
                            <input type="hidden" value="<?= signalComment($comment) ?>" name="report" />
                            <input id="submitForm" class="signal_btn btn btn-pink ml-3 float-right" type="submit" name="signal" value="Signaler <?= $comment['report'] ?>">
                        </div>
                    </form>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>