<?php ob_start(); ?>
<div id="messageSection" class="backend_view container">
    <div class="section_h1_titles pt-4 pb-2">
        <img class="img-fluid text-center" src="public/images/messages.png" width="120" alt="">
        <hr class="hr_title mb-2 mt-3">
    </div>
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
        <div class="row msg-list_box">
            <div>Sujet: <?= strip_tags($message['subject']) ?></div>
            <div>Expéditeur: <?= strip_tags($message['recipient']) ?></div>
            <div>Message: <?= strip_tags($message['content']) ?></div>
            <?php
            if ($message['sender'] != $_SESSION['userUid']) {
                require('view/backend/messageListModalView.php');
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