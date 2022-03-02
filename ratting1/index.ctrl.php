<?php
$data['search'] = 'search';
$search = (isset($_GET['search']) && !empty($_GET['search'])) ? true : false;
$search_val = $func->clearStr($_GET['search']);
$search_query = ($search) ? "AND link LIKE '%{$search_val}%'": "";
$db->Query("SELECT * FROM PREFrating WHERE status = '2' {$search_query} ORDER BY date_last_up DESC");
$data['banners'] = $db->FetchAll();
$db->Query("SELECT COUNT(*) FROM PREFrating WHERE status = '1' AND paid_status = '2'");
$data['count_moderation'] = $db->FetchRow();
$gen->genAdmin('rating/index',$data);
