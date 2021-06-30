<?php
require_once (ATS_35 . '/View/Admin/souscription-variable.php');
?>
<div class="wrap">
    <h1 class="wp-heading-inline">
       <?php echo $title;  ?>
    </h1>

    <a href="<?php echo site_url('/wp-admin/edit.php?post_type=souscription');?>" class="page-title-action">Retour</a>
    <br>
    <h3 class="detail-subscription"><?php _e('Détails de la souscription', 'ats35');?></h3>
    <hr class="wp-header-end" />
    <div class="content-subscription">
    	<table class="table_width">
		    <thead class="th_header">
		        <tr class="element_tr">
		            <th style="text-align: left;">Services</th>
		            <th style="text-align: left;">Tarifs</th>
		            <th style="text-align: left;">Quantité</th>
		            <th style="text-align: left;">Total HT</th>
		            <th style="text-align: left;">Total TTC</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php if ($depot_garant) : ?>
		        <tr class="element_t">
		            <td>Dépôt de garantie</td>
		            <td><?php if ($depot_garant) {echo $depot_garant; }?></td>
		            <td><?php if ($depot_quant) { echo $depot_quant;}?></td>
		            <td> &nbsp; </td>
	            	<td><?php if ($depot_garant) { echo $depot_garant; }?></td>
		        </tr>
		    	<?php endif;?>
		    	<?php if ($dom_tarif) : ?>
		        <tr class="element_t">
		            <td>Domiciliation</td>
		            <td><?php if ($dom_tarif) { echo $dom_tarif; }?></td>
		            <td><?php if ($dom_quant) { echo $dom_quant; } ?></td>
		            <td><?php if ($dom_total_ht) { echo $dom_total_ht; }?></td>
		            <td><?php if ($dom_total_ttc) { echo $dom_total_ttc; } ?></td>
		        </tr>
		        <?php endif;?>
		        <?php if ($sms_tarif) : ?>
		        <tr class="element_t">
		            <td>Option SMS</td>
		            <td><?php if ($sms_tarif) { echo $sms_tarif;}?></td>
		            <td><?php if ($sms_quant) { echo $sms_quant;}?></td>
		            <td><?php if ($dom_total_ht) { echo $dom_total_ht;}?></td>
		            <td><?php if ($dom_total_ttc) { echo $dom_total_ttc;}?></td>
		        </tr>
		        <?php endif;?>
		        <?php if ($mail_tarif) : ?>
		        <tr class="element_t">
		            <td>Option mail</td>
		            <td><?php if ($mail_tarif) { echo $mail_tarif;}?></td>
		            <td><?php if ($mail_quant) { echo $mail_quant;}?></td>
		            <td><?php if ($mail_ht) { echo $mail_ht;}?></td>
		            <td><?php if ($mail_ttc) { echo $mail_ttc; }?></td>
		        </tr>
		        <?php endif;?>
		        <?php if ($scan_tarif) : ?>
		        <tr class="element_t">
		            <td>Scann courriers</td>
		            <td><?php if ($scan_tarif) { echo $scan_tarif;}?></td>
		            <td><?php if ($scan_quant) { echo $scan_quant;}?></td>
		            <td><?php if ($scan_ht) { echo $scan_ht; }?></td>
		            <td><?php if ($scan_ttc) { echo $scan_ttc;}?></td>
		        </tr>
		        <?php endif;?>
		        <tr class="element_t">
		            <td colspan="3">&nbsp;</td>
		            <td>&nbsp;</td>
		            <td>&nbsp;</td>
		        </tr>
		        <tr class="element_t">
		            <td colspan="4">Total</td>
		            <td><?php if ($total_all) { echo $total_all;}?>
		            </td>
		        </tr>
		    </tbody>
		</table>
		<br>
	<?php
		$status = get_post_meta($post_id, 'subscription_status_payement', true);
		$date 	= get_post_meta($post_id, 'subscription_date_heure_transaction', true);
		$num 	= get_post_meta($post_id, 'subscription_number_transaction', true);
		$amount = get_post_meta($post_id, 'subscription_motant_transaction', true);
		$aut 	= get_post_meta($post_id, 'subscription_autorisation_transaction', true);
		if ($status == 'succes'):
	?>
    <h3 class="detail-subscription"><?php _e('Détails du paiement', 'ats35');?></h3>
    <hr class="wp-header-end" />
    <div class="content-subscription">
    	<table class="table_width">
		    <thead class="th_header">
		        <tr class="element_tr">
		            <th style="text-align: left;">Date et heure</th>
		            <th style="text-align: left;">Numéro de transaction</th>
		            <th style="text-align: left;">Montant de la transaction</th>
		            <th style="text-align: left;">Autorisation N° </th>
		        </tr>
		    </thead>
		    <tbody>
		        <tr class="element_t">
		            <td><?php if ($date) {echo $date; }?></td>
		            <td><?php if ($num) { echo $num;}?></td>
		            <td><?php if ($amount) { echo number_format($amount,2,",",".");}?> €</td>
	            	<td><?php if ($aut) { echo $aut; }?></td>
		        </tr>
		    	
		    </tbody>
		</table>
		<br>
		<?php endif;?>
		<h3 class="detail-subscription"><?php _e('Informations de souscriptions', 'ats35');?></h3>
		<h4 class="title_form"><?php _e('Vous êtes?', 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				Choix : 
				<span class="data_form">
					<?php 
						if ($fd_vousetes == 'resp') { echo 'Le représentant légal'; }
						elseif ($fd_vousetes == 'asso') { echo 'Un associé'; } 
						else { echo 'Un intermédiaire (Avocat, expert-comptable…)'; }
					?>
				</span>
			</p>	
		</div>
		<h4 class="title_form"><?php _e('La société à domicilier', 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				<?php _e('Choix :', 'ats35'); ?> 
				<span class="data_form">
					<?php 
						if ($fd_typesoc == 'crea') {
							echo 'C’est une création de société <br/>';
							if ($fd_typesoc_crea_statuts) {
								echo 'Statuts: <a href="'.$fd_typesoc_crea_statuts.'" target="_blank">Visualiser</a>';
							}
						} else {
							echo 'C’est un changement d’adresse (déménagement) <br/>';
							if ($fd_siret) {
								echo 'Siret: ' . $fd_siret . '<br/>';
								echo 'Vos Statuts: <a href="'.$fd_typesoc_dem_statuts.'" target="_blank">Visualiser</a> <br/>';
								echo 'Vos K-BIS: <a href="'.$fd_typesoc_dem_kbis.'" target="_blank">Visualiser</a> <br/>';
							}
						} 
					?>
				</span>
			</p>
		</div>
		<h4 class="title_form"><?php _e("L'établissement à domicilier", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				Choix : 
				<span class="data_form">
					<?php if ($fd_etaDomic == 'social') { echo 'Le siège social'; } 
						  else { echo 'Un établissement secondaire';}
					?>
				</span>
			</p>
		</div>
		<h4 class="title_form"><?php _e("Nom juridique de votre entreprise", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				Choix : 
				<span class="data_form">
					<?php 
						if ($fd_nomjuridique) {
							echo $fd_nomjuridique . '<br />';
						}
						if ($fd_nomComCheck) {
							echo "L'entreprise a t'elle un nom commercial ? : " . $fd_nomComCheck . '<br/>';
						}
						if ($fd_nomCom) {
							echo "Nom commercial : " . $fd_nomCom;
						}
					?>
				</span>
			</p>
		</div>
		<h4 class="title_form"><?php _e("Quel est le statut juridique de votre entreprise", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				Statut juridique : 
				<span class="data_form">
					<?php 
						
						if ($fd_statutJuri == 'asso') {
							echo 'Association';
						} else if ($fd_statutJuri == 'ae') {
							echo 'Auto Entrepreneur';
						} else if ($fd_statutJuri == 'ei') {
							echo 'Entreprise individuelle';
						} else if ($fd_statutJuri == 'eurl') {
							echo 'EURL';
						} else if ($fd_statutJuri == 'sarl') {
							echo 'SARL';
						} else if ($fd_statutJuri == 'sa') {
							echo 'SA';
						} else if ($fd_statutJuri == 'sas') {
							echo 'SAS';
						} else if ($fd_statutJuri == 'sasu') {
							echo 'SASU';
						} else if ($fd_statutJuri == 'sci') {
							echo 'SCI';
						} else if ($fd_statutJuri == 'snc') {
							echo 'SNC';
						} else {
							echo '';
						}
					?>
				</span>
			</p>
		</div>
		<h4 class="title_form"><?php _e("Informations sur la société à domicilier", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				Votre secteur d’activité : 
				<span class="data_form">
					<?php 
						if ($fd_secteur) {
							echo $fd_secteur . '<br>';
						}
						if ($fd_descactivi) {
							echo "Votre activité : " . $fd_descactivi . "<br>";
						}
						if ($fd_capital) {
							echo "Capital en € : " . $fd_capital . "<br>";
						}
						if ($fd_clienteleparticulier == 'fd_clienteleparticulier') {
							echo "Votre clientèle : Particuliers <br>";
						}
						if ($fd_clienteleentreprises == 'fd_clienteleentreprises') {
							echo "Votre clientèle : Entreprises <br>";
						} 
					?>
				</span>
			</p>
		</div>
		<h4 class="title_form"><?php _e("Le représentant légal est", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				Choix : 
				<span class="data_form">
						<?php 
							if ($fd_repres == 'morale') {
								echo 'Une personne morale <br/>';
						?>
						<?php if ($fd_moralinraison):?>
							<p class="">Raison Sociale : <?php echo $fd_moralinraison; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinnom):?>
							<p class="">Nom et prénom du représentant légal : <?php echo $fd_moralinnom; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinrcs):?>
							<p class="">RCS : <?php echo $fd_moralinrcs; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinactivite):?>
							<p class="">Activité : <?php echo $fd_moralinactivite; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinemail):?>
							<p class="">Mail : <?php echo $fd_moralinemail; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinadresse):?>
							<p class="">Adresse : <?php echo $fd_moralinadresse; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinpostal):?>
							<p class="">Code Postal : <?php echo $fd_moralinpostal; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinville):?>
							<p class="">Ville : <?php echo $fd_moralinville; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinphone):?>
							<p class="">Téléphone : <?php echo $fd_moralinphone; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinpart):?>
							<p class="">Nombre de part du capital social détenu en % : <?php echo $fd_moralinpart; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinpiece_kbis):?>
							<p class="">K-Bis : <a href="<?php echo $fd_moralinpiece_kbis; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_moralinpiece_statut):?>
							<p class="">Statuts : <a href="<?php echo $fd_moralinpiece_statut; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_moralinpiece_pi1recto):?>
							<p class="">Pièce identité recto du représentant légal en couleur : <a href="<?php echo $fd_moralinpiece_pi1recto; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_moralinpiece_pi1verso):?>
							<p class="">Pièce identité verso du représentant légal en couleur : <a href="<?php echo $fd_moralinpiece_pi1verso; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_moralinpiece_pi2recto):?>
							<p class="">Seconde Pièce identité du représentant légal recto en couleur : <a href="<?php echo $fd_moralinpiece_pi2recto; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_moralinpiece_pi2verso):?>
							<p class="">Seconde Pièce identité verso du représentant légal en couleur : <a href="<?php echo $fd_moralinpiece_pi2verso; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_moralinpiece_facture):?>
							<p class="">Justificatif du représentant légal – facture domicile : facture énergie / téléphone de moins de 3 mois : <a href="<?php echo $fd_moralinpiece_facture; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
					<?php
						} else {
							echo 'Une personne physique <br />';
					?>
						<?php if ($fd_physinnom):?>
							<p class="">Nom : <?php echo $fd_physinnom; ?></p>
						<?php endif;?>
						<?php if ($fd_physinprenom):?>
							<p class="">Prénom : <?php echo $fd_physinprenom; ?></p>
						<?php endif;?>
						<?php if ($fd_physinfonction):?>
							<p class="">Fonction dans l'entreprise : <?php echo $fd_physinfonction; ?></p>
						<?php endif;?>
						<?php if ($fd_physinemail):?>
							<p class="">Mail : <?php echo $fd_physinemail; ?></p>
						<?php endif;?>
						<?php if ($fd_moralinemail):?>
							<p class="">Mail : <?php echo $fd_moralinemail; ?></p>
						<?php endif;?>
						<?php if ($fd_physinaddr):?>
							<p class="">Adresse personnelle : <?php echo $fd_physinaddr; ?></p>
						<?php endif;?>
						<?php if ($fd_physinpostal):?>
							<p class="">Code Postal : <?php echo $fd_physinpostal; ?></p>
						<?php endif;?>
						<?php if ($fd_physinville):?>
							<p class="">Ville : <?php echo $fd_physinville; ?></p>
						<?php endif;?>
						<?php if ($fd_physinpart):?>
							<p class="">Nombre de part du capital social détenu en % : <?php echo $fd_physinpart; ?></p>
						<?php endif;?>
						<?php if ($fd_physinpiece_pi1recto):?>
							<p class="">Pièce identité recto en couleur : <a href="<?php echo $fd_physinpiece_pi1recto; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_physinpiece_pi1verso):?>
							<p class="">Pièce identité verso en couleur : <a href="<?php echo $fd_physinpiece_pi1verso; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_physinpiece_pi2recto):?>
							<p class="">Seconde Pièce identité recto en couleur : <a href="<?php echo $fd_physinpiece_pi2recto; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_physinpiece_pi2verso):?>
							<p class="">Seconde Pièce identité verso en couleur : <a href="<?php echo $fd_physinpiece_pi2verso; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
						<?php if ($fd_physinpiece_facture):?>
							<p class="">Justificatif du représentant légal – facture domicile : facture énergie / téléphone de moins de 3 mois : <a href="<?php echo $fd_physinpiece_facture; ?>" target="_blank">Visualiser</a></p>
						<?php endif;?>
					<?php
						}
					?>
				</span>
			</p>
			
		</div>
		<h4 class="title_form"><?php _e("Avez-vous des associés dans la société à domicilier ?", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				<span class="data_form">
					<?php 
						if (strpos($fd_physassocnom, '#!!_#') !== false) {
							$valuePhysassocnom = explode("#!!_#", $fd_physassocnom);
							$valuePhysassocprenom = explode("#!!_#", $fd_physassocprenom);
							$valuePhysassocfonction = explode("#!!_#", $fd_physassocfonction);
							$valuePhysassocmobile = explode("#!!_#", $fd_physassocmobile);
							$physassocphone = explode("#!!_#", $fd_physassocphone);
							$physassocemail = explode("#!!_#", $fd_physassocemail);
							$physassocadresse = explode("#!!_#", $fd_physassocadresse);
							$physassocpostal = explode("#!!_#", $fd_physassocpostal);
							$physassocville = explode("#!!_#", $fd_physassocville);
							$physassocpart = explode("#!!_#", $fd_physassocpart);
							$physassocpiece_pi1recto = explode("#!!_#", $fd_physassocpiece_pi1recto);
							$physassocpiece_pi1verso = explode("#!!_#", $fd_physassocpiece_pi1verso);
							$physassocpiece_pi2recto = explode("#!!_#", $fd_physassocpiece_pi2recto);
							$physassocpiece_pi2verso = explode("#!!_#", $fd_physassocpiece_pi2verso);
							$physassocpiece_facture = explode("#!!_#", $fd_physassocpiece_facture);
							if ($valuePhysassocnom) {
							$table = [];
							for ($i = 0; $i < count($valuePhysassocnom) ; $i++) { 
								$nom = $valuePhysassocnom[$i];
								$prenom = $valuePhysassocprenom[$i];
								$fonction = $valuePhysassocfonction[$i];
								$telPort = $valuePhysassocmobile[$i];
								$telFix = $physassocphone[$i];
								$mail = $physassocemail[$i];
								$adressPro = $physassocadresse[$i];
								$codePostal = $physassocpostal[$i];
								$ville = $physassocville[$i];
								$nombre = $physassocpart[$i];
								$pieceRect = $physassocpiece_pi1recto[$i];
								$pieceVerso = $physassocpiece_pi1verso[$i];
								$secondePiece = $physassocpiece_pi2recto[$i];
								$secondePieceVerso = $physassocpiece_pi2verso[$i];
								$justification = $physassocpiece_facture[$i];
								$table[] = array(
											"nom" => $nom, 
											"prenom" => $prenom,
											"fonction" => $fonction,
											"telPort" => $telPort,
											"telFix" => $telFix,
											"mail" => $mail,
											"adressPro" => $adressPro,
											"codePostal" => $codePostal,
											"ville" => $ville,
											"nombre" => $nombre,
											"pieceRect" => $pieceRect,
											"pieceVerso" => $pieceVerso,
											"secondePiece" => $secondePiece,
											"secondePieceVerso" => $secondePieceVerso,
											"justification" => $justification
										);
							}
							foreach ($table as $key => $physiquePersone) {
								echo 'Nom : ' . $physiquePersone['nom'] . '<br />'; 
								echo 'Prénom : ' . $physiquePersone['prenom'] . '<br />'; 
								echo 'Fonction dans l’entreprise : ' . $physiquePersone['fonction'] . '<br />'; 
								echo 'Téléphone portable personnel : ' . $physiquePersone['telPort'] . '<br />'; 
								echo 'Téléphone fixe personnel : ' . $physiquePersone['telFix'] . '<br />'; 
								echo 'Mail : ' . $physiquePersone['mail'] . '<br />'; 
								echo 'Adresse personnelle : ' . $physiquePersone['adressPro'] . '<br />'; 
								echo 'Code Postal : ' . $physiquePersone['codePostal'] . '<br />'; 
								echo 'Ville : ' . $physiquePersone['ville'] . '<br />'; 
								echo 'Nombre de part du capital social détenu en % : ' . $physiquePersone['nombre'] . '<br />'; 
								echo 'Pièce identité recto en couleur : <a href="' . $physiquePersone['pieceRect'] . '" target="_blank">Visualiser</a><br />'; 
								echo 'Pièce identité verso en couleur : <a href="' . $physiquePersone['pieceVerso'] . '" target="_blank">Visualiser</a><br />'; 
								echo 'Seconde Pièce identité recto en couleur : <a href="' . $physiquePersone['secondePiece'] . '" target="_blank">Visualiser</a><br />'; 
								echo 'Seconde Pièce identité verso en couleur : <a href="' . $physiquePersone['secondePieceVerso'] . '" target="_blank">Visualiser</a><br />'; 
								echo 'Justificatif de votre domicile : facture énergie / téléphone de moins de 3 mois : <a href="' . $physiquePersone['justification'] . '" target="_blank">Visualiser</a><br />';
								echo '<br/> <br />';
							}
						}
						} elseif (!empty($fd_physassocnom))  {
							echo 'Nom : ' . $fd_physassocnom . '<br />'; 
							echo 'Prénom : ' . $fd_physassocprenom . '<br />'; 
							echo 'Fonction dans l’entreprise : ' . $fd_physassocfonction . '<br />'; 
							echo 'Téléphone portable personnel : ' . $fd_physassocmobile . '<br />'; 
							echo 'Téléphone fixe personnel : ' . $fd_physassocphone . '<br />'; 
							echo 'Mail : ' . $fd_physassocemail . '<br />'; 
							echo 'Adresse personnelle : ' . $fd_physassocadresse . '<br />';
							echo 'Code Postal : ' . $fd_physassocpostal . '<br />'; 
							echo 'Ville : ' . $fd_physassocville . '<br />'; 
							echo 'Nombre de part du capital social détenu en % : ' . $fd_physassocpart . '<br />'; 
							echo 'Pièce identité recto en couleur : <a href="' . $fd_physassocpiece_pi1recto . '" target="_blank">Visualiser</a><br />'; 
							echo 'Pièce identité verso en couleur : <a href="' . $fd_physassocpiece_pi1verso . '" target="_blank">Visualiser</a><br />';
							echo 'Seconde Pièce identité recto en couleur : <a href="' . $fd_physassocpiece_pi2recto . '" target="_blank">Visualiser</a><br />'; 
							echo 'Seconde Pièce identité verso en couleur : <a href="' . $fd_physassocpiece_pi2verso . '" target="_blank">Visualiser</a><br />'; 
							echo 'Justificatif de votre domicile : facture énergie / téléphone de moins de 3 mois : <a href="' . $fd_physassocpiece_facture . '" target="_blank">Visualiser</a><br />'; 
						}
					?>
				</span>
				<span class="data_form">
					<?php 
						if (strpos($fd_moralassocnom, '#!!_#') !== false) {
							$moralassocnom = explode("#!!_#", $fd_moralassocnom);
							$moralassocactivite = explode("#!!_#", $fd_moralassocactivite);
							$moralassocemail = explode("#!!_#", $fd_moralassocemail);
							$moralassocadresse = explode("#!!_#", $fd_moralassocadresse);
							$moralassocpostal = explode("#!!_#", $fd_moralassocpostal);
							$moralassocville = explode("#!!_#", $fd_moralassocville);
							$moralassocphone = explode("#!!_#", $fd_moralassocphone);
							$moralassocpart = explode("#!!_#", $fd_moralassocpart);
							$moralassocpiece_pi1recto = explode("#!!_#", $fd_moralassocpiece_pi1recto);
							$moralassocpiece_pi1verso = explode("#!!_#", $fd_moralassocpiece_pi1verso);
							$moralassocpiece_pi2recto = explode("#!!_#", $fd_moralassocpiece_pi2recto);
							$moralassocpiece_pi2verso = explode("#!!_#", $fd_moralassocpiece_pi2verso);
							$moralassocpiece_facture = explode("#!!_#", $fd_moralassocpiece_facture);
							if ($moralassocnom) {
								$tableMoral = [];
								for ($i = 0; $i < count($moralassocnom) ; $i++) {  
									$nomLegal = $moralassocnom[$i];
									$activiteLegal = $moralassocactivite[$i];
									$mailLegal = $moralassocemail[$i];
									$adressLegal = $moralassocadresse[$i];
									$cpLegal = $moralassocpostal[$i];
									$villeLegal = $moralassocville[$i];
									$phoneLegal = $moralassocphone[$i];
									$partLegal = $moralassocpart[$i];
									$picRectoLegal = $moralassocpiece_pi1recto[$i];
									$pictVersoLegal = $moralassocpiece_pi1verso[$i];
									$picRecto2Legal = $moralassocpiece_pi2recto[$i];
									$pictVerso2Legal = $moralassocpiece_pi2verso[$i];
									$picFactureLegal = $moralassocpiece_facture[$i];
									$tableMoral[] = array(
										"nomLegal" => $nomLegal,
										"activiteLegal" => $activiteLegal,
										"mailLegal" => $mailLegal,
										"adressLegal" => $adressLegal,
										"cpLegal" => $cpLegal,
										"villeLegal" => $villeLegal,
										"phoneLegal" => $phoneLegal,
										"partLegal" => $partLegal,
										"picRectoLegal" => $picRectoLegal,
										"pictVersoLegal" => $pictVersoLegal,
										"picRecto2Legal" => $picRecto2Legal,
										"pictVerso2Legal" => $pictVerso2Legal,
										"picFactureLegal" => $picFactureLegal,
									);
								}

								foreach ($tableMoral as $key => $moralPersone) {
									echo 'Nom et prénom du représentant légal : ' . $moralPersone['nomLegal'] . '<br />';
									echo 'Activité : ' . $moralPersone['activiteLegal'] . '<br />';
									echo 'Mail : ' . $moralPersone['mailLegal'] . '<br />';
									echo 'Adresse : ' . $moralPersone['adressLegal'] . '<br />';
									echo 'Code Postal : ' . $moralPersone['cpLegal'] . '<br />';
									echo 'Ville : ' . $moralPersone['villeLegal'] . '<br />';
									echo 'Téléphone : ' . $moralPersone['phoneLegal'] . '<br />';
									echo 'Nombre de part du capital social détenu en % : ' . $moralPersone['partLegal'] . '<br />';
									echo 'Pièce identité recto de l’associé en couleur : <a href="' . $moralPersone['picRectoLegal'] . '" target="_blank">Visualiser</a><br />';
									echo 'Pièce identité verso de l’associé en couleur : <a href="' . $moralPersone['pictVersoLegal'] . '" target="_blank">Visualiser</a><br />';
									echo 'Seconde Pièce identité de l’associé recto en couleur : <a href="' . $moralPersone['picRecto2Legal'] . '" target="_blank">Visualiser</a><br />';
									echo 'Seconde Pièce identité verso de l’associé en couleur : <a href="' . $moralPersone['pictVerso2Legal'] . '" target="_blank">Visualiser</a><br />';
									echo 'Justificatif de l’associé – facture domicile : facture énergie / téléphone de moins de 3 mois : <a href="' . $moralPersone['picFactureLegal'] . '" target="_blank">Visualiser</a><br />';
									echo '<br /> <br />';
								}

							}
						} elseif (!empty($fd_moralassocnom)) {
							echo 'Nom et prénom du représentant légal : ' . $fd_moralassocnom . '<br />';
							echo 'Activité : ' . $fd_moralassocactivite . '<br />';
							echo 'Mail : ' . $fd_moralassocemail . '<br />';
							echo 'Adresse : ' . $fd_moralassocadresse . '<br />';
							echo 'Code Postal : ' . $fd_moralassocpostal . '<br />';
							echo 'Ville : ' . $fd_moralassocville . '<br />';
							echo 'Téléphone : ' . $fd_moralassocphone . '<br />';
							echo 'Nombre de part du capital social détenu en % : ' . $fd_moralassocpart . '<br />';
							echo 'Pièce identité recto de l’associé en couleur : <a href="' . $fd_moralassocpiece_pi1recto . '" target="_blank">Visualiser</a><br />';
							echo 'Pièce identité verso de l’associé en couleur : <a href="' . $fd_moralassocpiece_pi1verso . '" target="_blank">Visualiser</a><br />';
							echo 'Seconde Pièce identité de l’associé recto en couleur : <a href="' . $fd_moralassocpiece_pi2recto . '" target="_blank">Visualiser</a><br />';
							echo 'Seconde Pièce identité verso de l’associé en couleur : <a href="' . $fd_moralassocpiece_pi2verso . '" target="_blank">Visualiser</a><br />';
							echo 'Justificatif de l’associé – facture domicile : facture énergie / téléphone de moins de 3 mois : <a href="' . $fd_moralassocpiece_facture . '" target="_blank">Visualiser</a><br />';
						}
					?>
				</span>
			</p>
		</div>

		<h4 class="title_form"><?php _e("Attestation des Documents Comptables et Juridiques", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				<?php
					if (!empty($doc)) {
						echo 'Attestation des Documents Comptables et Juridiques : <a href="' . $doc . '" target="_blank">Visualiser</a><br />';
					}
				?>
			</p>
		</div>
		<h4 class="title_form"><?php _e("Quelles options choisissez-vous pour votre Domiciliation?", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				<span class="data_form">
					<?php 
						
						if (!empty($fd_courrierATS35)) {
							echo 'Je choisis la mise à disposition de mes courriers chez ATS 35 : Oui <br />';
						} 
						if (!empty($fd_reexpedition)) {
							echo 'Je choisis la réexpédition du courrier : Oui <br />';
						}
						if (!empty($fd_reexpedition_adresse)) {
							echo 'Noter l’adresse à laquelle vous voulez recevoir vos courriers : ' . $fd_reexpedition_adresse . '<br/>';
						}		
						if ($fd_reexpedition_semaine == 1) {
							echo 'Une fois semaine le jeudi.  <br />';
						}
						if ($fd_reexpedition_semaine == 2) {
							echo 'Deux fois semaine le lundi et jeudi. <br />';
						}
						if ($fd_reexpedition_semaine == 3) {
							echo 'Deux fois par mois le 1er et 15 du mois. <br />';
						}
						if ($fd_reexpedition_semaine == 4) {
							echo 'Une fois par mois le 1er du mois. <br />';
						}
						if (!empty($fd_notificationSMS)) {
							echo 'Notifications par SMS – abonnement mensuel 15 euros par mois <br />';
						}
						if (!empty($fd_notificationMail)) {
							echo 'Notifications par MAIL – abonnement mensuel 10 euros par mois <br />';
						}
						if (!empty($fd_scanCourrier)) {
							echo 'Scann Courriers – abonnement mensuel 50 euros par mois <br />';
						}
						
					?>
				</span>
			</p>
		</div>
		<h4 class="title_form"><?php _e("Conditions du service de domiciliation", 'ats35');?></h4>
		<div class="infos">
			<p class="element_values">
				<?php
					if (!empty($fd_cgu)) {
						echo "J'ai lu et j'accepte les conditions du service de domiciliation : Oui<br />";
					} 
				?>
				<?php
					if (!empty($doc)) {
						echo "Inclure l'attestation des Documents Comptables et Juridiques : Oui<br />";
					}
				?>
			</p>
		</div>
    </div>
    <div id="ajax-response"></div>
    <div class="clear"></div>
</div>
