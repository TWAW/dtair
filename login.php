<?
include_once "db.php";
session_start();
$login = validate_input($_POST['login']);
$password = validate_input($_POST['password']);
if (isset($session_temp['login'])&&isset($session_temp['password'])) {
    $query = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $query->execute([$login]);
    $data = $query->fetch();
    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $_SESSION['popup'] = "Неверный логин или пароль";
    }
}else{
    $_SESSION['popup'] = "Упс, тебе сюда нельзя!";
}
session_write_close();
header("location: index.php");
exit;