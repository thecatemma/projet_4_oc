<?php $this->titre='Billet simple pour l\'Alaska'; ?>

<form class="col-md-12 col-centered" action="index.php?action=editarticle" method="post">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input name="titre" id="titre" type="text" value="<?=$article->titre()?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="contenu">Contenu : </label>
        <textarea id="textareatiny" class="form-control" rows="8" name="contenu"><?=$article->contenu()?></textarea>
    </div>
    <br>
    <input type="hidden" name="id" value="<?=$article->id()?>">
    <button class="btn btn-primary" type="submit">Update</button>
</form>