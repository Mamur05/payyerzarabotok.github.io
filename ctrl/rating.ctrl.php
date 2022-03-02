<?php
$search = (isset($_GET['search']) && !empty($_GET['search'])) ? true : false;
$search_val = $func->clearStr($_GET['search']);
$data['search'] = $search_val;
$search_query = ($search) ? "AND link LIKE '%{$search_val}%'": "";
$db->Query("SELECT * FROM PREFrating WHERE status = '2' {$search_query} ORDER BY date_last_up DESC");
$data['banners'] = $db->FetchAll();
$db->Query("SELECT add_rating_price,add_button FROM PREFconfigs WHERE id = '1'");
$add_data = $db->FetchArray();
$data['add_price'] = sprintf('%.2f',$add_data['add_rating_price']);
$data['add_button'] = sprintf('%.2f',$add_data['add_button']);
$gen->genPage('rating',$data);
