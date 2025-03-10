<?php include 'links.php' ?>

<div class="container1 w-100 p-10">
    <div class="row">
        <div class="w-100 text-center">
            <div class="h1">University Admission Management</div>
        </div>
    </div>
</div>
<head>
    <style>
        body {
            background-image: url('https://sso.ucmo.edu/authenticationendpoint/ellucian/theme/background/UCM_Spring.jpg');
            background-size: cover;
            background-position: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<head>
<link rel="stylesheet" href="static/css/mystyle.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
        $('.menu').click(function() {
            $('.overlay').toggleClass('anim');
            $(this).addClass('open')
        });

        $('.open').click(function(){
            $('.overlay').toggleClass('reverse-animation');
        })
    });

  </script>
</head>

<div class="container1 w-100">
    <div class="nav-item">
        <div class="nav-menu ">
            <div class="nav-menu-item"><a href="student_home.php" class="nav-link text-danger p-15">Student Home</a></div>
            <div class="nav-menu-item"><a href="student_profile.php"class="nav-link text-black p-15">Profile</a></div>
            <div class="nav-menu-item"><a href="view_universities.php" class="nav-link text-black p-15">View Universities</a></div>
            <div class="nav-menu-item"><a href="view_application.php" class="nav-link text-black p-15">View Applications</a></div>
            <div class="nav-menu-item"><a href="logout.php" class="nav-link text-black p-15">Logout</a></div>
        </div>
    </div>
    </div>
</div>

<!-- <div class="navbar">
    <span class="menu"></span>
    <div class="title">
    </div>
    <div class="overlay">
        <ul>
            <li><a href="student_home.php">Student Home</a></li>
            <li><a href="student_profile.php">Profile</a></li>
            <li><a href="view_universities.php">View Universities</a></li>
            <li><a href="view_application.php">View Applications</a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>
    </div>
</div> -->
