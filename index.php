<?php

require_once 'includes/DbOperations.php';

$db = new DbOperations();
 
$result = $db->getAllUser();

?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="v1/addUser.php">Add User</a><br/><br/>
 
    <table width='50%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Username</td>
        <td>Password</td>
        <td>Update</td>
    </tr>
    <?php 
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$res['username']."</td>";
        echo "<td>".$res['value']."</td>";   
        echo "<td><a href=\"v1/editUser.php?username=$res[username]\">Edit</a> | <a href=\"v1/deleteUser.php?username=$res[username]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
</body>
</html>