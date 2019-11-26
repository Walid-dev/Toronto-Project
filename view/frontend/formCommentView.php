<?php
if ($post['author'] != $_SESSION['userUid']) {
    require('view/frontend/messageModalView.php');
}

?>

<form id="commentForm" action="index.php?action=addComment&amp;id=<?= $post['id'] . "#commentForm" ?>" method="post">
    <div class="form-group">
        <input class="form-control" type="hidden" id="author" name="author" value="<?= $_SESSION['userUid'] ?>" />
    </div>
    <div class="form-group">
        <textarea class="form-control" placeholder="Laisser un commentaire.." id="comment" name="comment" required oninvalid="this.setCustomValidity('Ajouter un commentaire.')" oninput="setCustomValidity('')"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>