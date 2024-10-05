<?php

function check_input($id, $name, $age, $work, &$error)
{
    $error = "";
    if ($id === "" || $name === "" || $age === "" || $work === "") {
        $error = '入力されていない項目があります';
        return false;
    }
    if (!preg_match("/^[1-3][0-9]{4}$/", $id)) {
        $error = 'IDには1～3ではじまる5桁の整数を入力してください';
        return false;
    }
    if (!is_numeric($age) || $age <= 0) {
        $error = '年齢には正の整数を入力してください';
        return false;
    }
    if (strlen($work) < 2) {
        $error = '勤務形態には2文字以上を入力してください';
        return false;
    }
    return true;
}
?>
