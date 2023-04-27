<?php
require 'database.php';
$data = new database;  
 $success_message = '';  
 if(isset($_POST["submit"]))  
 {  
      $insert_data = array(  
           'name'=>mysqli_real_escape_string($data->con, $_POST['name']),  
           'email'=>mysqli_real_escape_string($data->con, $_POST['email']),
           'address'=>mysqli_real_escape_string($data->con, $_POST['address']),
           'username'=>mysqli_real_escape_string($data->con, $_POST['username']));  
      if($data->insert('table', $insert_data))  
      {  
           $success_message = 'data inserted';  
      }       
 }  
 if(isset($_POST["edit"]))  
 {  
      $update_data = array(  
           'name'=>mysqli_real_escape_string($data->con, $_POST['name']),  
           'email'=>mysqli_real_escape_string($data->con, $_POST['email']),
           'address'=>mysqli_real_escape_string($data->con,$_POST['address']),
           'username'=>mysqli_real_escape_string($data->con,$_POST['username']));  
      $where_condition = array('email'=>$_POST["email"]);  
      if($data->update("table", $update_data, $where_condition))  
      {  
           header("location:index.php?updated=1");  
      }  
 }  
 if(isset($_GET["updated"]))  
 {  
      $success_message = 'data updated';  
 }  
 if(isset($_GET["delete"]))  
 {  
      $where = array('email'=>$_GET["email"]);  
      if($data->delete("table", $where))  
      {  
           header("location:index.php?deleted=1");  
      }  
 }  
 if(isset($_GET["deleted"]))  
 {  
      $success_message = 'data deleted';  
 }  