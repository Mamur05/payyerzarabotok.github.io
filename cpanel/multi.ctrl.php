<?php
$data = array();
$db->Query("SELECT last_ip,payeer_purse,ban,id,date_reg FROM PREFaccounts WHERE ban = '1'");
if ($db->NumRows() > 0){
	$users = $db->FetchAll();
	$ips = array();
	foreach ($users as $user) {
		if (array_key_exists($user['last_ip'], $ips)) {
			$ips[$user['last_ip']][] = $user;
		}else {
			$ips[$user['last_ip']] = array($user);
		}
	}
	$n = 0;
	foreach ($ips as $ip => $usrs) {
		if (count($usrs) > 1) {
			foreach ($usrs as $usr) {
				$data['users'][$n] = $usr;
				$n++;
			}
		}
	}
}
$data['users'] = (isset($data['users']) && count($data['users']) > 0) ? $data['users'] : array();
$gen->genAdmin('multi',$data);
