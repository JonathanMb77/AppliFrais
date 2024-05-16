<?php
  include("vues/v_sommaire.php");
  include("vues/v_debutContenu.php");

// vérification du droit d'accès au cas d'utilisation
if ( ! estConnecte() ) {
    ajouterErreur("L'accès à cette page requiert une authentification !", $tabErreurs);
    include("vues/v_erreurs.php");
    die();
}
else  { // accès autorisé
    $action = lireDonneeUrl('action', 'synthese');
    $idVisiteur = $_SESSION['idVisiteur'];
    $info = $pdo-> getLesFraisForfaitSynthese($idVisiteur);
    include("vues/v_synthese.php");
    }
?>