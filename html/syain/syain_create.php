<?php
require_once('common.php');

$id = $_GET['id'] ?? '';
$name = $_GET['name'] ?? '';
$age = $_GET['age'] ?? '';
$work = $_GET['work'] ?? '';
$error = get_error();

show_top();
if ($error) {
    echo "<p style='color: red;'>$error</p>";
}
show_form($id, $name, $age, $work, '', 'create', '登録');
show_down(true);
?>
