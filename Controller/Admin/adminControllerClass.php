<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class AdminController{

 	protected static $instanceName = NULL, $plugin;

		public function __construct()
		{
			static::$plugin  = basename(ATS_35);
			$this->hook();
		}

		public function hook()
		{
			add_action('admin_menu', array($this, 'adminMenuConf'));
			add_action( 'admin_init', array($this,'registerDomSetting' ));
			add_action('init', array($this,'custom_post_domiciliation'), 10);
			add_filter( 'manage_souscription_posts_columns', array($this,'set_custom_edit_souscription_columns' ));
			add_action( 'manage_souscription_posts_custom_column' , array($this,'custom_souscription_column'), 10, 2 );
			add_filter( 'post_row_actions', array($this,'remove_view_link_actions'), 10, 1 );
			add_action( 'admin_enqueue_scripts', array($this,'admin_custom_style'));
		}

		public function adminMenuConf()
		{
		    add_submenu_page( 'options-general.php', 'Domiciliation config', 'Domiciliation config','manage_options', 'domiciliation-config', array ($this, 'templateAdmin' ));
		    add_submenu_page('edit.php?post_type=souscription',false,false,'manage_options','souscription-detail',array($this,'templateDetailSouscription'));

		}
		public function admin_custom_style() {
			 wp_enqueue_style( 'admin-style', site_url('/wp-content/plugins/MedialibsATS35SubscriptionForm/assets/css/') . '/admin-custom.css' );
		}

		public function registerDomSetting() {
			register_setting( 'domiciliation-settings-group', 'new_option_titre' );
			register_setting( 'domiciliation-settings-group', 'new_option_url' );
		}
		public function templateAdmin()
		{
			require ATS_35.'/View/Admin/admin-view.php';
		}
		public function custom_post_domiciliation() 
		{
			$labels = array(
				'name'                => _x('Souscriptions', 'Post Type General Name', 'ats35'),
				'singular_name'       => _x('Souscription', 'Post Type Singular Name', 'ats35'),
				'menu_name'           => __('Souscriptions', 'ats35'),
				'name_admin_bar'      => __('Souscriptions', 'ats35'),
				'parent_item_colon'   => __('Parent Item:', 'ats35'),
				'all_items'           => __('All Items', 'ats35'),
				'add_new_item'        => __('Add New Item', 'ats35'),
				'add_new'             => __('Add New', 'ats35'),
				'new_item'            => __('New Item', 'ats35' ),
				'edit_item'           => __('Edit Item', 'ats35'),
				'update_item'         => __('Update Item', 'ats35'),
				'view_item'           => __('View Item', 'ats35'),
				'search_items'        => __('Search Item', 'ats35'),
				'not_found'           => __('Not found', 'ats35'),
				'not_found_in_trash'  => __('Not found in Trash', 'ats35'),
			);
			$rewrite = array(
				'slug'                => _x('souscription', 'souscription', 'ats35'),
				'with_front'          => true,
				'pages'               => true,
				'feeds'               => false,
			);
			$args = array(
				'label'               => __('souscription', 'ats35'),
				'description'         => __('Souscriptions', 'ats35'),
				'labels'              => $labels,
				'supports'            => array('title','revisions','custom-fields'),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-admin-site-alt3',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => false,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'query_var'           => 'souscription',
				'rewrite'             => $rewrite,
				'capability_type'     => 'page',
			);
			register_post_type('souscription', $args);
		}

		public function set_custom_edit_souscription_columns($columns) {
		    unset( $columns['author'] );
		    unset( $columns['title'] );
		    unset( $columns['date'] );
		    $columns['souscription_title'] = __( 'Identifiant', 'ats35' );
		    $columns['souscription_juridique'] = __( 'Nom juridique', 'ats35' );
		    $columns['souscription_date'] = __( 'Date de souscription', 'ats35' );
		    $columns['souscription_motant'] = __( 'Montant', 'ats35' );
		    $columns['souscription_status'] = __( 'Statut du paiement', 'ats35' );
		    $columns['souscription_view'] = __( 'View', 'ats35' );

		    return $columns;
		}

		
		public function custom_souscription_column( $column, $post_id ) {
		    switch ( $column ) {
		    	case 'souscription_title' :
		        	echo get_the_title( $post_id );
		            break;
		        case 'souscription_juridique' :
		        	$name = get_post_meta($post_id, 'subscription_fd_nomjuridique', true);
		        	echo $name;
		            break;
		        case 'souscription_date' :
		        	$date = get_the_date('j F Y', $post_id);
		        	echo $date;
		            break;
		        case 'souscription_motant' :
		        	$motant = get_post_meta($post_id, 'subscription_total_all', true);
		        	echo $motant;
		            break;
		        case 'souscription_status' :
		        	$status = get_post_meta($post_id, 'subscription_status_payement', true);
		        	if ($status == 'succes') {
		        		echo '<a href="#" class="button btn-succes">Términer</a>';
		        	} elseif ($status == 'cancel') {
		        		echo '<a href="#" class="button btn-cancel">Annuler</a>';
		        	} elseif ($status == 'notif') {
		        		echo '<a href="#" class="button btn-notif">Annuler</a>';
		        	} elseif ($status != 'notif' && $status != 'cancel' && $status != 'succes') {
		        		echo '<a href="#" class="button btn-notif">En attente</a>';
		        	}
		            break;

		        case 'souscription_view' :
		        	echo '  <a href="'.site_url('/wp-admin/edit.php?post_type=souscription&page=souscription-detail&id='.$post_id).'" class="button button-primary">
							  Détails
							</a>';
		            break;

		    }
		}

		public function templateDetailSouscription() {
			require ATS_35.'/View/Admin/souscription-detail.php';
		}

		public function remove_view_link_actions( $actions )
		{
		    if( get_post_type() === 'souscription' )
		    {
		        unset( $actions['view'] );
		    }
		    return $actions;
		}
		


}