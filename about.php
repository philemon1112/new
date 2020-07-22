<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

 <style>
body{
    background:#F5F5F5;
}
.middle{
    position: absolute;
    top:50%;
    transform: translateY(-50%);
    width: 100%;
    text-align: center;
}
.btn1{
    display: inline-block;
    text-align: center;
    width: 65px;
    height: 65px;
    background: #f1f1f1;
    margin: 10px;
    border-radius: 30%;
    box-shadow:0 5px 15px -5px #00000070;
    color: #46bd55;
    overflow: hidden;
    position: relative;
}
.btn1 i{
    line-height: 65px;
    font-size: 26px;
    transition: 0.2s linear;
}
.btn1:hover i{
    transform: scale(1.3);
    color: #f1f1f1;
}
.btn1::before{
    content: "";
    position: absolute;
    width: 120%;
    height: 120%;
    background: #46bd55;
    transform:rotate(45deg);
    left: -110%;
    top:90%;

}
.btn1:hover::before{
    animation:  aaa 0.7s 1;
    top: -10%;
    left:-10%;
}
@keyframes aaa{
    0%{
    left: -110%;
    top:90%;
    }50%{
    top: -30%;
    left: 10%;

    }100%{
    top: -10%;
    left: -10%;

    }
}
</style>    

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

<!-- Image and text -->
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
                    echo "<a href='sellproduct.php'> Add Property </a>" ;
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
          <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hotels.php">properties</a>
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
        <li class="nav-item active">
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
        <li class="nav-item border rounded-circle mx-2 basket-icon">
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
  <div class="container">
    <div class="col-md-12">
         <ul class="breadcrumb bg-light">
             <li>
                 <a href="housemarket.php">Home</a>
             </li>
             <li>
                About Us 
             </li>
             <li>
             <i class="fas fa-users fa-lg fa-fw"></i>
             </li>
         </ul>
                        
    </div>
   </div>

<section class="about-company-section">
    <div class="container p-1 p-sm-3">
    <div class="row">
    <div class="col-12 text-center">
        <h3>About House Market</h3>
        <hr>
    </div>

    <?php
          $get_about = "select * from abouts";
          $run_about = mysqli_query($con,$get_about);

          while($row_about=mysqli_fetch_array($run_about)){
            $about = $row_about['desc1'];
            $logo_image = $row_about['logo'];

            echo " 
            <div class='col-md-3'>
              <img class='img-fluid' src='admin_area/admin_images/$logo_image'>

            </div>
            <div class='col-md-9'>
                 $about
            ";
          }

    ?>

    
        <ul>
            <a  class="btn1" href="https://wa.me/233560521963"><li><i class="fab fa-whatsapp fa-lg fa-fw"></i> 0560521963</li></a>
            <a  class="btn1" href="tel:233560521963"><li><i class="fa fa-phone fa-lg fa-fw"></i> housemarket</li></a>
            <a  class="btn1" href="mailto:philemonabakahmensah@gmail.com"><li><i class="fa fa-envelope fa-lg fa-fw"></i> housemarket@gmail.com</li></a>
            <a  class="btn1" href="https://www.instagram.com/housemarket2020/"><li><i class="fab fa-instagram fa-lg fa-fw"></i> @housemarket2020</li></a>
            <a  class="btn1" href="https://twitter.com/HouseMarket4?s=09"><li><i class="fab fa-twitter fa-lg fa-fw"></i>@HouseMarket4</li></a>
        </ul>
    </div>
</div>
</div>

</section>
<div class="container">
<section class="home-newsletter p-2 pt-md-2 pb-md-2">
    <div class="row">
        <div class="col-12 text-center">
            <h3>
                Subscribe To NewsLetter
            </h3>
            <form action= "" method="post" enctype="multipart/form-data">
            <div class="input-group p-3">
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter email here">
                
                    <button class="btn btn-primary" name="subscribe" type="submit">Subscribe</button>
                
            </div>
            </form>
        </div>
    </div>
</div>
</section>
<section class="pt-3 pb-4">
    <div class="container">
        <div class="row mt-4">
            <div class="col text-center">
                <h3>
                    Our Awesome Team
                </h3>
            </div>

        </div>
    
    <hr>
    <div class="row">
        <div class="col-md-4 text-center">
            <img class="img-fluid qualities-img p-4 "src="./assets/profile.png" alt="">
            <h5>
                CEO
            </h5>
            <P>
                <i>- Doc Carl </i>
            </P>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-fluid qualities-img p-4 "src="./assets/profile.png" alt="">
            <h5>
                Designer
            </h5>
            <P>
                <i>- Mr Ishmael </i>
            </P>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-fluid qualities-img p-4 "src="./assets/profile.png" alt="">
            <h5>
                Web Develpoer
            </h5>
            <P>
                <i>- Joana </i>
            </P>
        </div>
    </div>

    <div class="row mb-md-3">
        <div class="col-md-4 text-center">
            <img class="img-fluid qualities-img p-4 "src="./assets/profile.png" alt="">
            <h5>
                Web Developer
            </h5>
            <P>
                <i>- Philemon </i>
            </P>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-fluid qualities-img p-4 "src="./assets/profile.png" alt="">
            <h5>
                Android Develper
            </h5>
            <P>
                <i>- Philip </i>
            </P>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-fluid qualities-img p-4 "src="./assets/profile.png" alt="">
            <h5>
                Web Developer
            </h5>
            <P>
                <i>- Kelvin </i>
            </P>
        </div>
    </div>
    </div>
</section>

 
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


<?php 
     
     if(isset($_POST['subscribe'])){

    //getting the text data from the fields
    $email = $_POST['email'];

   $sql = "INSERT INTO subscribes (email,subdate) VALUES ('$email',NOW())";

   $db = mysqli_connect("localhost","root","","housemarket");

   $subscribe = mysqli_query($db, $sql); 
   if($subscribe){
       echo "<script>alert('You have subscribed successfully you will receive a newsletter within 24 hours')</script>";
        echo"<script>window.open('about.php','_self')</script>";
   }else{
       echo "<script>alert('subscription did not work')</script>";
   }
     }
?>
