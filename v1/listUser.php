<h1> List User </h1>
<?php

require_once '../includes/DbOperations.php';

$db = new DbOperations();

$sql = "SELECT `username`, `value` FROM `radcheck`";
$result = $db->getData($sql);

//echo implode("-",$result[1]);

foreach ($result as $res) {
        echo implode("--",$res)."<br>";
    }
?>