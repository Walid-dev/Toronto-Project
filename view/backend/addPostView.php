<?php ob_start(); ?>
<section id="addPostSection">
    <form method="post" enctype="multipart/form-data" class="form_wrapper">
        <div class="form_wrapper_title">
            <a href="index.php" class="wrapper_btn btn btn-sm btn-info">Retour</a>
            <div class="wrapper_title">Ajouter article</div>
        </div>
        <div class="form_wrapper_inputs">
            <input type="hidden" name="idUser" value="<?= $_SESSION['userId'] ?>" />
            <div class="form-group">
                <input class="form-control" placeholder="Auteur" type="text" id="author" name="author" required oninvalid="this.setCustomValidity('Remplir le champ svp.')" oninput="setCustomValidity('')" />
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Titre" id="title" name="title" required oninvalid="this.setCustomValidity('Remplir le champ svp')" oninput="setCustomValidity('')" />
            </div>
            <div class="form-group">
                <input type="file" name="image" id="image">
            </div>
        </div>
        <div class="form_wrapper_tiny form-group">
            <textarea id="myTextArea" name="content"></textarea>
        </div>
        <div id="buttonBox" class="form_wrapper_foot">
            <button id="save" class="btn btn-md btn-success ml-auto" type="submit" name="save">Poster</button>
        </div>
    </form>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>