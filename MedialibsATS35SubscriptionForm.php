<?php
   /*
   Plugin Name: MedialibsATS35SubscriptionForm
   description: Un plugin affichant un formulaire du style https://www.asei.fr/domiciliation-entreprise-en-ligne/ sera développer. Le code HTML et JS seront réalisé par Mediapilote Angers.
   La logique d'affichage sera gérée en JavaScript. La logique de calcul sera gérée sur le serveur.
   La validation du formulaire, l'utilisateur sera invit??r?ler sa souscription via le module de banque(Module de banque Credit Mutuel ou Banque Populaire).
   Version: 1.0
   Author: Medialibs
   */
require ABSPATH . 'wp-includes/pluggable.php';
require_once( trailingslashit( ABSPATH ) .'wp-load.php' );
define('ATS_35', dirname(__FILE__));
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

if (!is_dir(ABSPATH . '/wp-content/wp-document')) {
	 mkdir(ABSPATH ."/wp-content/wp-document", 0777, true);
}

require_once (ATS_35 . '/Controller/Admin/adminControllerClass.php');
require_once (ATS_35 . '/Controller/Admin/SubscriptionMetaController.php');
require_once (ATS_35 . '/Controller/Front/Subscription/subscriptionControllerClass.php');
require_once (ATS_35 . '/Controller/Front/Payement/payementControllerClass.php');
global $adminControllerClass;

$adminControllerClass = new AdminController();
