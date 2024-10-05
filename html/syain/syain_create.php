<?php
require_once('common.php');

$name = $_GET['name'] ?? '';
$age = $_GET['age'] ?? '';
$work = $_GET['work'] ?? '';
$error = $_GET['error'] ?? '';

show_top("社員情報の追加");
show_form("", htmlspecialchars($name, ENT_QUOTES, 'UTF-8'), htmlspecialchars($age, ENT_QUOTES, 'UTF-8'), htmlspecialchars($work, ENT_QUOTES, 'UTF-8'), "", "create", "登録");
echo "<p class='red'>" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</p>";
show_down(true);
?>
