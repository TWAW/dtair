<?
include_once "db.php";
session_start();
header("location: index.php");
if (!(isset($session_temp['login'])&&isset($session_temp['password']))) {
    $_SESSION['popup'] = "Упс, тебе сюда нельзя!";
    session_write_close();
    exit;
} else{
    $query = $con->prepare("SELECT * FROM users WHERE login = ?");
    $query->execute([$_SESSION['login']]);
    $data = $query->fetch();
    if ($_SESSION['password']!=$data['password']) {
        $_SESSION = null;
        $_SESSION['popup'] = "Ошибочка, войдите в аккаунт снова!";
        session_write_close();
        exit;
    }
}