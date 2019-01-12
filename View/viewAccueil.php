<?php $this->titre='Billet simple pour l\'Alaska'; ?>
<?php foreach ($billets as $billet): ?>
  <article>
    <a href="<?= "index.php?action=article&id=" . $billet->id(); ?>">
        <h1><?= $billet->titre(); ?></h1>
    </a>
    <p>Par <?= $billet->auteur(); ?></p>
    <time><?= $billet->dateCreation(); ?></time>
  </article>
  <hr />
<?php endforeach; ?>


