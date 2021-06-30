$('.champ-inline[data-name]').on('input',function(e){
			var paste = e.originalEvent.inputType=='insertFromPaste' ? true : false;
			var name = $(this).data('name');
			var val = $(this).text().trim();
			if(paste){
				$(this).text(val);
			}
			$('[name="'+name+'"]').val(val);
		});

		// Préremplissage de la date actuelle
		const d = new Date();
		const ye = new Intl.DateTimeFormat('fr', { year: 'numeric' }).format(d);
		const mo = new Intl.DateTimeFormat('fr', { month: 'long' }).format(d);
		const da = new Intl.DateTimeFormat('fr', { day: 'numeric' }).format(d);
		var date = `${da} ${mo} ${ye}`;
		$('[data-name="fd_attestation_date"]').text(date);
		$('[name="fd_attestation_date"]').val(date);

		// Affichage des parties masquées en fonction de checkboxes
		$('[data-toggle]').change(function(){
			var cible = $('[data-hidden="'+$(this).data('toggle')+'"]');
			if($(this).prop('checked')){
				cible.slideDown()
					 .find('[data-toggleRequired]').attr('required',true);
			}else{
				cible.slideUp()
					 .find('[data-toggleRequired]').removeAttr('required');
			}
		});
		// Affichage des parties masquées en fonction de radios
		$('[data-toggle-radio]').change(function(){
			$(this).parents('.group_multi_radio').find('[type="radio"]').each(function(){
				var cible = $('[data-hidden="'+$(this).data('toggle-radio')+'"]');
				if($(this).prop('checked')){
					cible.slideDown()
						 .find('[data-toggleRequired]').attr('required',true);
				}else{
					cible.slideUp()
						 .find('[data-toggleRequired]').removeAttr('required');
				}
			});
		});
		// Affichage des parties masquées en fonction de selects
		$('[data-toggle-select]').change(function(){
			$(this).find('option').each(function(){
				var cible = $('[data-hidden="'+$(this).data('toggle-option')+'"]');
				if($(this).prop('selected')){
					cible.slideDown()
						 .find('[data-toggleRequired]').attr('required',true);
				}else{
					cible.slideUp()
						 .find('[data-toggleRequired]').removeAttr('required');
				}
			});
		});
		// Activation des parties désactivées en fonction de radio ou checkboxes
		$('[data-enable]').change(function(){
			var cible = $('[data-disabled="'+$(this).data('enable')+'"]');
			if($(this).prop('checked')){
				cible.find('input').removeAttr('disabled');
				cible.find('[data-toggleRequired]').attr('required',true);
			}else{
				cible.find('input').attr('disabled',true);
				cible.find('[data-toggleRequired]').removeAttr('required');
			}
		});

		// Vérifie la validité à chaque étape :
		// renvoie true si aucune erreur n'est détectée
		function fd_checkNextStep(step){
			var retour = true;
			$('.form-domiciliation-step[data-step="'+step+'"] input, .form-domiciliation-step[data-step="'+step+'"] select, .form-domiciliation-step[data-step="'+step+'"] textarea').each(function(){
				if(!$(this)[0].checkValidity()){
					$(this).parents('.err-context').find('.form-domiciliation-error').fadeIn(150);
					retour = false;
				}else{
					$(this).parents('.err-context').find('.form-domiciliation-error').fadeOut(150);
				}
			});
			if(retour){
				fd_updateTotal();
			}
			return retour;
		}

		// Validation du formulaire :
		$('#form_domiciliation').submit(function(e){
			if(!fd_checkNextStep(4)){
				e.preventDefault();
			}
		});

		// Gestion des associés complémentaires
		n_tpl_phys = 0, n_tpl_moral = 0; // initialisation de l'intrémentation
		// Ajout d'un associé personne physique
		$('#new_template_phys').click(function(){
			var html = $('#fd_template_assocPhysique').html().replace(/\{n\}/gi,n_tpl_phys); // récupération du template et application de l'incrémentation
			n_tpl_phys++; // incrémentation
			$(this).before(html); // création du code
			changePhone();
		});
		// Ajout d'un associé personne morale
		$('#new_template_morale').click(function(){
			var html = $('#fd_template_assocMorale').html().replace(/\{n\}/gi,n_tpl_moral); // récupération du template et application de l'incrémentation
			n_tpl_moral++; // incrémentation
			$(this).before(html); // création du code
			// @changelog 2021-02-19 [EVOL] (Robson) Ajouter l'evenement sur les champs tel -->
			changePhone();
		});
		// Retrait d'un associé
		$('.form-domiciliation-step').on('click','.form-domiciliation-associe-remove',function(){
			$(this).parent().remove();
		});


		$('#options_tableau input').change(function(){
			fd_updateTotal();
		});

		fd_updateTotal();
		// Calcul récapitulatif
		function fd_updateTotal(){
			// Tarifs des différentes options et autres frais :
			var fd_tarifs = {
				'total_depot':150,
				'reglement_tri':40,
				'option_sms':15,
				'option_mail':10,
				'option_scan':50,
				'total_tva':0.2,
			};
			// Récupération des choix de l'internaute :
			var fd_actives = {
				'option_sms': $('[name="fd_notificationSMS"]').prop('checked') ? 1 : 0,
				'option_mail':$('[name="fd_notificationMail"]').prop('checked') ? 1 : 0,
				'option_scan':$('[name="fd_scanCourrier"]').prop('checked') ? 1 : 0,
			};
			// Calcul du total :
			var total_ttc = (fd_tarifs.total_depot) +
				(fd_tarifs.reglement_tri*3*(1+fd_tarifs.total_tva)) +
				(fd_actives.option_sms*fd_tarifs.option_sms*3*(1+fd_tarifs.total_tva)) +
				(fd_actives.option_mail*fd_tarifs.option_mail*3*(1+fd_tarifs.total_tva)) +
				(fd_actives.option_scan*fd_tarifs.option_scan*3*(1+fd_tarifs.total_tva));

			// Code HTML du tableau :
			var html = '';
				html+=  '<tr>'+
							'<td class="form-domiciliation-tableau-label">Dépôt de garantie</td>'+
							'<td data-label="Tarif">'+fd_cur(fd_tarifs.total_depot)+'<input type="hidden" name="depot_garant" value="'+fd_cur(fd_tarifs.total_depot)+'"></td>'+
							'<td data-label="Quantité">1 <input type="hidden" name="depot_quant" value="1"></td>'+
							'<td></td>'+
							'<td data-label="Total TTC">'+fd_cur(fd_tarifs.total_depot*1)+'<input type="hidden" name="depot_garant" value="'+fd_cur(fd_tarifs.total_depot)+'"></td>'+
						'</tr>';
				html+=  '<tr>'+
							'<td class="form-domiciliation-tableau-label">Domiciliation</td>'+
							'<td data-label="Tarif">'+fd_cur(fd_tarifs.reglement_tri)+'<input type="hidden" name="dom_tarif" value="'+fd_cur(fd_tarifs.reglement_tri)+'"></td>'+
							'<td data-label="Quantité">3 <input type="hidden" name="dom_quant" value="3"></td>'+
							'<td data-label="Total HT">'+fd_cur(fd_tarifs.reglement_tri*3)+'<input type="hidden" name="dom_total_ht" value="'+fd_cur(fd_tarifs.reglement_tri*3)+'"></td>'+
							'<td data-label="Total TTC">'+fd_cur(fd_tarifs.reglement_tri*3*(1+fd_tarifs.total_tva))+'<input type="hidden" name="dom_total_ttc" value="'+fd_cur(fd_tarifs.reglement_tri*3*(1+fd_tarifs.total_tva))+'"></td>'+
						'</tr>';
				if(fd_actives.option_sms==1){
					html+=  '<tr>'+
								'<td class="form-domiciliation-tableau-label">Option SMS</td>'+
								'<td data-label="Tarif">'+fd_cur(fd_tarifs.option_sms)+'<input type="hidden" name="sms_tarif" value="'+fd_cur(fd_tarifs.option_sms)+'"></td>'+
								'<td data-label="Quantité">3 <input type="hidden" name="sms_quant" value="3"></td>'+
								'<td data-label="Total HT">'+fd_cur(fd_tarifs.option_sms*3)+'<input type="hidden" name="sms_ht" value="'+fd_cur(fd_tarifs.option_sms*3)+'"></td>'+
								'<td data-label="Total TTC">'+fd_cur(fd_tarifs.option_sms*3*(1+fd_tarifs.total_tva))+'<input type="hidden" name="sms_ttc" value="'+fd_cur(fd_tarifs.option_sms*3*(1+fd_tarifs.total_tva))+'"></td>'+
							'</tr>';
				}
				if(fd_actives.option_mail==1){
					html+=  '<tr>'+
								'<td class="form-domiciliation-tableau-label">Option mail</td>'+
								'<td data-label="Tarif">'+fd_cur(fd_tarifs.option_mail)+'<input type="hidden" name="mail_tarif" value="'+fd_cur(fd_tarifs.option_mail)+'"></td>'+
								'<td data-label="Quantité">3 <input type="hidden" name="mail_quant" value="3"></td>'+
								'<td data-label="Total HT">'+fd_cur(fd_tarifs.option_mail*3)+'<input type="hidden" name="mail_ht" value="'+fd_cur(fd_tarifs.option_mail*3)+'"></td>'+
								'<td data-label="Total TTC">'+fd_cur(fd_tarifs.option_mail*3*(1+fd_tarifs.total_tva))+'<input type="hidden" name="mail_ttc" value="'+fd_cur(fd_tarifs.option_mail*3*(1+fd_tarifs.total_tva))+'"></td>'+
							'</tr>';
				}
				if(fd_actives.option_scan==1){
					html+=  '<tr>'+
								'<td class="form-domiciliation-tableau-label">Scann courriers</td>'+
								'<td data-label="Tarif">'+fd_cur(fd_tarifs.option_scan)+'<input type="hidden" name="scan_tarif" value="'+fd_cur(fd_tarifs.option_scan)+'"></td>'+
								'<td data-label="Quantité">3 <input type="hidden" name="scan_quant" value="3"></td>'+
								'<td data-label="Total HT">'+fd_cur(fd_tarifs.option_scan*3)+' <input type="hidden" name="scan_ht" value="'+fd_cur(fd_tarifs.option_scan*3)+'"></td>'+
								'<td data-label="Total TTC">'+fd_cur(fd_tarifs.option_scan*3*(1+fd_tarifs.total_tva))+'<input type="hidden" name="scan_ttc" value="'+fd_cur(fd_tarifs.option_scan*3*(1+fd_tarifs.total_tva))+'"></td>'+
							'</tr>';
				}
				html+=  '<tr class="form-domiciliation-tableau-total">'+
							'<td class="form-domiciliation-tableau-label">TOTAL à payer</td>'+
							'<td colspan="3"></td>'+
							'<td>'+fd_cur(total_ttc)+' <input type="hidden" name="total_all" value="'+fd_cur(total_ttc)+'"></td>'+
						'</tr>';
			// Application du html :
			$('.form-domiciliation-tableau-lignes').html(html);
		}

		// Renvoie la valeur formatée :
		function fd_cur(valeur){
			return Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(valeur);
		}

		$(document).ready(function() {
			$('input[type="text,radio,file,checkbox"],select').change(function(event) {
				$(this).parents('.err-context').find('.form-domiciliation-error').fadeOut(150)
			});
			$('#fd_capital').keyup(function(event) {
				$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				if ($(this).val() !== "" && $.isNumeric($(this).val().replace(/\s/g,''))) {
					$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				} else {
					$(this).parents('.err-context')
						   .prepend('<div class=\"validation-error\">Le capital doit être numérique</div>');
				}
			});

			$('#fd_physinpart').keyup(function(event) {
				$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				if ($(this).val() !== "" && $.isNumeric($(this).val().replace(/\s/g,''))) {
					$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				} else {
					$(this).parents('.err-context')
						   .prepend('<div class=\"validation-error\">Le capital doit être numérique</div>');
				}
			});
			$('#fd_moralinpart').keyup(function(event) {
				$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				if ($(this).val() !== "" && $.isNumeric($(this).val().replace(/\s/g,''))) {
					$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				} else {
					$(this).parents('.err-context')
						   .prepend('<div class=\"validation-error\">Le capital doit être numérique</div>');
				}
			});

			$('input[name="fd_physassocpart"').change(function(event) {
				console.log(event);
			})
			$('#fd_siret').keyup(function(event) {
				$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				if ($(this).val() !== "" && $(this).val().length == 14) {
					$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				} else {
					$(this).parents('.err-context')
						   .prepend('<div class=\"validation-error\">Le siret doit être composé de 14 caractères</div>');
				}
			});
			changePhone();

			$('input[name="fd_repres"]').change(function(event) {
				var checkedFdPres = $('input[name="fd_repres"]:checked').val();
				console.log(checkedFdPres);
				if (checkedFdPres == 'morale') {
					$('div[data-hidden="fd_repres_physique"]').find('input').val('');
					$('div[data-hidden="fd_repres_physique"]').find('.validation-error').remove();
				} else if (checkedFdPres == 'physique') {
					$('div[data-hidden="fd_repres_morale"]').find('input').val('')	;
					$('div[data-hidden="fd_repres_morale"]').find('.validation-error').remove();
				}
			});
		});
		function changePhone() {
			$('input[type="tel"]').keyup(function(event) {
				$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				if ($(this).val() !== "" && $(this).val().replace(/\s/g, '').length == 10) {
					$(this).parents('.err-context')
				 	.find('.validation-error').remove();
				} else {
					$(this).parents('.err-context')
						   .prepend('<div class=\"validation-error\">Le N° de téléphone doit comporter 10 Chiffres</div>');
				}
			});
		}



