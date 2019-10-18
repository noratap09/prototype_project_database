<?php
include "login_control.php";

ck_logout();

?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/main.css"> <!--import css file-->
    </head>
    <body>
        <div class="bg">
            <div class="bg-image-login">
                <div class="bg-login">
                    <form class="login-form" action="1.php?category=products" method="post">
                        <span class="login-logo">
                            <img src="image\logo.png" class="login-logo-image">
                        </span>

                        <span>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee ID</label>
                                <input name="username" type="email" class="form-control" id="exampleInputEmail1">
                            </div>

                            <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input name="password" type="password" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div>
                                <input type="button" value="Forgot Password" class="btn btn-danger">
                                <input type="submit" value="Login" class="btn btn-primary">
                            </div>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>