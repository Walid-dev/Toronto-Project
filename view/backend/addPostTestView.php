<form action="" method="post" class="form_wrapper">
    <div class="form_wrapper_title">Ajouter un article</div>
    <div class="form_wrapper_inputs">
        <div class="form-group">
            <input class="form-control" placeholder="Auteur" type="text" id="author" name="author" required oninvalid="this.setCustomValidity('Remplir le champ svp.')" oninput="setCustomValidity('')" />
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Titre" id="title" name="title" required oninvalid="this.setCustomValidity('Remplir le champ svp')" oninput="setCustomValidity('')" />
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Sujet</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Articles</option>
                <option>Annonces</option>
                <option>Evénements</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-info" type="submit" name="selectImg">Choisir Image</button>
        </div>
    </div>
    <div class="form_wrapper_tiny form-group">
        <textarea id="myTextArea" name="content"></textarea>
    </div>
    <div id="buttonBox" class="form_wrapper_foot">
        <button class="btn btn-md btn-success ml-auto" type="submit" name="save">Poster</button>
    </div>
</form>