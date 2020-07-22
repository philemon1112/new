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
          <a class="nav-link" href="index.php">Home</a> <span class="sr-only">(current)</span></a>
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
.box{
    background: #ffffff;
    margin: 20px 60px;
    border:solid 1px groove;
    border-color:#46bd55;
    box-sizing: border-box;
    padding: 10px;
    box-shadow: 3px 3px 5px rgba(0, 0, 0, .01);
}
.progressbar{
    counter-reset: step;
    padding-right: 30%;
}
.progressbar li {
    list-style-type: none;
    float:left;
    width: 20.33%;
    position:relative;
    text-align:center;
}
.progressbar li:before{
    content:counter(step);
    counter-increment: step;
    width:30px;
    height:30px;
    line-height: 30px;
    border:1px solid #ddd;
    display:block;
    text-align:center;
    margin: 0 auto 10px auto;
    border-radius: 50%;
    background-color:white;
}
.progressbar li:after {
    content: '';
    position:absolute;
    width: 100%;
    height: 1px;
    background-color:#ddd;
    top:15px;
    left:-50%;
    z-index: -1;
}
.progressbar li:first-child:after {
    content:none;
}
.progressbar li.active{
    color: green;
}
.progressbar li.active:before {
    border-color:green;
}
.progressbar li.active + li:after {
    background-color:green;
}
</style>
<div class="container">
<br>

<div class="row">
<h1 style="padding-left:5%;">SELLERS  <i style="font:30px Arial, sans-serif; color:green;">CENTER</i></h1>
</div>
<hr>
<ul class="progressbar">
<li class="active">Step 1</li>
<li>Step 2</li>
<li>Step 3</li>
</ul>
<br>
<br>

<div class="box">
<h3>Registeration Forms</h3><hr>

<p class="lead">Sellers Information</p>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
    <div class="col-sm-10">
      <input name="sellername" class="form-control" id="inputEmail3" placeholder="Full Name" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email Address</label>
    <div class="col-sm-10">
      <input name="selleremail" class="form-control" id="inputEmail3" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-sm-10">
      <input name="sellercontact" class="form-control" id="inputPassword3">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Whatsapp/ Alternate Number</label>
    <div class="col-sm-10">
      <input name="sellercontact2" class="form-control" id="inputPassword3" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input name="selleraddress" class="form-control" id="inputPassword3" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Sellers ID</label>
    <div class="col-sm-10">
      <input name="sellerid" class="form-control" id="inputPassword3" value="<?php echo mt_rand(); ?>">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-2">Upload Policy</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" required>
        <label class="form-check-label" for="gridCheck1">
          I have read and agreed to the upload <a href="terms.php">policy</a>
        </label>
      </div>
    </div>
  </div>

  <div class="form-group row">
<div class="col-sm-4" style="color:red;">* Please Copy your sellers id</div>
</div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-success" name="next">Next</button>
    </div>
  </div>
</form>

</div>
</div>

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

<?php 
     
     if(isset($_POST['next'])){

    //getting the text data from the fields
    $s_name = $_POST['sellername'];
    $s_email = $_POST['selleremail'];
    $s_contact = $_POST['sellercontact'];
    $s_contact2 = $_POST['sellercontact2'];
    $s_address = $_POST['selleraddress'];
    $s_id = $_POST['sellerid'];

   $sell = "INSERT INTO seller (s_name,s_email,s_contact,s_contact2,s_address,s_id) VALUES ('$s_name','$s_email','$s_contact','$s_contact2','$s_address','$s_id')";

  

   $send = mysqli_query($con,$sell); 
   if($send){
       echo "<script>alert('You have completed the first step succesfully go ahead and upload your property')</script>";
        echo"<script>window.open('uploadproperty.php','_self')</script>";
   }else{
       echo "<script>alert('Please retry again')</script>";
   }
     }
?>