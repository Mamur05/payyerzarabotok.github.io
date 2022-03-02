<?php
$db->Query("SELECT * FROM PREFrating WHERE status = '1' AND paid_status = '2' ORDER BY date_add ASC");
$data['banners'] = $db->FetchAll();
$gen->genAdmin('rating/moderation',$data);
