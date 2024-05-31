<?
include_once "db.php";
$stmt = $con->query("SHOW TABLES");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
foreach ($tables as $table) {
    $con->exec("DROP TABLE $table");
}
header("Location:installdb.php");
exit;