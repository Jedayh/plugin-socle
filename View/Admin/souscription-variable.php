<?php
$post_id 					= $_GET['id'];
$title 						= get_the_title( $post_id );
$fd_vousetes 				= get_post_meta( $post_id, 'subscription_fd_vousetes', true );
$fd_typesoc 				= get_post_meta( $post_id, 'subscription_fd_typesoc', true );
$fd_typesoc_crea_statuts 	= get_post_meta( $post_id, 'subscription_fd_typesoc_crea_statuts', true );
$fd_siret 					= get_post_meta( $post_id, 'subscription_fd_siret', true );
$fd_typesoc_dem_statuts 	= get_post_meta( $post_id, 'subscription_fd_typesoc_dem_statuts', true );
$fd_typesoc_dem_kbis 		= get_post_meta( $post_id, 'subscription_fd_typesoc_dem_kbis', true );
$fd_etaDomic 				= get_post_meta( $post_id, 'subscription_fd_etadomic', true );
$fd_nomjuridique 			= get_post_meta( $post_id, 'subscription_fd_nomjuridique', true );
$fd_nomComCheck 			= get_post_meta( $post_id, 'subscription_fd_nomcomcheck', true );
$fd_nomCom 					= get_post_meta( $post_id, 'subscription_fd_nomcom', true );
$fd_statutJuri 				= get_post_meta( $post_id, 'subscription_fd_statutjuri', true );
$fd_secteur 				= get_post_meta( $post_id, 'subscription_fd_secteur', true );
$fd_descactivi 				= get_post_meta( $post_id, 'subscription_fd_descactivi', true );
$fd_capital 				= get_post_meta( $post_id, 'subscription_fd_capital', true );
$fd_clienteleparticulier 	= get_post_meta( $post_id, 'subscription_fd_clienteleparticulier', true );
$fd_clienteleentreprises 	= get_post_meta( $post_id, 'subscription_fd_clienteleentreprises', true );
$fd_repres 					= get_post_meta( $post_id, 'subscription_fd_repres', true );
$fd_moralinraison 			= get_post_meta( $post_id, 'subscription_fd_moralinraison', true );
$fd_moralinnom 				= get_post_meta( $post_id, 'subscription_fd_moralinnom', true );
$fd_moralinrcs 				= get_post_meta( $post_id, 'subscription_fd_moralinrcs', true );
$fd_moralinactivite 		= get_post_meta( $post_id, 'subscription_fd_moralinactivite', true );
$fd_moralinemail 			= get_post_meta( $post_id, 'subscription_fd_moralinemail', true );
$fd_moralinadresse 			= get_post_meta( $post_id, 'subscription_fd_moralinadresse', true );
$fd_moralinpostal 			= get_post_meta( $post_id, 'subscription_fd_moralinpostal', true );
$fd_moralinville 			= get_post_meta( $post_id, 'subscription_fd_moralinville', true );
$fd_moralinphone 			= get_post_meta( $post_id, 'subscription_fd_moralinphone', true );
$fd_moralinpart 			= get_post_meta( $post_id, 'subscription_fd_moralinpart', true );
$fd_moralinpiece_kbis 		= get_post_meta( $post_id, 'subscription_fd_moralinpiece_kbis', true );
$fd_moralinpiece_statut 	= get_post_meta( $post_id, 'subscription_fd_moralinpiece_statut', true );
$fd_moralinpiece_pi1recto 	= get_post_meta( $post_id, 'subscription_fd_moralinpiece_pi1recto', true );
$fd_moralinpiece_pi1verso 	= get_post_meta( $post_id, 'subscription_fd_moralinpiece_pi1verso', true );
$fd_moralinpiece_pi2recto 	= get_post_meta( $post_id, 'subscription_fd_moralinpiece_pi2recto', true );
$fd_moralinpiece_pi2verso 	= get_post_meta( $post_id, 'subscription_fd_moralinpiece_pi2verso', true );
$fd_moralinpiece_facture 	= get_post_meta( $post_id, 'subscription_fd_moralinpiece_facture', true );
$fd_physinnom 				= get_post_meta( $post_id, 'subscription_fd_physinnom', true );
$fd_physinprenom 			= get_post_meta( $post_id, 'subscription_fd_physinprenom', true );
$fd_physinfonction 			= get_post_meta( $post_id, 'subscription_fd_physinfonction', true );
$fd_physinemail 			= get_post_meta( $post_id, 'subscription_fd_physinemail', true );
$fd_moralinemail 			= get_post_meta( $post_id, 'subscription_fd_moralinemail', true );
$fd_physinaddr 				= get_post_meta( $post_id, 'subscription_fd_physinaddr', true );
$fd_physinpostal 			= get_post_meta( $post_id, 'subscription_fd_physinpostal', true );
$fd_physinville 			= get_post_meta( $post_id, 'subscription_fd_physinville', true );
$fd_physinpart 				= get_post_meta( $post_id, 'subscription_fd_physinpart', true );
$fd_physinpiece_pi1recto 	= get_post_meta( $post_id, 'subscription_fd_physinpiece_pi1recto', true );
$fd_physinpiece_pi1verso 	= get_post_meta( $post_id, 'subscription_fd_physinpiece_pi1verso', true );
$fd_physinpiece_pi2recto 	= get_post_meta( $post_id, 'subscription_fd_physinpiece_pi2recto', true );
$fd_physinpiece_pi2verso 	= get_post_meta( $post_id, 'subscription_fd_physinpiece_pi2verso', true );
$fd_physinpiece_facture 	= get_post_meta( $post_id, 'subscription_fd_physinpiece_facture', true );
$fd_physassocnom 			= get_post_meta( $post_id, 'subscription_fd_physassocnom', true );
$fd_physassocprenom 		= get_post_meta( $post_id, 'subscription_fd_physassocprenom', true );
$fd_physassocfonction 		= get_post_meta( $post_id, 'subscription_fd_physassocfonction', true );
$fd_physassocmobile 		= get_post_meta( $post_id, 'subscription_fd_physassocmobile', true );
$fd_physassocphone 			= get_post_meta( $post_id, 'subscription_fd_physassocphone', true );
$fd_physassocemail 			= get_post_meta( $post_id, 'subscription_fd_physassocemail', true );
$fd_physassocadresse 		= get_post_meta( $post_id, 'subscription_fd_physassocadresse', true );
$fd_physassocpostal 		= get_post_meta( $post_id, 'subscription_fd_physassocpostal', true );
$fd_physassocville 			= get_post_meta( $post_id, 'subscription_fd_physassocville', true );
$fd_physassocpart 			= get_post_meta( $post_id, 'subscription_fd_physassocpart', true );
$fd_physassocpiece_pi1recto = get_post_meta( $post_id, 'subscription_fd_physassocpiece_pi1recto', true );
$fd_physassocpiece_pi1verso = get_post_meta( $post_id, 'subscription_fd_physassocpiece_pi1verso', true );
$fd_physassocpiece_pi2recto = get_post_meta( $post_id, 'subscription_fd_physassocpiece_pi2recto', true );
$fd_physassocpiece_pi2verso = get_post_meta( $post_id, 'subscription_fd_physassocpiece_pi2verso', true );
$fd_physassocpiece_facture 	= get_post_meta( $post_id, 'subscription_fd_physassocpiece_facture', true );
$fd_moralassocnom 			= get_post_meta( $post_id, 'subscription_fd_moralassocnom', true );
$fd_moralassocactivite 		= get_post_meta( $post_id, 'subscription_fd_moralassocactivite', true );
$fd_moralassocemail 		= get_post_meta( $post_id, 'subscription_fd_moralassocemail', true );
$fd_moralassocadresse 		= get_post_meta( $post_id, 'subscription_fd_moralassocadresse', true );
$fd_moralassocpostal 		= get_post_meta( $post_id, 'subscription_fd_moralassocpostal', true );
$fd_moralassocville 		= get_post_meta( $post_id, 'subscription_fd_moralassocville', true );
$fd_moralassocphone 		= get_post_meta( $post_id, 'subscription_fd_moralassocphone', true );
$fd_moralassocpart 			= get_post_meta( $post_id, 'subscription_fd_moralassocpart', true );
$fd_moralassocpiece_pi1recto = get_post_meta( $post_id, 'subscription_fd_moralassocpiece_pi1recto', true );
$fd_moralassocpiece_pi1verso = get_post_meta( $post_id, 'subscription_fd_moralassocpiece_pi1verso', true );
$fd_moralassocpiece_pi2recto = get_post_meta( $post_id, 'subscription_fd_moralassocpiece_pi2recto', true );
$fd_moralassocpiece_pi2verso = get_post_meta( $post_id, 'subscription_fd_moralassocpiece_pi2verso', true );
$fd_moralassocpiece_facture = get_post_meta( $post_id, 'subscription_fd_moralassocpiece_facture', true );
$fd_courrierATS35 			= get_post_meta( $post_id, 'subscription_fd_courrierats35', true );
$fd_reexpedition 			= get_post_meta( $post_id, 'subscription_fd_reexpedition', true );
$fd_reexpedition_adresse 	= get_post_meta( $post_id, 'subscription_fd_reexpedition_adresse', true );
$fd_reexpedition_semaine 	= get_post_meta( $post_id, 'subscription_fd_reexpedition_semaine', true );
$fd_notificationSMS 		= get_post_meta( $post_id, 'subscription_fd_notificationsms', true );
$fd_notificationMail 		= get_post_meta( $post_id, 'subscription_fd_notificationmail', true );
$fd_scanCourrier 			= get_post_meta( $post_id, 'subscription_fd_scancourrier', true );
$fd_cgu 					= get_post_meta( $post_id, 'subscription_fd_cgu', true );
$doc 						= get_post_meta( $post_id, 'subscription_doc_link', true );
$depot_garant 				= get_post_meta( $post_id, 'subscription_depot_garant', true );
$depot_quant 				= get_post_meta( $post_id, 'subscription_depot_quant', true );
$dom_tarif 					= get_post_meta( $post_id, 'subscription_dom_tarif', true );
$dom_quant 					= get_post_meta( $post_id, 'subscription_dom_quant', true );
$dom_total_ht 				= get_post_meta( $post_id, 'subscription_dom_total_ht', true );
$dom_total_ttc 				= get_post_meta( $post_id, 'subscription_dom_total_ttc', true );
$sms_tarif 					= get_post_meta( $post_id, 'subscription_sms_tarif', true );
$sms_quant 					= get_post_meta( $post_id, 'subscription_sms_quant', true );
$sms_ht 					= get_post_meta( $post_id, 'subscription_sms_ht', true );
$sms_ttc 					= get_post_meta( $post_id, 'subscription_sms_ttc', true );
$mail_tarif 				= get_post_meta( $post_id, 'subscription_mail_tarif', true );
$mail_quant 				= get_post_meta( $post_id, 'subscription_mail_quant', true );
$mail_ht 					= get_post_meta( $post_id, 'subscription_mail_ht', true );
$mail_ttc 					= get_post_meta( $post_id, 'subscription_mail_ttc', true );
$scan_tarif 				= get_post_meta( $post_id, 'subscription_scan_tarif', true );
$scan_quant 				= get_post_meta( $post_id, 'subscription_scan_quant', true );
$scan_ht 					= get_post_meta( $post_id, 'subscription_scan_ht', true );
$scan_ttc 					= get_post_meta( $post_id, 'subscription_scan_ttc', true );
$total_all 					= get_post_meta( $post_id, 'subscription_total_all', true );
?>