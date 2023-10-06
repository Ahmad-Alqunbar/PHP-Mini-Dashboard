<?php
session_start(); 

include "connectDatabase.php"; 
require_once 'Information.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $city = $_POST['city'];

    $friendsInfo = new Information($conn);
    $result = $friendsInfo->insertFriend($name, $phone, $email, $country, $city);

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/css/friendsInformationStyle.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
    <title>Friends Informations</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffc107;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Innovation Makers</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="informationList.php">List Friends Informations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="friendsInformation.php">Add Friends Informations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>Friends Informations</h3>
               <?php

                if (isset($_SESSION['message'])) {
                       echo "<p style='color: red;'>". $_SESSION['message']. "</p>";
                    unset($_SESSION['message']); 
                }
                    ?>
            <div class="card">
            <form method="post"action="friendsInformation.php">
            <div class="row mb-3">
                <div class="col">
                <input type="text" name="name"class="form-control" placeholder="name"Required>
                </div>
                <div class="col">
                <input type="text" name="phone"class="form-control" placeholder="phone"Required>
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col">
                <input type="text"name="email" class="form-control" placeholder="email"Required>
                </div>
                <div class="col">
                <input type="text"name="country" class="form-control" placeholder="country"Required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                    <select class="form-control" id="city"name="city"Required>
                        <option value="0">Select City</option>
                        <option value="Amman">Amman</option>
                        <option value="Zarqa">Zarqa</option>
                        <option value="Maan">Maan</option>
                        <option value="Jarsh">Jarsh</option>
                        <option value="Salt">Salt</option>
                    </select>
                 </div>
                </div>
             </div>
             <div class="row mb-3">
                <div class="col-md-12">
                    <button type="submit"class="btn btn-warning btn-block">Submit</button>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>