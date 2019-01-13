<?php $this->titre = "Mon Blog - " . $billet->titre(); ?>

<article>
  <header>
    <h1 class="titreBillet"><?= $billet->titre(); ?></h1>
    <time><?= $billet->dateCreation(); ?></time>
  </header>
  <p><?= $billet->contenu(); ?></p>
</article>
<hr />
<header>
  <h3>Commentaires</h3>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><strong><?= $commentaire->auteur(); ?></strong> dit : <em><?= $commentaire->contenu(); ?></em></p>
  <?php if ($commentaire->is_signal() != 1) {  ?>
    <a href="<?= "index.php?action=signaler&id_commentaire=".$commentaire->id()."&id_article=".$commentaire->id_article(); ?>"><p>Signaler</p></a>
  <?php } else { ?>
    <p>Commentaire signalé</p>
  <?php }  ?>
<?php endforeach; ?>
<p>Ajouter un commentaire</p>
<form class="col-lg-10" action="index.php?action=commenter" method="post">
  <p>Nom :
    <input type="text" class="form-control" name="auteur">
    <input type="hidden" value="<?=$billet->id(); ?>" name="id_article">
  </p>
  <p>Votre commentaire</p><textarea class="form-control" rows="4" cols="8" name="contenu"></textarea>
  <p><input type="submit"></p>
</form>
