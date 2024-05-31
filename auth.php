<?
include_once "db.php";
if (!(isset($session_temp['login'])&&isset($session_temp['password']))) {
    session_start();
    $_SESSION['popup'] = "Упс, тебе сюда нельзя!";
    session_write_close();
    header("location: index.php");
    exit;
}