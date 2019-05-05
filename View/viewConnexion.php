<?php $this->titre='Administration'; ?>
<div class="row">
    <div class="col-md-4 col-centered">
        <img src="View/images/alaska.jpg"/>
    </div>
</div>
<div class="row">
    <form class="col-md-4 col-centered" id="cadre-form" method="post" action="index.php?action=identification">
        <div class="form-group">
            <label for="nom">Utilisateur : </label>
            <input name="nom" id="nom" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="mot_de_passe">Mot de passe : </label>
            <input name="mot_de_passe" id="mot_de_passe" type="password" class="form-control">
        </div>
        <br>
        <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
</div>

<div class="row">  
    <div class="col-md-4 col-centered">
        <a href="index.php">Retour à l'accueil</a>
    </div>
</div>


<?php $this->titre='Administration'; ?>
<div class="row">
	<div class="col-md-4 col-centered">
		<img src="View/images/alaska.jpg"/>
    </div>
</div>
<div class="row">
	<form class="col-md-4 col-centered" id="cadre-form" method="post" action="index.php?action=identification">
		<div class="form-group">
			<label for="nom">Nom:</label>
			<input name="nom" id="nom" type="text" class="form-control">
		</div>
		<div class="form-group">
			<label for="mot_de_passe">Mot de passe:</label>
			<input name="mot_de_passe" id="mot_de_passe" type="password" class="form-control">
		</div>
			<br>
            <button class="btn btn-primary" type="submit">Envoyer</button>
	</form>
</div>

<div class="row">  
    <div class="col-md-4 col-centered">
        <a href="index.php">Retour à l'accueil</a>
    </div>
</div>