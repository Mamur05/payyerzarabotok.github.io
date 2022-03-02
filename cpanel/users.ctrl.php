<?php
$data['pag'] = '0';
$data['search'] = 'payeer';
if (isset($_GET['payeer']) && !empty($_GET['payeer'])) {
	$search = $func->clearStr($_GET['payeer']);
	$db->Query("SELECT * FROM PREFaccounts WHERE payeer_purse LIKE '%{$search}%'");
	$data['users'] = $db->FetchAll();
	$gen->genAdmin('users',$data);
	return;
}
$sub_search = (isset($url[3]) || !empty($url[3])) ? "WHERE group_id = '{$url[3]}'" : "";
$db->Query("SELECT * FROM PREFaccounts {$sub_search} ORDER BY id DESC");
if ($db->NumRows() > 0) {
	$all_rows = intval($db->NumRows());
	$per_page = 20;
	$pages = $all_rows / $per_page;
	$page = (isset($_GET['page'])) ? $func->clearInt($_GET['page']) : '1';
	$pag = new pagination();
	$link = (!isset($url[3]) || empty($url[3])) ? '/cpanel/users' : '/cpanel/users/'.$url[3];
	$data['pag'] = ($pages > 1) ? $pag->getPages($pages,$page,$link) : '0';
	$start = ($page - 1) * $per_page;
	$db->Query("SELECT * FROM PREFaccounts {$sub_search} ORDER BY id DESC LIMIT $start,$per_page");
	$data['users'] = $db->FetchAll();
}else $data['users'] = array();
$gen->genAdmin('users',$data);
