<?PHP
if (isset($_POST["m_operation_id"]) && isset($_POST["m_sign"])){
	$time = time();
	$db->Query("SELECT * FROM PREFpconf WHERE id = '1'");
	$payeer_conf = $db->FetchArray();
	$m_key = $payeer_conf['shop_key'];
	$arHash = array($_POST['m_operation_id'],
		$_POST['m_operation_ps'],
		$_POST['m_operation_date'],
		$_POST['m_operation_pay_date'],
		$_POST['m_shop'],
		$_POST['m_orderid'],
		$_POST['m_amount'],
		$_POST['m_curr'],
		$_POST['m_desc'],
		$_POST['m_status'],
		$m_key);
	$sign_hash = strtoupper(hash('sha256', implode(":", $arHash)));
	if ($_POST["m_sign"] == $sign_hash && $_POST['m_status'] == "success"){
		// get_order
		$order_id = intval($_POST['m_orderid']);
		$db->Query("SELECT * FROM PREFinserts WHERE id = '{$order_id}'");
		if($db->NumRows() == 0){ echo htmlspecialchars($_POST['m_orderid'])."|error"; exit;}
		$order_row = $db->FetchArray();

		// check_status
		if(intval($order_row["status"]) > 1){ echo htmlspecialchars($_POST['m_orderid'])."|success"; exit;}

		// set_status
		$db->Query("UPDATE PREFinserts SET status = '2' WHERE id = '{$order_id}'");

		// check_transaction_type
		switch ($order_row['transaction_type']) {
			case 'add_rating':
				$db->Query("SELECT * FROM PREFrating WHERE object_key = '{$order_row['object_key']}'");
				$rating_data = $db->FetchArray();
				$db->Query("UPDATE PREFrating SET paid_status = '2',transaction_id = '{$order_row['id']}' WHERE id = '{$rating_data['id']}'");
				$mail = new mail();
				$link = 'http://'.$_SERVER['HTTP_HOST'].'/control/'.$rating_data['object_key'];
				$mail->addRatingMessage($rating_data['email_user'],$link);
				break;
			case 'up_rating':
				$time = time();
				$db->Query("SELECT * FROM PREFrating WHERE object_key = '{$order_row['object_key']}'");
				$rating_data = $db->FetchArray();
				$db->Query("UPDATE PREFrating SET date_last_up = '{$time}' WHERE id = '{$rating_data['id']}'");
				$mail = new mail();
				$link = 'http://'.$_SERVER['HTTP_HOST'].'/control/'.$rating_data['object_key'];
				$mail->upRatingMessage($rating_data['email_user'],$link);
				break;
			case 'buy_banner':
				$db->Query("SELECT * FROM PREFbuy_banners WHERE object_key = '{$order_row['object_key']}'");
				$banner_data = $db->FetchArray();
				$db->Query("UPDATE PREFbuy_banners SET status = '2', transaction_id = '{$order_id}'
							WHERE object_key = '{$order_row['object_key']}'");
				$db->Query("SELECT buy_banner_emails FROM PREFconfigs WHERE id = '1'");
				$mails = $db->FetchRow();
				$mails = explode("\r\n",$mails);
				$mail = new mail();
				foreach ($mails as $mail_a) {
					$mail->sendBuyBanner($mail_a,$banner_data['json_message'],$banner_data['user_email']);
				}
				break;
			default:
				echo htmlspecialchars("|error");
				exit;
				break;
		}

		// return
		echo htmlspecialchars($_POST['m_orderid'])."|success";
		exit;
	}
	echo htmlspecialchars($_POST['m_orderid'])."|error";
	exit;
}
echo htmlspecialchars("|error");
exit;
?>
