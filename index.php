<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="properties.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>

<!-- Image and text -->

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<?php
          $get_banner = "SELECT * from banners LIMIT 0,1";
          $run_banner = mysqli_query($con,$get_banner);

          while($row_banner=mysqli_fetch_array($run_banner)){
            $ban_link = $row_banner['ban_link'];
            $ban_image = $row_banner['ban_image'];

            echo " 
            
   
    <div class='carousel-item active'>
      <a href='$ban_link'>
<img src='admin_area/banner_images/$ban_image' style='width:100%;'>
</a>
    </div>
    ";
          }
    $get_banner = "SELECT * from banners LIMIT 1,10";
          $run_banner = mysqli_query($con,$get_banner);

          while($row_banner=mysqli_fetch_array($run_banner)){
            $ban_link = $row_banner['ban_link'];
            $ban_image = $row_banner['ban_image'];
            echo "
    <div class='carousel-item'>
      <a href='$ban_link'>
<img src='admin_area/banner_images/$ban_image' style='width:100%;'>
</a>
    </div>
    
  ";
          }
    ?>
    </div>
</div>


<header>

<nav class="navbar navbar-dark">
    <div class="container">
    <a class="navbar-brand" href="#">
      
      House Market
    </a>
    <div class="col-md-6">
      <ul class="menu">
        <li>
          <a class="navbar-brand" href="#">
        <?php
                if(!isset($_SESSION['username'])){
                    echo "Welcome: Guest";
                }else{
                    echo "Welcome: " . $_SESSION['username'] ."" ;
                }
?>
</a>
</li>
        <li><?php
                if(!isset($_SESSION['username'])){
                    echo "<a href='login.php'> Login </a>";
                }else{
                    echo "<a href='logout.php'> Logout </a>" ;
                }
                ?></li>
          <li><?php
                if(!isset($_SESSION['username'])){
                    echo "<a href='signup.php'> Create An Account </a>";
                }else{
                    echo "<a href='sellproduct.php'> Add Your Property </a>" ;
                }
?>
</li>
          
      </ul>
    </div>
    
</div>
</nav>
</header>

  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><span class="sr-only">(current)</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          <a class="nav-link" href="#">Home</a> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hotels.php">Properties</a>
        </li>
        <li class="nav-item">
            <?php
                    if(!isset($_SESSION['username'])){
                        echo"<a class='nav-link' href='login.php'>My Account</a>";
                    }else{
                        echo"<a class='nav-link' href='customer/my_account.php?my_favourites'>My Account</a>";
                    }
                ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
        
      </ul>
      <form method="get" action="result.php" class="form-inline my-2 my-lg-0" enctype="multipart/form-data">
        <input class="form-control mr-sm-2" type="search" name="user_query" placeholder="Search property here" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
      </form>
      <div class="navbar-nav">
        <li class="nav-item border rounded-circle mx-2">
            <?php
                    if(!isset($_SESSION['username'])){
                        echo"<a href='login.php'><i class='far fa-heart p-3'></i></a>";
                    }else{
                        echo"<a href='wishlist.php'><i class='far fa-heart p-3'></i></a>";
                    }
                ?>
        </li>
    </div>
    </div>
  </nav>
  
  

  <body>
<style>
  body{
    background:#F5F5F5;
}
</style>
    <div class="banner"></div>
    <br>
      <div class="container">
<div class="alert alert-success" role="alert">
  <strong><h4>Search by Category Type</h4></strong>
</div>

          <div class="card-deck">
            <?php
          getCat();
      ?>
          </div>
        </div>
      </div>
      <br>
    <div class="container">
      <div class="alert alert-success" role="alert">
        <strong><h4>Recently Added</h4></strong>
      </div>

      <?php
          getPro();
      ?>

      <div class="alert alert-success" role="alert">
      <strong><h4>Best Rated</h4></strong>
    </div>
    
      <?php
          getBestPro();
      ?>
</div>
</div>
</div>
 
</div>
</div>
</div>
</div>   
<div class="banner"></div>
   
   
<?php
include("includes/footer.php");
  ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

