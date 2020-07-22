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
html{
    scroll-behavior: smooth;
}
.sell{
    width:100%;
    height:95%;
    background-image: url('admin_area/admin_images/home.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

@media screen and (max-width:959px){
   .sell{
       width:100%;
       height:50%;
   }
}
@media screen and (max-width:640px){
   .sell{
       width:100%;
       
   }
}


</style>    

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    echo "<a href='sellproduct.php'> Sell Product </a>" ;
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


.gotopbtn{
    position:fixed;
    width:50px;
    height:50px;
    background: #27ae60;
    bottom: 40px;
    right: 50px;
    text-decoration: none;
    text-align: center;
    border-radius: 50%;
    color: white;
}
.pad{
    padding-top: 8px;
}
.gotopbtn:hover{
    background:white;
}

</style>
  <div class="container">
  <br>
  
  <div class="row">
<h1>Banner  <i style="font:30px Arial, sans-serif; color:#46bd55;">CENTER</i></h1>
</div>
<hr>
  <section>
  <div class="sell"></div>
  
  </section>
<a class="gotopbtn" href="#"> <i class="pad fas fa-arrow-up fa-2x"></i></a>
  
<br>

<h3 style="color:#46bd55;">Need Help Creating Your Banner ?</h3><hr>
<p class="lead">
Our banner advertisement are an excellent way to get your items sold quickly.
We can help you create one that is uniquely tailored to your brand
. Just contact us <a href="contact.php">here</a> to get started.
</p>

<h3 style="color:#46bd55;">Our Adverising Product </h3>
<h5>Leaderboard</h5>
<p class="lead">
The Leaderboard banner is strategically positioned above the navigation bar on mobile and above the top nav bar on desktop, the leaderboard banner is viewed by every visitor 
of the site since it is located in every page. Dimensions: 1168px x 58px width and height respectively<br>
Afer uploading your banner it will be reviewed , this might take some time. You will receive a notification from us when your banner is on our site.
</p>



    
<h3 style="color:#46bd55; text-align:center;">Contact Us <a href="contact.php">here</a> If You have Any Problems</h3><hr>

<center>
<div class="col-md-6 col-md-offset-3">
<a href="uploadbanner.php">
<button type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Your Banner</button>
</a>
</div>
</div>
</center>
</div>
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