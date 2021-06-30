<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="container">
	<div id="text">
	    <div class="formulaire form-domiciliation">
	        <div>
	            <h3>La transaction de paiement a bien été enregistrée</h3>
	            <table class="form-domiciliation-tableau">
	                <tbody class="form-domiciliation-tableau-lignes">
	                    <tr>
	                        <td>Date et heure</td>
	                        <td><?php echo $paymentInfos['transaction']['date'];?></td>
	                    </tr>
	                    <tr>
	                        <td>Numéro de transaction</td>
	                        <td><?php echo $paymentInfos['transaction']['id'];?></td>
	                    </tr>
	                    <tr>
	                        <td>Montant de la transaction</td>
	                        <td>
	                        	<?php 
	                        	$amount = floatval($paymentInfos['payment']['amount']);
	                        	echo number_format((float)$amount, 2, '.', '');
	                        	?> €</td>
	                    </tr>
	                    <tr>
	                        <td>Autorisation N°</td>
	                        <td><?php echo $paymentInfos['authorization']['number'];?></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
	        <a href="<?php echo site_url('/souscription/');?>">Retour</a>
	    </div>
	</div>
</div>