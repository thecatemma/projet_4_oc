<?php $this->titre='Administration'; ?>
  <div class="row">
    <h2 class="col-md-4">Commentaires à modérer</h2>
    <a class="btn btn-default pull-right" href="index.php?action=nouvelarticle">Nouvel article</a>
  </div>
<?php 
if (empty($listecoms))
{

?>
<div class="row"id="comsign">
    <div class="col-md-4">
      Aucun commentaire à modérer
    </div>
  </div>
<?php }
else
{

foreach ($listecoms as $com): ?>
  <div class="row"id="comsign">
      <div class="col-md-4">
        <em>Auteur:</em> <?= $com->auteur(); ?> <em>commentaire:</em> <?= $com->contenu();?>
        <p>
          <a href="<?="index.php?action=okcom&id=".$com->id()."&auteur=".$com->auteur();?>"><button>Confirmer commentaire</button></a>
          <a href="<?="index.php?action=deletecom&id=".$com->id()."&auteur=".$com->auteur();?>"><button>Supprimer commentaire</button></a>
        </p>
      </div>
  </div>
  <hr />
<?php endforeach; }?>
  

  <div class="row">
	  <div class="col-md-12"> 
    <h2>Articles</h2>
    <?php foreach ($listebillet as $billet): ?>

      <p>
        <?= $billet->titre(); ?>&nbsp; <br>
		 
		<a href="<?= "index.php?action=editarticle&id=".$billet->id()."&dateCreation=".$billet->dateCreation(); ?>"><button class="bouton_admin">Modifier</button></a>
        <a href="<?= "index.php?action=deletearticle&id=".$billet->id()."&dateCreation=".$billet->dateCreation(); ?>"><button>Supprimer</button></a>
      </p>
  <hr />
  </div>
</div>
	  
<?php endforeach; ?>

