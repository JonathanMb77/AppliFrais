<?php
session_start();

$config = include('../config.php');

error_reporting($config['debug']);
ini_set("display_errors", $config['debug']);

require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");

include("vues/v_entete.php") ;

$pdo = new PdoGsb(
  $config["host"],
  $config["database"],
  $config["user"],
  $config["password"]
);

$tabErreurs = array();
$estConnecte = estConnecte();
$uc = lireDonneeUrl('uc');
switch($uc){
	case 'connexion' :
		include("controleurs/c_connexion.php");
    break;
	
	case 'gererFrais' :
		include("controleurs/c_gererFrais.php");
    break;
  
  case 'synthese' :
    include("controleurs/c_synthese.php");
    break;
	
	default :
    if ( $estConnecte ) {
		  include("controleurs/c_etatFrais.php");
    }
    else {
      include("controleurs/c_connexion.php");
    }
    break; 
	
}
include("vues/v_finContenu.php") ;
include("vues/v_pied.php") ;
