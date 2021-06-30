<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('/wp-content/plugins/MedialibsATS35SubscriptionForm/assets/css/customCss.css')?>">
<div class="row">
	<div class="container">
		<div class="element-titre">
			<h2 class="titre">
				<?php echo esc_attr( get_option('new_option_titre') ); ?>
			</h2>
			<span class="link">
				<a href="<?php echo esc_attr( get_option('new_option_url') ); ?>" target="_blank">Voir nos Tarifs</a>
			</span>
		</div>
		<div class="formulaire form-domiciliation">
		<form id="form_domiciliation" method="post" enctype="multipart/form-data">
			<div class="form-domiciliation-step" data-step="4">
				<div class="form-domiciliation-titre">1/ Vous êtes&nbsp;?</div>
				<div class="row">
					<div class="group_multi_radio err-context">
						<div class="form-domiciliation-error">Merci de faire un choix</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_vousetes" type="radio" class="radio" value="resp" required>
								<span>Le représentant légal</span>
							</label>
						</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_vousetes" type="radio" class="radio" value="asso" required>
								<span>Un associé</span>
							</label>
						</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_vousetes" type="radio" class="radio" value="int" required>
								<span>Un intermédiaire (Avocat, expert-comptable…)</span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-domiciliation-titre">2/ La société à domicilier&nbsp;?</div>
				<div class="row">
					<div class="group_multi_radio err-context">
						<div class="form-domiciliation-error">Merci de faire un choix</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_typesoc" type="radio" class="checkbox" value="crea" data-toggle-radio="fd_typesoc_crea" required>
								<span>C’est une création de société</span>
							</label>
						</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_typesoc" type="radio" class="checkbox" value="dem" data-toggle-radio="fd_typesoc_dem" required>
								<span>C’est un changement d’adresse (déménagement)</span>
							</label>
						</div>
					</div>
				</div>

				<div class="row err-context" hidden data-hidden="fd_typesoc_crea">
					<div class="form-domiciliation-error">Merci de remplir ce champ</div>
					<label for="fd_typesoc_crea_statuts">Télécharger vos statuts constitutifs<span class="obligatory">*</span>&nbsp;:</label>
					<input id="fd_typesoc_crea_statuts" name="fd_typesoc_crea_statuts" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
				</div>
				<div hidden data-hidden="fd_typesoc_dem">
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_siret">SIRET<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_siret" id="fd_siret" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_typesoc_dem_statuts">Télécharger vos statuts<span class="obligatory">*</span>&nbsp;:</label>
						<input id="fd_typesoc_dem_statuts" name="fd_typesoc_dem_statuts" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_typesoc_dem_kbis">Télécharger vos K-BIS<span class="obligatory">*</span>&nbsp;:</label>
						<input id="fd_typesoc_dem_kbis" name="fd_typesoc_dem_kbis" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
					</div>
				</div>


				<div class="form-domiciliation-titre">3/ L'établissement à domicilier&nbsp;?</div>
				<div class="row">
					<div class="group_multi_radio err-context">
						<div class="form-domiciliation-error">Merci de faire un choix</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_etaDomic" type="radio" class="checkbox" value="social" required>
								<span>Le siège social</span>
							</label>
						</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_etaDomic" type="radio" class="checkbox" value="second" required>
								<span>Un établissement secondaire</span>
							</label>
						</div>
					</div>
				</div>


				<div class="form-domiciliation-titre">4/ Nom juridique de l’entreprise à domicilier&nbsp;?</div>
				<div class="row err-context">
					<div class="form-domiciliation-error">Merci de remplir ce champ</div>
					<label for="fd_nomjuridique" class="hide-if-ugly">Nom juridique<span class="obligatory">*</span>&nbsp;:</label>
					<input name="fd_nomjuridique" id="fd_nomjuridique" type="text" value="" required>
				</div>
				<div class="row">
					<label for="fd_nomComCheck">L'entreprise a t'elle un nom commercial&nbsp;?</label>
					<div class="select">
						<select name="fd_nomComCheck" id="fd_nomComCheck" data-toggle-select>
							<option value="non" label="Non" data-toggle-option="">Non</option>
							<option value="oui" label="Oui" data-toggle-option="fd_nomComCheck_Oui">Oui</option>
						</select>
					</div>
				</div>
				<div class="row err-context" hidden data-hidden="fd_nomComCheck_Oui">
					<div class="form-domiciliation-error">Merci de remplir ce champ</div>
					<label for="fd_nomCom">Nom commercial<span class="obligatory">*</span>&nbsp;: </label>
					<input name="fd_nomCom" id="fd_nomCom" type="text" value="" data-toggleRequired>
				</div>


				<div class="form-domiciliation-titre">5/ Quel est le statut juridique de votre entreprise&nbsp;?</div>
				<div class="row err-context">
					<div class="form-domiciliation-error">Merci de faire un choix</div>
					<label for="fd_statutJuri" class="hide-if-ugly">Statut juridique<span class="obligatory">*</span>&nbsp;:</label>
					<div class="select">
						<select name="fd_statutJuri" id="fd_statutJuri" required>
							<option></option>
							<option value="asso" label="Association">Association</option>
							<option value="ae" label="Auto-entrepreneur">Auto Entrepreneur</option>
							<option value="ei" label="Entreprise individuelle">Entreprise individuelle</option>
							<option value="eurl" label="EURL">EURL</option>
							<option value="sarl" label="SARL">SARL</option>
							<option value="sa" label="SA">SA</option>
							<option value="sas" label="SAS">SAS</option>
							<option value="sasu" label="SASU">SASU</option>
							<option value="sci" label="SCI">SCI</option>
							<option value="snc" label="SNC">SNC</option>
						</select>
					</div>
				</div>


				<div class="form-domiciliation-titre">6/ Informations sur la société à domicilier</div>
				<div class="row err-context">
					<div class="form-domiciliation-error">Merci de faire un choix</div>
					<label for="fd_secteur">Quel est votre secteur d’activité<span class="obligatory">*</span>&nbsp;?</label>
					<div class="select">
						<select name="fd_secteur" id="fd_secteur" required>
							<option></option>
							<option value="Administration, fonction publique">Administration, fonction publique</option>
							<option value="Agroalimentaire">Agroalimentaire</option>
							<option value="Artisanat d'art">Artisanat d'art</option>
							<option value="Associations">Associations</option>
							<option value="Banques, assurances, services financiers">Banques, assurances, services financiers</option>
							<option value="Chimie, plastique, conditionnement">Chimie, plastique, conditionnement</option>
							<option value="Commerce de détail, grande distribution">Commerce de détail, grande distribution</option>
							<option value="Communication, marketing, information">Communication, marketing, information</option>
							<option value="Construction, bâtiment, travaux publics">Construction, bâtiment, travaux publics</option>
							<option value="Culture, sports, loisirs">Culture, sports, loisirs</option>
							<option value="Energie">Energie</option>
							<option value="Enseignement, formation">Enseignement, formation</option>
							<option value="Environnement, récupération, tri, recyclage, traitement des déchets, matériaux, ...">Environnement, récupération, tri, recyclage, traitement des déchets, matériaux, ...</option>
							<option value="Equipement, matériel pour des activités professionnelles">Equipement, matériel pour des activités professionnelles</option>
							<option value="Fabrication, commerce de gros d'articles destinés à la vente">Fabrication, commerce de gros d'articles destinés à la vente</option>
							<option value="Gestion, administration des entreprises">Gestion, administration des entreprises</option>
							<option value="Hôtellerie, restauration, tourisme">Hôtellerie, restauration, tourisme</option>
							<option value="Immobilier">Immobilier</option>
							<option value="Industrie textile">Industrie textile</option>
							<option value="Informatique">Informatique</option>
							<option value="Ingénieurs d'études et de recherche, chercheurs">Ingénieurs d'études et de recherche, chercheurs</option>
							<option value="Logistique, transports">Logistique, transports</option>
							<option value="Matériel électrique, électronique, optique">Matériel électrique, électronique, optique</option>
							<option value="Mécanique, métallurgie">Mécanique, métallurgie</option>
							<option value="Minerais, minéraux, sidérurgie">Minerais, minéraux, sidérurgie</option>
							<option value="Professions juridiques">Professions juridiques</option>
							<option value="Santé, action sociale">Santé, action sociale</option>
							<option value="Services aux particuliers, collectivités, entreprises">Services aux particuliers, collectivités, entreprises</option>
						</select>
					</div>
				</div>
				<div class="row err-context">
					<div class="form-domiciliation-error">Merci de remplir ce champ</div>
					<label for="fd_descactivi">Votre activité<span class="obligatory">*</span>&nbsp;:</label>
					<textarea name="fd_descactivi" id="fd_descactivi" required></textarea>
					<div class="form-domiciliation-small">Décrivez en quelques mots le métier de votre entreprise</div>
				</div>

				<div class="row err-context">
					<div class="form-domiciliation-error">Merci de remplir ce champ</div>
					<label for="fd_capital">Capital en €<span class="obligatory">*</span>&nbsp;:</label>
					<input name="fd_capital" id="fd_capital" type="text" value="" required>
				</div>

				<div class="group_multi_checkbox">
					<label class="form-domiciliation-maxilabel">Votre clientèle&nbsp;:</label>
					<div class="multi_checkbox">
						<label class="form-domiciliation-label-check">
							<input name="fd_clienteleparticulier" type="checkbox" class="checkbox" value="fd_clienteleparticulier">
							<span>Particuliers</span>
						</label>
					</div>
					<div class="multi_checkbox">
						<label class="form-domiciliation-label-check">
							<input name="fd_clienteleentreprises" type="checkbox" class="checkbox" value="fd_clienteleentreprises">
							<span>Entreprises</span>
						</label>
					</div>
				</div>


				<div class="form-domiciliation-titre">7/ Le représentant légal est&nbsp;:</div>
				<div class="row">
					<div class="form-domiciliation-small">La personne morale doit être distinguée de la personne physique. La personne physique désigne un individu, alors que la personne morale est entité qui peut être une entreprise, ou une organisation...</div>
					<div class="group_multi_radio err-context">
						<div class="form-domiciliation-error">Merci de faire un choix</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_repres" type="radio" class="checkbox" value="morale" data-toggle-radio="fd_repres_morale" required>
								<span>Une personne morale</span>
							</label>
						</div>
						<div class="multi_radio">
							<label class="form-domiciliation-label-check">
								<input name="fd_repres" type="radio" class="checkbox" value="physique" data-toggle-radio="fd_repres_physique" required>
								<span>Une personne physique</span>
							</label>
						</div>
					</div>
				</div>

				<div hidden data-hidden="fd_repres_morale">
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinraison">Raison Sociale<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinraison" id="fd_moralinraison" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinnom">Nom et prénom du représentant légal<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinnom" id="fd_moralinnom" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinrcs">RCS<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinrcs" id="fd_moralinrcs" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinactivite">Activité<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinactivite" id="fd_moralinactivite" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinemail">Mail<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinemail" id="fd_moralinemail" type="email" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinadresse">Adresse<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinadresse" id="fd_moralinadresse" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinpostal">Code Postal<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinpostal" id="fd_moralinpostal" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinville">Ville<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinville" id="fd_moralinville" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_moralinphone">Téléphone<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_moralinphone" id="fd_moralinphone" type="tel" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<label for="fd_moralinpart">Nombre de part du capital social détenu en&nbsp;%&nbsp;:</label>
						<input name="fd_moralinpart" id="fd_moralinpart" type="text" value="">
					</div>
					<div class="row">
						<label class="form-domiciliation-maxilabel">Téléchargez les pièces suivantes&nbsp;:</label>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralinpiece_kbis">K-Bis<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralinpiece_kbis" id="fd_moralinpiece_kbis" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralinpiece_statut">Statuts<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralinpiece_statut" id="fd_moralinpiece_statut" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralinpiece_pi1recto">Pièce identité recto du représentant légal en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralinpiece_pi1recto" id="fd_moralinpiece_pi1recto" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralinpiece_pi1verso">Pièce identité verso du représentant légal en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralinpiece_pi1verso" id="fd_moralinpiece_pi1verso" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralinpiece_pi2recto">Seconde Pièce identité du représentant légal recto en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralinpiece_pi2recto" id="fd_moralinpiece_pi2recto" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralinpiece_pi2verso">Seconde Pièce identité verso du représentant légal en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralinpiece_pi2verso" id="fd_moralinpiece_pi2verso" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row">
							<label for="fd_moralinpiece_facture">Justificatif du représentant légal – facture domicile&nbsp;: facture énergie / téléphone de moins de 3&nbsp;mois&nbsp;:</label>
							<input name="fd_moralinpiece_facture" id="fd_moralinpiece_facture" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG">
						</div>
					</div>
				</div>

				<div hidden data-hidden="fd_repres_physique">
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_physinnom">Nom<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_physinnom" id="fd_physinnom" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_physinprenom">Prénom<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_physinprenom" id="fd_physinprenom" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_physinfonction">Fonction dans l'entreprise<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_physinfonction" id="fd_physinfonction" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_physinemail">Mail<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_physinemail" id="fd_physinemail" type="email" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_physinaddr">Adresse personnelle<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_physinaddr" id="fd_physinaddr" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_physinpostal">Code Postal<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_physinpostal" id="fd_physinpostal" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label for="fd_physinville">Ville<span class="obligatory">*</span>&nbsp;:</label>
						<input name="fd_physinville" id="fd_physinville" type="text" value="" data-toggleRequired>
					</div>
					<div class="row err-context">
						<label for="fd_physinpart">Nombre de part du capital social détenu en&nbsp;%&nbsp;:</label>
						<input name="fd_physinpart" id="fd_physinpart" type="text" value="">
					</div>
					<div class="row">
						<label class="form-domiciliation-maxilabel">Téléchargez les pièces suivantes&nbsp;:</label>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physinpiece_pi1recto">Pièce identité recto en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physinpiece_pi1recto" id="fd_physinpiece_pi1recto" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physinpiece_pi1verso">Pièce identité verso en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physinpiece_pi1verso" id="fd_physinpiece_pi1verso" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physinpiece_pi2recto">Seconde Pièce identité recto en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physinpiece_pi2recto" id="fd_physinpiece_pi2recto" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physinpiece_pi2verso">Seconde Pièce identité verso en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physinpiece_pi2verso" id="fd_physinpiece_pi2verso" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physinpiece_facture">Justificatif de votre domicile&nbsp;: facture énergie / téléphone de moins de 3&nbsp;mois<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physinpiece_facture" id="fd_physinpiece_facture" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" data-toggleRequired>
						</div>
					</div>
				</div>


				<div class="form-domiciliation-titre">8/ Avez-vous des associés dans la société à domicilier&nbsp;?</div>

				<!-- Templates utilisés en js pour construire les parties de formulaires de chaque associé. L'attribut name termine par _X, où X est le nombre de copie ayant été créées par type d'associé (personne morale ou physique), commençant par 0 : par exemple fd_moralassocraison_0, fd_moralassocraison_1, fd_moralassocraison_2, etc. -->
				<template id="fd_template_assocPhysique" style="display:none;">
					<div class="form-domiciliation-associe">
						<a class="form-domiciliation-associe-remove" href="javascript:void(0);">Supprimer</a>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocnom_{n}">Nom<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocnom[]" id="fd_physassocnom_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocprenom_{n}">Prénom<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocprenom[]" id="fd_physassocprenom_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocfonction_{n}">Fonction dans l’entreprise<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocfonction[]" id="fd_physassocfonction_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocmobile_{n}">Téléphone portable personnel<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocmobile[]" id="fd_physassocmobile" type="tel" class="phoneTel" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocphone_{n}">Téléphone fixe personnel<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocphone[]" id="fd_physassocphone" type="tel" class="phoneTel" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocemail_{n}">Mail<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocemail[]" id="fd_physassocemail_{n}" type="email" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocadresse_{n}">Adresse personnelle<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocadresse[]" id="fd_physassocadresse_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocpostal_{n}">Code Postal<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocpostal[]" id="fd_physassocpostal_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_physassocville_{n}">Ville<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_physassocville[]" id="fd_physassocville_{n}" type="text" value="" required>
						</div>
						<div class="row">
							<label for="fd_physassocpart_{n}">Nombre de part du capital social détenu en&nbsp;%&nbsp;:</label>
							<input name="fd_physassocpart[]" id="fd_physassocpart_{n}" type="text" value="">
						</div>
						<div class="row">
							<label class="form-domiciliation-maxilabel">Téléchargez les pièces suivantes&nbsp;:</label>
							<div class="row err-context">
								<div class="form-domiciliation-error">Merci de remplir ce champ</div>
								<label for="fd_physassocpiece_pi1recto_{n}">Pièce identité recto en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
								<input name="fd_physassocpiece_pi1recto[]" id="fd_physassocpiece_pi1recto_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" required>
							</div>
							<div class="row err-context">
								<div class="form-domiciliation-error">Merci de remplir ce champ</div>
								<label for="fd_physassocpiece_pi1verso_{n}">Pièce identité verso en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
								<input name="fd_physassocpiece_pi1verso[]" id="fd_physassocpiece_pi1verso_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" required>
							</div>
							<div class="row err-context">
								<div class="form-domiciliation-error">Merci de remplir ce champ</div>
								<label for="fd_physassocpiece_pi2recto_{n}">Seconde Pièce identité recto en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
								<input name="fd_physassocpiece_pi2recto[]" id="fd_physassocpiece_pi2recto_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" required>
							</div>
							<div class="row err-context">
								<div class="form-domiciliation-error">Merci de remplir ce champ</div>
								<label for="fd_physassocpiece_pi2verso_{n}">Seconde Pièce identité verso en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
								<input name="fd_physassocpiece_pi2verso[]" id="fd_physassocpiece_pi2verso_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" required>
							</div>
							<div class="row">
								<label for="fd_physassocpiece_facture_{n}">Justificatif de votre domicile&nbsp;: facture énergie / téléphone de moins de 3&nbsp;mois&nbsp;:</label>
								<input name="fd_physassocpiece_facture[]" id="fd_physassocpiece_facture_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG">
							</div>
						</div>
					</div>
				</template>

				<template id="fd_template_assocMorale" style="display:none;">
					<div class="form-domiciliation-associe">
						<a class="form-domiciliation-associe-remove" href="javascript:void(0);">Supprimer</a>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralassocnom_{n}">Nom et prénom du représentant légal<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralassocnom[]" id="fd_moralassocnom_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralassocactivite_{n}">Activité<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralassocactivite[]" id="fd_moralassocactivite_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralassocemail_{n}">Mail<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralassocemail[]" id="fd_moralassocemail_{n}" type="email" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralassocadresse_{n}">Adresse<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralassocadresse[]" id="fd_moralassocadresse_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralassocpostal_{n}">Code Postal<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralassocpostal[]" id="fd_moralassocpostal_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralassocville_{n}">Ville<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralassocville[]" id="fd_moralassocville_{n}" type="text" value="" required>
						</div>
						<div class="row err-context">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_moralassocphone_{n}">Téléphone<span class="obligatory">*</span>&nbsp;:</label>
							<input name="fd_moralassocphone[]" id="fd_moralassocphone" type="tel" value="" required>
						</div>
						<div class="row">
							<label for="fd_moralassocpart_{n}">Nombre de part du capital social détenu en&nbsp;%&nbsp;:</label>
							<input name="fd_moralassocpart[]" id="fd_moralassocpart_{n}" type="text" value="">
						</div>
						<div class="row">
							<label class="form-domiciliation-maxilabel">Téléchargez les pièces suivantes&nbsp;:</label>
							<div class="row err-context">
								<div class="form-domiciliation-error">Merci de remplir ce champ</div>
								<label for="fd_moralassocpiece_pi1recto_{n}">Pièce identité recto de l’associé en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
								<input name="fd_moralassocpiece_pi1recto[]" id="fd_moralassocpiece_pi1recto_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" required>
							</div>
							<div class="row err-context">
								<div class="form-domiciliation-error">Merci de remplir ce champ</div>
								<label for="fd_moralassocpiece_pi1verso_{n}">Pièce identité verso de l’associé en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
								<input name="fd_moralassocpiece_pi1verso[]" id="fd_moralassocpiece_pi1verso_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" required>
							</div>
							<div class="row err-context">
								<div class="form-domiciliation-error">Merci de remplir ce champ</div>
								<label for="fd_moralassocpiece_pi2recto_{n}">Seconde Pièce identité de l’associé recto en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
								<input name="fd_moralassocpiece_pi2recto[]" id="fd_moralassocpiece_pi2recto_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" required>
							</div>
							<div class="row err-context">
								<div class="form-domiciliation-error">Merci de remplir ce champ</div>
								<label for="fd_moralassocpiece_pi2verso_{n}">Seconde Pièce identité verso de l’associé en couleur obligatoire<span class="obligatory">*</span>&nbsp;:</label>
								<input name="fd_moralassocpiece_pi2verso[]" id="fd_moralassocpiece_pi2verso_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG" required>
							</div>
							<div class="row">
								<label for="fd_moralassocpiece_facture_{n}">Justificatif de l’associé – facture domicile&nbsp;: facture énergie / téléphone de moins de 3&nbsp;mois&nbsp;:</label>
								<input name="fd_moralassocpiece_facture[]" id="fd_moralassocpiece_facture_{n}" type="file" accept=".jpg, .jpeg, .png, .pdf, .PDF, .JPG, .JPEG, .PNG">
							</div>
						</div>
					</div>
				</template>

				<div class="row">
					<input type="button" class="form-domiciliation-associe-add btn" id="new_template_phys" value="Ajouter une personne physique associée">
				</div>
				<div class="row">
					<input type="button" class="form-domiciliation-associe-add btn" id="new_template_morale" value="Ajouter une personne morale associée">
				</div>

				<!-- @changelog 16-03-2021 [EVOL] (Fabrice) Récupération du document sur la question n°9 (2021-3039) -->
				<div class="form-domiciliation-titre">9/ Attestation des Documents Comptables et Juridiques</div>
				<div class="form-domiciliation-attestation-outer">
					<p>
						Civilité <br />
						<input name="fd_attestation_civilite" type="radio" value="Monsieur" /> Monsieur
						<input name="fd_attestation_civilite" type="radio" value="Madame" /> Madame<br />
						Nom, Prénom
						<span title="Cliquez pour renseigner cette valeur" data-name="fd_attestation_nom" class="champ-inline" contenteditable="true"></span><br />
						Demeurant
						<span title="Cliquez pour renseigner cette valeur" data-name="fd_attestation_demeurant" class="champ-inline" contenteditable="true"></span><br />
						Agissant en qualité de
						<span title="Cliquez pour renseigner cette valeur" data-name="fd_attestation_qualite" class="champ-inline" contenteditable="true"></span><br />
						Pour la Société
						<span title="Cliquez pour renseigner cette valeur" data-name="fd_attestation_societe" class="champ-inline" contenteditable="true"></span><br />
						Domiciliée&nbsp;: Parc EDONIA, Bâtiment&nbsp;M, Rue des Iles Kerguelen 35760&nbsp;SAINT-GREGOIRE
					</p>
					<p>
						<strong>Certifie sur l’honneur que notre comptabilité est tenue&nbsp;à&nbsp;:
						<span title="Cliquez pour renseigner cette valeur" data-name="fd_attestation_compta" class="champ-inline large" contenteditable="true"></span></strong><br />
						<strong>Et les factures conservées à&nbsp;:
						<span title="Cliquez pour renseigner cette valeur" data-name="fd_attestation_factures" class="champ-inline large" contenteditable="true"></span></strong>
					</p>
					<p>
						Je m’engage, en cas de vérification, à mettre ces documents à la disposition de l’administration à l’adresse de la domiciliation, sous peine d’encourir les sanctions prévues à l’article L74 du Livre des Procédures Fiscales en cas d’opposition à un contrôle fiscal.
					</p>
					<p>
						Fait à Saint-Grégoire, le
						<span title="Cliquez pour renseigner cette valeur" data-name="fd_attestation_date" class="champ-inline" contenteditable="true"></span><br />
						Pour faire valoir ce que de droit.
					</p>
					<p>
						Pour la société&nbsp;:
						<span title="Cliquez pour renseigner cette valeur" data-name="fd_attestation_societe2" class="champ-inline" contenteditable="true"></span>
					</p>
					<input name="fd_attestation_nom" type="text" value="" required class="champ-inline-name" />
					<input name="fd_attestation_demeurant" type="text" value="" required class="champ-inline-name" />
					<input name="fd_attestation_qualite" type="text" value="" required class="champ-inline-name" />
					<input name="fd_attestation_societe" type="text" value="" required class="champ-inline-name" />
					<input name="fd_attestation_compta" type="text" value="" required class="champ-inline-name" />
					<input name="fd_attestation_factures" type="text" value="" required class="champ-inline-name" />
					<input name="fd_attestation_date" type="text" value="" required class="champ-inline-name" />
					<input name="fd_attestation_societe2" 	type="text" value="" required class="champ-inline-name" />
				</div>


				<div class="form-domiciliation-titre">10/ Définissez votre Domiciliation&nbsp;:</div>
				<p>- Dépôt de Garantie - prévoir un virement de 150&nbsp;€ - pas de&nbsp;TVA</p>
				<p>- Paiement du 1<sup>er</sup> trimestre de domiciliation - prévoir un virement de 144&nbsp;€&nbsp;TTC</p>

				<div class="form-domiciliation-titre">Quelles options choisissez-vous pour votre Domiciliation&nbsp;?</div>
				<div class="row">
					<div class="group_multi_checkbox" id="options_tableau">

						<div class="multi_checkbox">
							<label class="form-domiciliation-label-check">
								<input name="fd_courrierATS35" type="checkbox" class="checkbox" value="fd_courrierATS35">
								<span>Je choisis la mise à disposition de mes courriers chez&nbsp;ATS&nbsp;35</span>
							</label>
							<div class="form-domiciliation-small">Et je prends note de passer retirer mes courriers entre 9h30 et 12h du lundi au vendredi</div>
						</div>

						<div class="multi_checkbox">
							<label class="form-domiciliation-label-check">
								<input name="fd_reexpedition" type="checkbox" class="checkbox" value="fd_reexpedition" data-toggle="fd_reexpedition" data-enable="fd_reexpedition">
								<span>Je choisis la réexpédition du courrier</span>
							</label>
						</div>
						<div hidden class="err-context" data-hidden="fd_reexpedition">
							<div class="form-domiciliation-error">Merci de remplir ce champ</div>
							<label for="fd_reexpedition_adresse">Noter l’adresse à laquelle vous voulez recevoir vos courriers<span class="obligatory">*</span>&nbsp;:</label>
							<textarea name="fd_reexpedition_adresse" id="fd_reexpedition_adresse" data-toggleRequired></textarea>
						</div>
						<div hidden class="err-context" data-hidden="fd_reexpedition">
							<div class="group_multi_radio" data-disabled="fd_reexpedition">
								<div class="form-domiciliation-error">Merci de faire un choix</div>
								<p>Choisir la fréquence de réexpédition de vos courriers<span class="obligatory">*</span>&nbsp;:</p>
								<div class="multi_radio">
									<label class="form-domiciliation-label-check">
										<input name="fd_reexpedition_semaine" type="radio" class="radio" value="1" disabled data-toggleRequired>
										<span>Une fois semaine le jeudi</span>
									</label>
								</div>
								<div class="multi_radio">
									<label class="form-domiciliation-label-check">
										<input name="fd_reexpedition_semaine" type="radio" class="radio" value="2" disabled data-toggleRequired>
										<span>Deux fois semaine le lundi et jeudi</span>
									</label>
								</div>
								<div class="multi_radio">
									<label class="form-domiciliation-label-check">
										<input name="fd_reexpedition_semaine" type="radio" class="radio" value="3" disabled data-toggleRequired>
										<span>Deux fois par mois le 1<sup>er</sup> et 15 du mois</span>
									</label>
								</div>
								<div class="multi_radio">
									<label class="form-domiciliation-label-check">
										<input name="fd_reexpedition_semaine" type="radio" class="radio" value="4" disabled data-toggleRequired>
										<span>Une fois par mois le 1<sup>er</sup> du mois</span>
									</label>
								</div>
							</div>
						</div>

						<div class="multi_checkbox">
							<label class="form-domiciliation-label-check">
								<input name="fd_notificationSMS" type="checkbox" class="checkbox" value="fd_notificationSMS">
								<span>Notifications par SMS – abonnement mensuel 15&nbsp;euros par&nbsp;mois</span>
							</label>
							<div class="form-domiciliation-small">Nous vous avertissons en temps réel si vous avez reçu du courrier, un recommandé</div>
						</div>

						<div class="multi_checkbox">
							<label class="form-domiciliation-label-check">
								<input name="fd_notificationMail" type="checkbox" class="checkbox" value="fd_notificationMail">
								<span>Notifications par MAIL – abonnement mensuel 10&nbsp;euros par&nbsp;mois</span>
							</label>
							<div class="form-domiciliation-small">Nous vous avertissons en temps réel si vous avez reçu du courrier, un recommandé</div>
						</div>

						<div class="multi_checkbox">
							<label class="form-domiciliation-label-check">
								<input name="fd_scanCourrier" type="checkbox" class="checkbox" value="fd_scanCourrier">
								<span>Scann Courriers – abonnement mensuel 50&nbsp;euros par&nbsp;mois</span>
							</label>
							<div class="form-domiciliation-small">Tous les jours, nous scannons votre courrier et envoyons par mail votre courrier</div>
						</div>

					</div>
				</div>


				<div class="form-domiciliation-titre">11/ Conditions du service de domiciliation</div>
				<div class="group_multi_checkbox">
					<div class="multi_checkbox err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label class="form-domiciliation-label-check">
							<input name="fd_cgu" type="checkbox" class="checkbox" value="fd_cgu" required>
							<span>J'ai lu et j'accepte <a href="/media/conditions_ats35.pdf" target="_blank">les conditions du service de domiciliation</a></span>
						</label>
					</div>
				</div>

				<!-- @changelog 16-03-2021 [EVOL] (Fabrice) Récupération du document sur la question n°9 (2021-3039) -->
				<div class="group_multi_checkbox">
					<div class="multi_checkbox err-context">
						<div class="form-domiciliation-error">Merci de remplir ce champ</div>
						<label class="form-domiciliation-label-check">
							<input name="fd_attestation_accounting_legal_documents" type="checkbox" class="checkbox">
							<span>Inclure l'attestation des Documents Comptables et Juridiques</a></span>
						</label>
					</div>
				</div>

				<div class="form-domiciliation-titre">12/ Récapitulatif des options choisies</div>
				<div class="form-domiciliation-recap-titre">Vous avez choisi l’option&nbsp;trimestrielle&nbsp;:</div>
				<table class="form-domiciliation-tableau">
					<thead>
						<tr>
							<th>Services</th>
							<th>Tarifs</th>
							<th>Quantité</th>
							<th>Total HT</th>
							<th>Total TTC</th>
						</tr>
					</thead>
					<tbody class="form-domiciliation-tableau-lignes"></tbody>
				</table>

				<p class="form-domiciliation-mentions">
					Les informations sont collectées par <strong>ATS&nbsp;35</strong> en vue de la Gestion de formulaires de Domiciliation d’une société et des envois de messages.<br>
					Les données sont à seule destination de <strong>ATS&nbsp;35</strong>, de ses éventuels prestataires et des tiers autorisés dans l’objectif du respect de la Loi n° <em>90-614 du 12 juillet 1990</em>.<br>
					Pour plus d’information sur le traitement et vos droits sur vos données, <a href="https://www.ats35.fr/politique-de-vie-privee/" target="_blank">cliquez ici</a>.
				</p>

				<div class="form-domiciliation-boutons">
					<input class="form-domiciliation-submit btn" type="submit" name="sendend" value="Payer">
				</div>

			</div>

		</form>
	</div>
</div>


	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo site_url('/wp-content/plugins/MedialibsATS35SubscriptionForm/assets/js/customJs.js')?>"></script>
	