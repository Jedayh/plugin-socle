<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="container">
	<div id="text">
	    <div class="formulaire form-domiciliation">
	    	<div>
            <h2>Récapitulatif des commandes</h2>
            <table>
		    <thead>
		        <tr>
		            <th style="text-align: left;">Services</th>
		            <th style="text-align: left;">Tarifs</th>
		            <th style="text-align: left;">Quantité</th>
		            <th style="text-align: left;">Total HT</th>
		            <th style="text-align: left;">Total TTC</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php if ($depot_garant) : ?>
		        <tr>
		            <td>Dépôt de garantie</td>
		            <td><?php if ($depot_garant) {echo $depot_garant;}?></td>
		            <td><?php if ($depot_quant) { echo $depot_quant; } ?></td>
		            <td> &nbsp; </td>
	            	<td><?php if ($depot_garant) { echo $depot_garant; }?></td>
		        </tr>
		    	<?php endif; ?>
		    	<?php if ($dom_tarif) : ?>
		        <tr>
		            <td>Domiciliation</td>
		            <td><?php if ($dom_tarif) { echo $dom_tarif; } ?></td>
		            <td><?php if ($dom_quant) { echo $dom_quant; }?></td>
		            <td><?php if ($dom_total_ht) { echo $dom_total_ht; }?></td>
		            <td><?php if ($dom_total_ttc) { echo $dom_total_ttc; } ?></td>
		        </tr>
		        <?php endif;?>
		        <?php if ($sms_tarif) : ?>
		        <tr>
		            <td>Option SMS</td>
		            <td><?php if ($sms_tarif) { echo $sms_tarif; } ?></td>
		            <td><?php if ($sms_quant) { echo $sms_quant; } ?></td>
		            <td><?php if ($dom_total_ht) { echo $dom_total_ht; } ?></td>
		            <td><?php if ($dom_total_ttc) { echo $dom_total_ttc; } ?></td>
		        </tr>
		        <?php endif;?>
		        <?php if ($mail_tarif) : ?>
		        <tr>
		            <td>Option mail</td>
		            <td><?php if ($mail_tarif) { echo $mail_tarif; } ?></td>
		            <td><?php if ($mail_quant) { echo $mail_quant; } ?></td>
		            <td><?php if ($mail_ht) { echo $mail_ht; } ?></td>
		            <td><?php if ($mail_ttc) { echo $mail_ttc; } ?> </td>
		        </tr>
		        <?php endif;?>
		        <?php if ($scan_tarif) : ?>
		        <tr>
		            <td>Scann courriers</td>
		            <td><?php if ($scan_tarif) { echo $scan_tarif; } ?></td>
		            <td><?php if ($scan_quant) { echo $scan_quant; } ?></td>
		            <td><?php if ($scan_ht) { echo $scan_ht; } ?></td>
		            <td><?php if ($scan_ttc) { echo $scan_ttc; } ?></td>
		        </tr>
		        <?php endif;?>
		        <tr>
		            <td colspan="3">&nbsp;</td>
		            <td>&nbsp;</td>
		            <td>&nbsp;</td>
		        </tr>
		        <tr>
		            <td colspan="4">Total</td>
		            <td><?php if ($total_all) { echo $total_all; }?></td>
		        </tr>
		    </tbody>
		</table>
        </div>
        <div>
            <a href="<?php echo $datas['paymentUrl'];?>">
                Payer par Citélis
            </a>
        </div>
	        <a href="<?php echo site_url('/souscription/');?>">Retour</a>
	    </div>
	</div>
</div>