<?php
if ( ! defined( 'ABSPATH' ) ) exit;
require_once (ATS_35 . '/Controller/Config/ValidationFormControllerClass.php');
require_once (ATS_35 . '/Controller/Config/DocumentUpdateControllerClass.php');
class SubscriptionController{

 	protected static $baseName;
 	public static $dir;

		public function __construct()
		{
			static::$dir = '/wp-content/wp-document/';
			static::$baseName = basename(ATS_35);
			$this->hookFront();
		}

		public function hookFront()
		{
			add_shortcode('subscription_form', array($this,'formSubscription'));
		}

		public function formSubscription()
		{
			if (!empty($_POST['sendend'])) {
				$this->postValue($_POST, $_FILES);
			}

			ob_start();
				require ATS_35.'/View/Front/subscription-view.php';
			return ob_get_clean();
		}

		public function postValue($post, $files) {
			
			
				$post_id = wp_insert_post(array (
				   'post_type' => 'souscription',
				   'post_title' => "SUBSCRIPTION-".date('d-m-Y-H:m:s'),
				   'post_status' => 'publish' //private
				));

				foreach ($post as $key => $value) {
					if (!empty($post[$key])) {
						$label = strtolower('subscription_'.$key);
						if (is_array($post[$key])) {
							$dataValueArray = implode('#!!_#', $value);
							update_post_meta( $post_id, $label , $dataValueArray );
						} else {
							update_post_meta( $post_id, $label , $value );
						}
						
					}
					
				}
				if (!empty($post['fd_attestation_accounting_legal_documents'])) {
					$this->generateDoc($post, $post_id);
				}
				foreach ($files as $keyFile => $file) {
					if (!empty($_FILES[$keyFile])) {
						$label = strtolower('subscription_'.$keyFile);
						if (is_array($_FILES[$keyFile]['name'])) {
							foreach ($_FILES[$keyFile] as $keyName => $valueName) {
								$fileName 		= $_FILES[$keyFile]['name'];
								
								$fileTmpName  	= $_FILES[$keyFile]['tmp_name'];
								foreach ($fileName as $keyFileName => $valueFileName) {
									$this->moveUpload($fileName[$keyFileName], $fileTmpName[$keyFileName]);								}
								$fileNameData = implode('#!!_#', $fileName);
							    update_post_meta( $post_id, $label, site_url(static::$dir.$fileNameData) );
							}
						} else {
								$fileName 		= $_FILES[$keyFile]['name'];
							    $fileTmpName  	= $_FILES[$keyFile]['tmp_name'];
							    $this->moveUpload($fileName, $fileTmpName);
								   update_post_meta( $post_id, $label, site_url(static::$dir.$fileName) );
						}
						$this->redirect(site_url('/payement/?order='.$post_id), 500);
				}
			}
		}

		public function generateDoc($post, $post_id)
	    {
			$civilite = $post['fd_attestation_civilite'];
			$nom = $post['fd_attestation_nom'];
			$demeur = $post['fd_attestation_demeurant'];
			$qualite = $post['fd_attestation_qualite'];
			$societe = $post['fd_attestation_societe'];
			$compta = $post['fd_attestation_compta'];
			$facture = $post['fd_attestation_factures'];
			$date = $post['fd_attestation_date'];
			$societe2 = $post['fd_attestation_societe2'];
	        $searches = [
	            '#NOM#',
	            '#DEMEURANT#',
	            '#QUALITE#',
	            '#SOCIETE#',
	            '#COMPTA#',
	            '#FACTURES#',
	            '#DATE#',
	            '#SOCIETE2#',
	        ];
	        $replaces = [
	            $civilite . ' ' . $nom,
	            $demeur,
	            $qualite,
	            $societe,
	            $compta,
	            $facture,
	            $date,
	            $societe2,
	        ];
	        $docUpdater        = new DocumentUpdater();
	        $currentDirectory = getcwd();
	        $uploadDirectory = static::$dir;
	        $docName           = strtolower($nom) . '_' . time() . '.doc';
	        $docOutputFullPath = $currentDirectory . $uploadDirectory . $docName;
	        $docUpdater->processReplacement($searches, $replaces, $docOutputFullPath);
	        update_post_meta( $post_id, 'subscription_doc_link', site_url(static::$dir.$docName) );
	        return $docName;
	    }

		public function moveUpload($fileName, $fileTmpName) {
			$currentDirectory = getcwd();
			$uploadDirectory = static::$dir;
			$uploadPath 	= $currentDirectory . $uploadDirectory . basename($fileName);
			$didUpload 		= move_uploaded_file($fileTmpName, $uploadPath);
		}

		public function redirect($url, $time) {
		?>
			<script type="text/javascript">
				var url = '<?php echo $url;?>';
				var time = '<?php echo $time;?>';
 				setTimeout(function(){
		            window.location.href = url;
		        }, time);
			</script>
		<?php
		}

}
new SubscriptionController();