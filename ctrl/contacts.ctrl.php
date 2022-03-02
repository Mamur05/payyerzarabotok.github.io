<?php
$db->Query("SELECT * FROM PREFconfigs WHERE id = '1'");
$data = $db->FetchArray();
$gen->genPage('contacts',$data);
