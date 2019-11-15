<div class="form_wrapper">
    <form action="" method="post">
        <header>Ajouter un article</header>
        <div class="inputs">
        <div class="form-group">
        <label for="author">Auteur</label><br>
        <input class="form-control" placeholder="Auteur" type="text" id="author" name="author" required oninvalid="this.setCustomValidity('Remplir le champ svp.')" oninput="setCustomValidity('')" />
    </div>
    <div class="form-group">
                    <label for="title">Titre</label><br>
                    <input class="form-control" placeholder="Titre" id="title" name="title" required oninvalid="this.setCustomValidity('Remplir le champ svp')" oninput="setCustomValidity('')" />
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-info" type="submit" name="selectImg">Choisir Image</button>
                </div>
        </div>
                <div class="form-group">
                    <label for="title">Texte</label><br />
                    <textarea id="myTextArea" name="content"></textarea>
                </div>
                <div id="buttonBox" class="mt-4">
                    <button class="btn btn-md btn-success" type="submit" name="save">Poster</button>
                </div>
    </form>
</div>