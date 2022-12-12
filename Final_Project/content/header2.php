<?php
require_once('../database/settings.php');
require_once('../functions/sessionHelper.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>title</title>
      
  <!-- Navbar content -->
          <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
              
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Property Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tenants.php">Tenants</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="account.php">Account</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="../login/signout.php">Sign Out</a>
        </li>
        </ul>
      </div>  
    <a class="navbar-brand" href="createhouse.php">Add Property</a>
  </div>
</nav>

<style>
    html{margin: 15px;}
    body {
        padding-top: 50px;
        background-color: slategrey;
    }
    h1{color: tan; text-align: center;}
      </style>
  </head>
    <body>

