<?php
// check_url
if (isset($url[3]) && !empty($url[3])) {
	$id = $func->clearInt($url[3]);
	// get_data
	$db->Query("SELECT * FROM PREFaccounts WHERE id = '{$id}'");
	if ($db->NumRows() > 0) {
		$user_data = $db->FetchArray();
		$data['user'] = $user_data;
		// select_stats
		$db->Query("SELECT
			(SELECT COUNT(*) FROM PREFaccounts WHERE ref_id = '{$id}') count_refs
		");
		$data += $db->FetchArray();
		// select_payments
		$db->Query("SELECT * FROM PREFpayments WHERE user_id = '{$id}' ORDER BY id DESC");
		$data['payments'] = $db->FetchAll();
		// select_referer
		if ($user_data['ref_id'] != '0') {
			$db->Query("SELECT * FROM PREFaccounts WHERE id = '{$user_data['ref_id']}'");
			$ref_data = $db->FetchArray();
			$data['referer'] = array(
				'id' => $ref_data['id'],
				'payeer_purse' => $ref_data['payeer_purse']);
		}else $data['referer'] = 0;
		$gen->genAdmin('user',$data);
	}else header('location:/');
}else header('location:/');
