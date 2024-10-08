<?php
require_once('common.php');

$members = $db->getAllSyain();
show_top();
show_syainlist($members);
show_down();
?>
