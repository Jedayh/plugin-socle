<?php
if ( ! defined( 'ABSPATH' ) ) exit;
require_once ATS_35 . '/Controller/Config/Citelis/CitelisPay.class.php';
class PayementController{

 	protected static $baseName;
 	public static $citelisPay;
 	public static $post_id;

		public function __construct()
		{
			static::$citelisPay = new \Controller\Config\Citelis\CitelisPay();
			static::$baseName = basename(ATS_35);
			if (!empty($_GET['order'])) {
				static::$post_id = $_GET['order'];
			}
			$this->hookPayement();
			$this->paymentStatus();
		}

		public function hookPayement()
		{
			add_shortcode('payement_detail', array($this,'payementDetail'));
		}

		public function payementDetail()
		{
			if (!empty($_GET['action']) && !empty(static::$post_id) && !empty($_GET['paylinetoken'])) {
				$paymentInfos = $this->paymentStatus();
				if ($_GET['action'] == 'succes' && $paymentInfos['result']['code'] == 0000) {
					update_post_meta( static::$post_id, 'subscription_status_payement' , 'succes' );
					ob_start();
						require ATS_35.'/View/Front/payment-succes.php';
					return ob_get_clean();
				} else {
					update_post_meta( static::$post_id, 'subscription_status_payement' , 'notif' );
					ob_start();
						require ATS_35.'/View/Front/payment-notif.php';
					return ob_get_clean();
				}
				if ($_GET['action'] == 'cancel') {
					update_post_meta( static::$post_id, 'subscription_status_payement' , 'cancel' );
					ob_start();
						require ATS_35.'/View/Front/payment-cancel.php';
					return ob_get_clean();
				} 
				if ($_GET['action'] == 'notif') {
					update_post_meta( static::$post_id, 'subscription_status_payement' , 'notif' );
					ob_start();
						require ATS_35.'/View/Front/payment-notif.php';
					return ob_get_clean();
				}

			} elseif (empty($_GET['action']) && empty($_GET['paylinetoken']) && !empty(static::$post_id)) {
				
				$datas 		  	= $this->specifPaymentDatas();
				// echo '<pre>';
				// var_dump($datas);
				// echo '</pre>';
				$depot_garant 	= $this->depotGarant(static::$post_id);
				$depot_quant 	= $this->depotQuant(static::$post_id);
				$dom_tarif 		= $this->domTarif(static::$post_id);
				$dom_quant 		= $this->domQuant(static::$post_id);
				$dom_total_ht 	= $this->domTotalHt(static::$post_id);
				$dom_total_ttc 	= $this->domTotalTtc(static::$post_id);
				$sms_tarif 		= $this->smsTarif(static::$post_id);
				$sms_quant 		= $this->smsQuant(static::$post_id);
				$sms_ht 		= $this->smsTotalHt(static::$post_id);
				$sms_ttc 		= $this->smsTotalTtc(static::$post_id);
				$mail_tarif 	= $this->mailTarif(static::$post_id);
				$mail_quant 	= $this->mailQuant(static::$post_id);
				$mail_ht 		= $this->mailTotalHt(static::$post_id);
				$mail_ttc 		= $this->mailTotalTtc(static::$post_id);
				$scan_tarif 	= $this->scanTarif(static::$post_id);
				$scan_quant 	= $this->scanQuant(static::$post_id);
				$scan_ht 		= $this->scanTotalHt(static::$post_id);
				$scan_ttc 		= $this->scanTotalTtc(static::$post_id);
				$total_all 		= $this->TotalAll(static::$post_id);
				ob_start();
					require ATS_35.'/View/Front/payment-detail.php';
				return ob_get_clean();
			} 
		}

		public function paymentStatus() {
			if ((!empty($_GET['action']) && !empty($_GET['paylinetoken'])) || !empty($paymentDatas)) {
	            $datas        = ['token' => $_GET['paylinetoken']];
	        	$paymentInfos = static::$citelisPay->getTransactionDetails($datas);
	        	update_post_meta( static::$post_id, 'subscription_date_heure_transaction' , $paymentInfos['transaction']['date'] );
	        	update_post_meta( static::$post_id, 'subscription_code' , $paymentInfos['result']['code'] );
	        	update_post_meta( static::$post_id, 'subscription_paylinetoken' , $_GET['paylinetoken'] );
	        	update_post_meta( static::$post_id, 'subscription_number_transaction' , $paymentInfos['transaction']['id'] );
	        	update_post_meta( static::$post_id, 'subscription_motant_transaction' , $paymentInfos['payment']['amount']);
	        	update_post_meta( static::$post_id, 'subscription_autorisation_transaction' , $paymentInfos['authorization']['number'] );
	        	return $paymentInfos;
	        }
		}

