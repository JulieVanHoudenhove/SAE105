<?php
    session_start();
    //Test de sécurité
    if (count($_POST)==0) {
        header('Location: contact.php');
    }

    //Prénom
    if (!empty($_POST['prenom'])) {
        $prenom=ucfirst(mb_strtolower($_POST['prenom']));
        //echo 'Le prénom est : '.$prenom.'<br />'."\n";
    } else {
        echo "Erreur : le prénom est vide !"."\n";
        exit(0);
    }

    //Nom
    if (!empty($_POST['nom'])) {
        $nom=mb_strtoupper($_POST['nom']);
        //echo 'Le nom est : '.$nom.'<br />'."\n";
    } else {
        echo "Erreur : le nom est vide !"."\n";
        exit(0);
    }

    //Email
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $email=mb_strtolower($_POST['email']);
            //echo 'L\'email est : '.$email.'<br />'."\n";
        } else {
        echo "Erreur : l'email n'est pas valide !"."\n";
            exit(0);
        }
    } else {
        echo "Erreur : l'email est vide !"."\n";
        exit(0);
    }

    //Message
    if (!empty($_POST['message'])) {
        $message=ucfirst(mb_strtolower($_POST['message']));
        echo 'Le message est : '.$message.'<br />'."\n";
    } else {
        echo "Erreur : le message est vide !"."\n";
        exit(0);
    }

    // Envoi du mail
    $destinataire = 'juju.v.h@hotmail.fr';
    $sujet = 'Demande de renseignement --- '.date('d/m/Y');
    $headers = 'From: mmi20a17@mmi-troyes.fr' . "\r\n" .
        'Reply-To: mmi20a17@mmi-troyes.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (mail($destinataire, $sujet, $message, $headers)) {
        //echo 'Message envoyé : OK !'."\n";
        // on revient à la page d'accueil
        //header('Location: confirmation.php');
    } else {
        echo 'Erreur : message non envoyé !'."\n";
    }
    // Mail de confirmation pour l’internaute
    $headers = 'From: mmi20a17@mmi-troyes.fr' . "\r\n" .
        'Reply-To: no-reply@mmi-troyes.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    if (mail($_POST['email'], 'Confirmation de demande', 'Nous avons bien reçu votre demande !', $headers)) {
        echo 'Message de confirmation envoyé : OK !'."\n";
        // on revient à la page d'accueil
        $_SESSION['contact_envoyé']=true;
        header('Location: index.php');
    } else {
        echo 'Erreur : message de confirmation non envoyé !'."\n";
    }
    ?>