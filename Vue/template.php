<!DOCTYPE html>
<!--Template inclu dans chaque vue qui regroupe les éléments html commun à toutes les pages
On inclut ici le css et les script WYSIWYG tinymce -->
<html>

  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title?></title>
    <meta name="description" content="Blog Billet simple pour l'Alaska">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=evmxjxgwrombaci5zg013nbupc683dugdv2rvwk9tsg2lcj2"></script>
    <script>tinymce.init({
      selector:'#textareatiny',
      branding: false,
      menubar: false
       });</script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="contenu/style.css" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body id="page-top">
    <header class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="./index.php">Billets pour l'Alaska</a>
            <div class="navbar-right" id="groupe-connexion">
                <!-- <a class="lien-header" href="<?="./index.php?action=inscription" ?>">Inscription</a> -->
                <a class="lien-header" href="<?="./index.php?action=connexion" ?>">Admin</a>
                <!-- <a class="lien-header" href="<?="./index.php?action=contact" ?>">Contact</a> -->
                <?php if (isset($_SESSION['nom']) AND isset($_SESSION['is_admin']))
                { ?>
                <a class="lien-header" href="<?="./index.php?action=deconnexion" ?>">Déconnexion</a>
                <?php  } ?>
            </div>
        </div>
    </header>
    <div class="container" id="bloc-principal">
        <?= $contenu ?>
    </div>
  </body>
</html>
