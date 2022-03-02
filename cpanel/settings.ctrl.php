<?php
// get_pconf
$db->Query("SELECT * FROM PREFpconf WHERE id = '1'");
$data['pconf'] = $db->FetchArray();
// get_admin
$db->Query("SELECT login FROM PREFadmin WHERE id = '1'");
$data['admin'] = $db->FetchArray();
// get_conf
$db->Query("SELECT * FROM PREFconfigs WHERE id = '1'");
$data['conf'] = $db->FetchArray();

// gen_page
$gen->genAdmin('settings',$data);
