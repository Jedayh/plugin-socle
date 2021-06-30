<div class="wrap">
    <h1>Réglages plugin domiciliation</h1>

    <form name="form" action="options.php" method="post">
    	<?php settings_fields( 'domiciliation-settings-group' ); ?>
	    <?php do_settings_sections( 'domiciliation-settings-group' ); ?>
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th><label for="category_base">Titre : </label></th>
                    <td><input name="new_option_titre" id="new_option_titre" type="text" value="<?php echo esc_attr( get_option('new_option_titre') ); ?>" placeholder="Votre Domiciliation pour 40 euros HT par mois*" class="regular-text code" /></td>
                </tr>
                <tr>
                    <th><label for="tag_base">URL voir nos tarifs : </label></th>
                    <td><input name="new_option_url" id="new_option_url" type="text" placeholder="Voir nos Tarifs url" value="<?php echo esc_attr( get_option('new_option_url') ); ?>" class="regular-text code" /></td>
                </tr>
            </tbody>
        </table>

        <p class="submit"><input type="submit" name="submit_dom" id="submit_dom" class="button button-primary" value="Enregistrer les modifications" /></p>
    </form>
</div>
