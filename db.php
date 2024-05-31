<?
$con = new PDO("mysql:host=localhost;dbname=dtair", "root", "");
$session_id = bin2hex(random_bytes(32));
session_id($session_id);
session_start();
if (isset($_SESSION['rand'])) {
    unset($_SESSION['rand']);
} else {
    $_SESSION['rand'] = 'abobus';
}