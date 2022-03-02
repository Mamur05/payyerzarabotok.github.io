<?php
$db->Query("SELECT * FROM PREFpayments WHERE status = '2' ORDER BY id DESC");
if ($db->NumRows() > 0) {
	$all_rows = intval($db->NumRows());
	$per_page = 20;
	$pages = $all_rows / $per_page;
	$page = (isset($_GET['page'])) ? $func->clearInt($_GET['page']) : '1';
	$pag = new pagination();
	$link = '/cpanel/payments';
	$data['pag'] = ($pages > 1) ? $pag->getPages($pages,$page,$link) : '0';
	$start = ($page - 1) * $per_page;
	$db->Query("SELECT * FROM PREFpayments WHERE status = '2' ORDER BY id DESC LIMIT $start,$per_page");
	$data['payments'] = $db->FetchAll();
}else $data['payments'] = array();
$gen->genAdmin('payments',$data);
