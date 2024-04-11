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
		$hash_mdp = $pdo->gethash($login);
		echo (password_verify($mdp, $hash_mdp));
		// remplacer !lis_array($visiteur) par password_verify
		if(password_verify($mdp, $hash_mdp)){
			$visiteur = $pdo->getInfosVisiteur($login);
			 $id = $visiteur['id'];
			 $nom =  $visiteur['nom'];
			 $prenom = $visiteur['prenom'];
			 connecter($id,$nom,$prenom);
			 include("vues/v_sommaire.php");
			 include("vues/v_debutContenu.php");
			 include("vues/v_accueil.php");
		}
		else{
			ajouterErreur("Login ou mot de passe incorrect", $tabErreurs);
		    include("vues/v_debutContenu.php");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
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