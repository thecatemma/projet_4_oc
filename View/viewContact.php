<?php $this->titre = "Contact";?>
  <body>
    <div class="container">
        <div class="row">
            <h1 class="col-md-4 col-centered" id="titre-contact">Contactez-moi</h1>
        </div>
        <div class="row">
            <form class="col-md-4 col-centered" id="cadre-form">
                <div class="form-group">
                    <label for="nom">Nom : </label>
                    <input name="nom" id="nom" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom : </label>
                    <input name="prenom" id="prenom" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="message">Message : </label>
                    <textarea name="message" id="message" class="form-control" rows="4"></textarea>
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
    </div>
  </body>

</html>