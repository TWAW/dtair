<?
include_once "db.php";
include_once "auth.php";

$login = validate_input($_POST['login']);
$password = validate_input($_POST['password']);

$query = $con->prepare("SELECT * FROM users WHERE login = ?");
$query->execute([$login]);
session_start();

if (isset($query['id'])) {
    $_SESSION['popup'] = "Данный логин уже используется, попробуйте другой";
}else{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = $con->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
    $query->execute([$login, $hashed_password]);
}
session_write_close();
header("location: index.php");
exit;
// password_verify($input_password, $user['password'])