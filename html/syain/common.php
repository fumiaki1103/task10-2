<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('app/Database.php');
require_once('app/html_func.php');
require_once('app/check.php');

$db = new Database();

function get_error()
{
  $error = "";
  if (isset($_GET['error'])) {
    $error = htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8');
  }
  return $error;
}
?>
