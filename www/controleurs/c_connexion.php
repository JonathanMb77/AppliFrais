<?php
$action = lireDonneeUrl('action', 'demandeConnexion');

switch($action){
	case 'demandeConnexion':{
		include("vues/v_debutContenu.php");
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = lireDonneePost('login');
		$mdp = lireDonneePost('mdp');
		// Faire une requête SQL pour récupérer le hash
		$hash_mdp = password_hash($mdp, PASSWORD_ARGON2ID);
		$visiteur = $pdo->getInfosVisiteur($login,$hash_mdp);
		// remplacer !lis_array($visiteur) par password_verify
		if(!is_array( $visiteur)){
			ajouterErreur("Login ou mot de passe incorrect", $tabErreurs);
		  include("vues/v_debutContenu.php");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			//vérifie le mot de passe
			$pdo->getInfosVisiteur($login,$hash_mdp);

			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom);
            include("vues/v_sommaire.php");
		    include("vues/v_debutContenu.php");
			include("vues/v_accueil.php");
		}
		break;
	}
	default :{
        deconnecter();
		include("vues/v_debutContenu.php");
		include("vues/v_connexion.php");
		break;
	}
}
?>