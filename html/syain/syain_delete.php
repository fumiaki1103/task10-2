<?php
require_once('common.php');

$id = $_GET['id'] ?? '';
$error = get_error();

show_top();
echo <<<DELETE_FORM
<form action="post_data.php" method="post">
  <p>社員番号: {$id}</p>
  <p class="red">{$error}</p>
  <input type="hidden" name="id" value="{$id}">
  <input type="hidden" name="status" value="delete">
  <input type="submit" value="削除">
</form>
DELETE_FORM;
show_down(true);
?>
