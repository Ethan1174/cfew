<?php
require('functMysql.php');
session_start();

if (isset($_POST['rpe']))
	$sql = sprintf("SELECT * FROM bien WHERE status = 1 AND rpe IN ('%s')", $_POST['rpe']);
else
	$sql = sprintf("SELECT * FROM bien WHERE status = 1 AND rpe IN ('%s')", $_SESSION['rpe']);

$resArray = getArraySQL($sql, "bmpc", true);
$resArray["params"] = $_POST;
header('Content-type: application/json; charset=utf-8');
echo json_encode($resArray);
