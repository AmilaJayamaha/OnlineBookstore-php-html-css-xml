<?php
if(isset($_POST["submit"])){
  $userName = $_POST["email"];
  $password = $_POST["password"];

  require_once "dbh.inc.php";
  require_once "functions.inc.php";

  $emptyInputslogin = emptyInputslogin($username, $pwd);
  $loginUser = loginUser($username, $pwd);
  
  if(emptyImputs($userName,$password) !== false){
    exit();
  }
  loginUser($userName,$password);

}
else{
    header("location:../login.php");
}

