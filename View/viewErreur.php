<?php $this->titre = 'Mon Blog'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgErreur ?></p>
<?php $contenu = ob_get_clean();  
//ob_get_clean:Lit contenu du tampon de sortie puis l'efface 
?>

<?php require 'template.php'; ?>