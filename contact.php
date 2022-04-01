<?php
    require 'debut_html.inc.php';
    require 'header_html.inc.php';
?>
<main>
    <h1>Bienvenue sur le formulaire de contact !</h1>
    <div class="form_containeur">
    <form class="contact" action="envoyer_mail.php" method="POST">
        <div id="en-tete">
            <div id="prenom">
                <label class="prenom" for="prenom">Prénom :</label>
                <input class="input-form" type="text" name="prenom" id="prenom"/>
            </div>
            <div>
                <label class="nom" for="nom">Nom :</label>
                <input class="input-form" type="text" name="nom" id="nom"/>
            </div>
        </div>
        <label class="email" for="email">E-mail :</label>
        <input class="input-form" type="email" name="email" id="email">
        <label class="message" for="message">Message :</label>
        <textarea name="message" id="message"></textarea>
        <input type="submit" value="Envoyer" class="envoyer">
    </form>
    </div>
</main>
<?php
    require 'footer_html.inc.php';
    require 'fin_html.inc.php';
?>