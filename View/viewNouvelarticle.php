<?php $this->titre = 'Nouvel article'; ?>


<form class="col-md-12 col-centered" action="index.php?action=nouvelarticle" method="post">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input name="titre" id="titre" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="contenu">Contenu : </label>
        <textarea id="textareatiny" class="form-control" rows="8" name="contenu"></textarea>
    </div>
    <br>
    <button class="btn btn-primary" type="submit">Publier</button>
</form>