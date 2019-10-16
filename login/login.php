<?php

session_start();

//TODO: do not hardcode, get from database
const login = 'admin';
const password = 'admin';

if (isset($_POST['login']) && isset($_POST['password'])) //when form submitted
{
    $_SESSION['login'] = $_POST['login']; //write login to server storage
    header('Location: http://localhost/prototype_project_database-master/login/');
}

?>

<form method="post">
  Login:<br><input name="login"><br>
  Password:<br><input name="password"><br>
  <input type="submit">
</form>