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
    <link href="summernote-bs4.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<style>
   input[type=text]{
        border:2px solid #aaa;
        border-radius:4px;
        margin:8px 0;
        outline:none;
        padding:8px;
        box-sizing:border-box;
        transition:.3s;
    }

  input[type=text]:focus{
        border-color:lightgreen;
        box-shadow:0 0 4px 0 lightgreen;
    }
    .inputwithicon input[type=text]{
        padding-left:40px;
    }
    input[type=password]{
        
        border:2px solid #aaa;
        border-radius:4px;
        margin:8px 0;
        outline:none;
        padding:8px;
        box-sizing:border-box;
        transition:.3s;
    }
    input[type=password]:focus{
        border-color:lightgreen;
        box-shadow:0 0 4px 0 lightgreen;
    }
    .inputwithicon input[type=password]{
        padding-left:40px;
    }
    
    input[type=email]{
        
        border:2px solid #aaa;
        border-radius:4px;
        margin:8px 0;
        outline:none;
        padding:8px;
        box-sizing:border-box;
        transition:.3s;
    }
    input[type=email]:focus{
        border-color:lightgreen;
        box-shadow:0 0 4px 0 lightgreen;
    }
    .inputwithicon input[type=email]{
        padding-left:40px;
    }
    
    input[type=tel]{
        
        border:2px solid #aaa;
        border-radius:4px;
        margin:8px 0;
        outline:none;
        padding:8px;
        box-sizing:border-box;
        transition:.3s;
    }
    input[type=tel]:focus{
        border-color:lightgreen;
        box-shadow:0 0 4px 0 lightgreen;
    }
    .inputwithicon input[type=tel]{
        padding-left:40px;
    }
    
    .inputwithicon{
        position:relative;
    }
    .inputwithicon i{
        position:absolute;
        left:0;
        top:4px;
        padding:9px 8px;
        color:#aaa;
        transition:.3s;
    }
    .inputwithicon input[type=text]:focus + i{
        color:lightgreen;
    }
  </style>
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


  </head>

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
                    echo "<a href='sellproduct.php'> Add Property </a>";
                }
?>
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
        <li class="nav-item active">
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

</head>
<body>

  <div class="container">
  <div class="col-md-12">
         <ul class="breadcrumb bg-light">
             <li>
                 <a href="index.php">Home</a>
             </li>
             <li>
                Contact Us
             </li>
         </ul>
                        
    </div>


    <body style="background-image: url('assets/home.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
        <br><br>



<div class="col-lg-9 col-md-6 col-sm-12 offset-lg-2 offset-md-3"> 
    <div class="card card-body" style="border-bottom-left-radius:20px;border-top-right-radius:20px;border-bottom-right-radius: 20px;border-top-left-radius:20px; box-shadow: 2px 2px 5px grey;">
        <!--Section: Contact v.2-->
        <section class="section">
<center>
            <!--Section heading-->
            <h2 class="section-heading h1 pt-4">Contact us</h2>
            <!--Section description-->
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
                esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam. Quia, minima?</p>
</center>
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 col-xl-9">
                    <form action="" method="post" enctype="multipart/form-data">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form">
                                    <div class="inputwithicon">
                                        <input type="text" id="name" name="name" class="form-control" required>
                                        <i class = "fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                                      </div>
                                        <label for="name" class="">Your name</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form">
                                    <div class="inputwithicon">
                                        <input type="text" id="email" name="email" class="form-control" required>
                                        <i class = "fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
                                    </div>
                                        <label for="email" class="">Your email</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                <div class="inputwithicon">
                                    <input type="text" id="subject" name="subject" class="form-control" required>
                                    <i class = "fa fa-pen fa-lg fa-fw" aria-hidden="true"></i>
                                  </div>
                                    <label for="subject" class="">Subject</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea id="summernote" cols="40" rows="10" name="message" required></textarea>
                                    <label for="message">Your message</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->
                    <div class="center-on-small-only">
                        <button class="btn btn-success" name="send" type="submit">Send</button>
                    </div> <div class="status" id="status"></div>
                    </form>

                   
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <style>
.contact-icons{
    list-style:none;
}
.fa{
    color:#46bd55;
}
</style>
                <div class="col-md-4 col-xl-3">
                    <ul class="contact-icons">
                        <li><a href="#"><i class="fa fa-map-marker-alt fa-2x"></i></a>
                            <p>Cape-coast, Ghana</p>
                        </li>

                        <li><a href="tel:233560521963"><i class="fa fa-phone fa-2x"></i></a>
                            <p>+233 56 52 1963</p>
                        </li>

                        <li><a href="mailto:philemonabakahmensah@gmail.com"><i class="fa fa-envelope fa-2x"></i></a>
                            <p>company@email.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

        </section>
        <!--Section: Contact v.2-->



</div>
</div>
    </div>



<br><br>
    <?php
include("includes/footer.php")
    ?>
  
<!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
    <script src="summernote-bs4.js"></script>
    <!--Custom scripts-->
    <script>
     $('#summernote').summernote();
     </script>
</body>

</html>
<?php 
     
     if(isset($_POST['send'])){

    //getting the text data from the fields
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

   $sql = "INSERT INTO messages (name,subject,message,email,con_date) VALUES ('$name','$subject','$message','$email',NOW())";

   $db = mysqli_connect("localhost","root","","housemarket");

   $send = mysqli_query($db,$sql); 
   if($send){
       echo "<script>alert('Your message has been sent successfully you will receive a reply within 24 hours')</script>";
        echo"<script>window.open('contact.php','_self')</script>";
   }else{
       echo "<script>alert('message not sent retry')</script>";
   }
     }
?>