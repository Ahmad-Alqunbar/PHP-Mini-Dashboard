<?php 
include 'connectDatabase.php';
include 'User.php';
$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    if ($user->login($username, $password)) {
        header("Location: friendsInformation.php");
    } else {
        $error_message = "Login failed. Please check your username and password.";
    }
}
        ?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="./assets/css/loginStyle.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>login page</title>
  </head>
  <body>
  <div class="container login">
            <div class="row">         
                <div class="col-lg-12 panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="https://theinnovationmakers.com/webuser/mintech/assets/images/logo/logo-light.png" alt="car-key" border="0">
                                
                                <?php
                                        if (isset($error_message)) {
                                            echo "<p style='color: red;'>$error_message</p>";
                                        }
                                ?>
                                <form id="register-form" action="index.php"role="form" autocomplete="off" class="form" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="user_name" name="user_name" placeholder="Username" class="form-control"  type="text"Required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="password" name="password" placeholder="Password" class="form-control"  type="password"Required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input  class="btn btn-lg btn-warning btn-block" value="Login" type="submit">
                                    </div>

                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>