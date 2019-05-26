<h1> Add User </h1><br>
<a href="../index.php">Home</a>
<style>
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<div>
<form action="" method="post">
<!--Name:<br>
<input type="text" name="name" placeholder="Name"><br>
Lastname:<br>
<input type="text" name="lastname" placeholder="Lastname"><br>
E-mail:<br>
<input type="text" name="e-mail" placeholder="username"><br>
Telephone:<br>
<input type="text" name="telephone" placeholder="username"><br>-->
Username:<br>
<input type="text" name="username" placeholder="username"><br>
Password:<br>
<input type="text" name="password" placeholder="password"><br>

<input type="submit" name="Submit" value="Submit">
</div>

<?php

require_once '../includes/DbOperations.php';

if(isset($_POST['Submit'])){

    $db = new DbOperations();

    $result = $db->createUser($_POST['username'],$_POST['password']);

    if($result == 1){
        echo "<br><br><font color=green>Username ".$_POST['username']." registered successfully</font>";
    }elseif($result == 2){
        echo "<br><br>Some error occurred";
    }elseif($result == 0){
       echo "<br><br><font color=red>You are already registered</font>";
    }


}else{
        //echo "<br><br><font color=blue>Put information here</font>";
    }
