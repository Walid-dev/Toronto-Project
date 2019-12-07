<?php ob_start(); ?>
<div id="messageSection" class="container">
    <h1>Hello</h1>
    <h4><?= $_SESSION['userUid'] ?></h4>

    <?php
    $num = $messages->rowCount();

    if ($num > 0) { } else {
        echo '<div class="empty_text">Vous n\'avez aucun Message</div>';
    }
    ?>

    <?php
    while ($message = $messages->fetch()) {
        ?>
        <div class="row">
            <h5><?= strip_tags($message['content']) ?></h5>
            <h1><?= strip_tags($message['recipient']) ?></h1>
            <a href="index.php?action=post&amp;id=<?= $message['id'] . "#postContainer" ?>" class="btn btn-md btn-info">Lire...</a>
            <?php
            if ($post['author'] != $_SESSION['userUid']) {
                require('view/frontend/messageModalView.php');
            }
            ?>
        </div>

    <?php
}
$messages->closeCursor();
?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>