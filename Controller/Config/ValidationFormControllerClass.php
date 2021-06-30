<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class ValidationFormController{

 		protected static $baseName;

		public function __construct()
		{
		}

		public function start($post, $files) 
		{
				$post_id = wp_insert_post(array (
				   'post_type' => 'souscription',
				   'post_title' => "SUBSCRIPTION-".date('d-m-Y-H:m:s'),
				   'post_status' => 'publish'
				));

				foreach ($post as $key => $value) {
					if (!empty($post[$key])) {
						$label = strtolower('subscription_'.$key);
						if (is_array($post[$key])) {
							$dataValueArray = implode('#!!_#', $value);
							update_post_meta( $post_id, $label, $dataValueArray );
						} else {
							update_post_meta( $post_id, $label, $value );
						}
						
					}
					
				}
				foreach ($files as $keyFile => $file) {
					if (!empty($_FILES[$keyFile])) {
						$label = strtolower('subscription_'.$keyFile);
						if (is_array($_FILES[$keyFile]['name'])) {
							foreach ($_FILES[$keyFile] as $keyName => $valueName) {
								$fileName 		= $_FILES[$keyFile]['name'];
								
								$fileTmpName  	= $_FILES[$keyFile]['tmp_name'];
								foreach ($fileName as $keyFileName => $$valueFileName) {
									$this->moveUpload($fileName[$keyFileName], $fileTmpName[$keyFileName]);								}
								$fileNameData = implode('#!!_#', $fileName);
							   update_post_meta( $post_id, $label, site_url('/wp-document/'.$fileNameData) );
							}
						} else {
								$fileName 		= $_FILES[$keyFile]['name'];
							    $fileTmpName  	= $_FILES[$keyFile]['tmp_name'];
							    $this->moveUpload($fileName, $fileTmpName);
								   update_post_meta( $post_id, $label, site_url('/wp-document/'.$fileName) );
						}

						//header('Location:'.site_url('/payement/?order='.$post_id));
				}
			}
		}

		public function moveUpload($fileName, $fileTmpName) {
			$currentDirectory = getcwd();
			$uploadDirectory = "\wp-content\wp-document\\";
			$uploadPath 	= $currentDirectory . $uploadDirectory . basename($fileName);
			$didUpload 		= move_uploaded_file($fileTmpName, $uploadPath);
		}
}