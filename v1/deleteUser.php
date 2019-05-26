<?php

require_once '../includes/DbOperations.php';
 
$db = new DbOperations();
 
$username = ($_GET['username']);
$result = $db->deleteUser($username);
 
if ($result) {
    header("Location:http://localhost/mikrotik/index.php");
}
?>