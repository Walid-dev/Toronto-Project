<?php ob_start(); ?>
<div id="messageSection" class="container-fluid">

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
        <div>
            <h5><?= $message['content'] ?></h5>
            <h1><?= $message['recipient'] ?></h1>
            <hr>

            <a href="index.php?action=post&amp;id=<?= $message['id'] . "#postContainer" ?>" class="btn btn-md btn-info">Lire...</a>
        </div>
    </div>

<?php
}
$messages->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>