		public function specifPaymentDatas() {
			$totalValue = $this->totalValueMeta(static::$post_id);
			$title 		= $this->titleValueMeta(static::$post_id);
			if (empty($_SESSION['specif_payment_datas'][static::$post_id])) {
				$datas = [
		                'cancelURL'       => site_url("/payement/?action=cancel&order=").static::$post_id,
		                'returnURL'       => site_url("/payement/?action=succes&order=").static::$post_id,
		                'notificationURL' => site_url("/payement/?action=notif&order=").static::$post_id,
		                'payment'         =>
		                [
		                    'amount'   => $totalValue,
		                    'currency' => \Controller\Config\Citelis\CitelisPay::CURRENCY,
		                    'action'   => 101,
		                ],
		                'order'           => [
		                    'ref'      => $title,
		                    'amount'   => $totalValue,
		                    'currency' => \Controller\Config\Citelis\CitelisPay::CURRENCY,
		                    'date'     => date('d/m/Y H:i'),
		                ],
		            ];
		            static::$citelisPay->callDopayement($datas);
		            if (static::$citelisPay->isInitialised()) {
		            	// /var_dump('if');
		                $datas = [
		                    'paymentUrl'       => static::$citelisPay->paymentUrl(),
		                    'token'            => static::$citelisPay->token()
		                ];
		                $_SESSION['specif_payment_datas'][static::$post_id] = $datas;
		            }
		        } else {
		            $datas = $_SESSION['specif_payment_datas'][static::$post_id];
		        }
		        return $datas;
		}


		public function totalValueMeta($post_id) {
			$total_all 		= get_post_meta( $post_id, 'subscription_total_all', true );
			$totalReplace 	= str_replace("€", '', $total_all);
			$totalCent 		= floatval($totalReplace)*100;
			$totalValue 	= $totalCent/100;
			return $totalValue;
		}
		public function titleValueMeta($post_id) {
			return get_the_title( $post_id );
		}

		public function depotGarant($post_id) {
			return get_post_meta( $post_id, 'subscription_depot_garant', true );
		}
		public function depotQuant($post_id) {
			return get_post_meta( $post_id, 'subscription_depot_quant', true );
		}
		public function domTarif($post_id) {
			return get_post_meta( $post_id, 'subscription_dom_tarif', true );
		}
		public function domQuant($post_id) {
			return get_post_meta( $post_id, 'subscription_dom_quant', true );
		}
		public function domTotalHt($post_id) {
			return get_post_meta( $post_id, 'subscription_dom_total_ht', true );
		}
		public function domTotalTtc($post_id) {
			return get_post_meta( $post_id, 'subscription_dom_total_ttc', true );
		}
		public function smsTarif($post_id) {
			return get_post_meta( $post_id, 'subscription_sms_tarif', true );
		}
		public function smsQuant($post_id) {
			return get_post_meta( $post_id, 'subscription_sms_quant', true );
		}
		public function smsTotalHt($post_id) {
			return get_post_meta( $post_id, 'subscription_sms_ht', true );
		}
		public function smsTotalTtc($post_id) {
			return get_post_meta( $post_id, 'subscription_sms_ttc', true );
		}
		public function mailTarif($post_id) {
			return get_post_meta( $post_id, 'subscription_mail_tarif', true );
		}
		public function mailQuant($post_id) {
			return get_post_meta( $post_id, 'subscription_mail_quant', true );
		}
		public function mailTotalHt($post_id) {
			return get_post_meta( $post_id, 'subscription_mail_ht', true );
		}
		public function mailTotalTtc($post_id) {
			return get_post_meta( $post_id, 'subscription_mail_ttc', true );
		}
		public function scanTarif($post_id) {
			return get_post_meta( $post_id, 'subscription_scan_tarif', true );
		}
		public function scanQuant($post_id) {
			return get_post_meta( $post_id, 'subscription_scan_quant', true );
		}
		public function scanTotalHt($post_id) {
			return get_post_meta( $post_id, 'subscription_scan_ht', true );
		}
		public function scanTotalTtc($post_id) {
			return get_post_meta( $post_id, 'subscription_scan_ttc', true );
		}
		public function TotalAll($post_id) {
			return get_post_meta( $post_id, 'subscription_total_all', true );

		}
		public function getOneSubscription($post_id) {
			$args = array( 
			  'post_type'		=> 'souscription',
			  'post__in'        => array($post_id)
			);
			$onSub = get_posts($args);

			return $onSub;
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
new PayementController();