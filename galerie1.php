<?php
    require 'debut_html.inc.php';
    require 'header_html.inc.php';
?>
<main>
    <h1>Bienvenue sur la galerie !</h1>
    <main>
    <form method="post" action="ajout_image.php"
    enctype="multipart/form-data">
    <input type="file" name="nouvelleImage" />
    <input type="password" name="mdp" placeholder="Mot de passe" />
    <input type="submit" value="Ajouter" />
    </form>

    <?php
        if (!empty($_SESSION['messageImage'])) {
        echo '<p>'.$_SESSION['messageImage'].'</p>'."\n";
        $_SESSION['messageImage']=null;
        }
    ?>

    <div id='mesImages'>

        <?php
        // lire et mettre dans $contenu le contenu du dossier
        $contenu=dir("images/galerie/");
        // tant qu'il y a des éléments dans le dossier :
        while ($nomElement=$contenu->read()) {
            if (!is_dir($nomElement)) {
                // on récupère les quatres derniers caractères du fichier
                //donc son extension
                $extension=strtolower(substr($nomElement, -4)); // les 4 derniers
                if ($extension=='.jpg' || $extension=='.png') {
                    //écrire le nom de l'élément et sauter une ligne
                    echo '<img src="images/galerie/'.$nomElement . '" alt="' .$nomElement. '" />'."\n";
                }              
            }
        }
        // on ferme la lecture du dossier
        $contenu->close();
        ?>

    </div>
</main>
<?php
    require 'footer_html.inc.php';
    require 'fin_html.inc.php';
?>