<?php
require_once('common.php');

$id = $_GET['id'] ?? '';
$member = $db->getSyain($id);
$name = $member['name'] ?? '';
$age = $member['age'] ?? '';
$work = $member['work'] ?? '';
$error = get_error();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>社員情報</title>
    <link href="css/style1.css" rel="stylesheet">
</head>
<body>
<?php
show_top('社員情報');
show_form($id, $name, $age, $work, $id, 'update', '社員情報の更新');

echo <<<DELETE_FORM
<form action="post_data.php" method="post">
  <input type="hidden" name="id" value="{$id}">
  <input type="hidden" name="status" value="delete">
  <input type="submit" value="社員情報を削除">
</form>
DELETE_FORM;

show_down(true);
?>
</body>
</html>
