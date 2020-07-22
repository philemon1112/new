
<?php

if(isset($_GET['edit_upload'])){

    $edit_id = $_GET['edit_upload'];

    $get_p = "SELECT * from sellerproperty where p_id='$edit_id'";

    $run_edit = mysqli_query($con,$get_p);

    $row_edit = mysqli_fetch_array($run_edit);

    $s_name = $row_edit['s_name'];

    $s_id = $row_edit['s_id'];

    $p_id = $row_edit['p_id'];

    $p_cat = $row_edit['p_cat'];

    $p_reg = $row_edit['p_reg'];

    $p_name = $row_edit['p_name'];

    $p_img1 = $row_edit['p_img1'];

    $p_img2 = $row_edit['p_img2'];

    $p_img3 = $row_edit['p_img3'];

    $p_img4 = $row_edit['p_img4'];

    $p_img5 = $row_edit['p_img5'];

    $p_price = $row_edit['p_price'];

    $p_loc = $row_edit['p_loc'];

    $p_desc = $row_edit['p_desc'];

    $p_label = $row_edit['p_label'];

    $p_fac = $row_edit['p_fac'];

    $p_email = $row_edit['p_email'];

    $p_contact = $row_edit['p_contact'];

    $p_contact2 = $row_edit['p_contact2'];
}

$get_p_cat = "SELECT * from categories where cat_id='$p_cat'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['cat_title'];


$get_reg = "SELECT * from regions where reg_id='$p_reg'";

$run_reg = mysqli_query($con,$get_reg);

$row_reg = mysqli_fetch_array($run_reg);

$reg_title = $row_reg['reg_title'];


?>
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
   <link href="summernote-bs4.css" rel="stylesheet">
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
    padding-right:30%;
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
<li class="active">Step 2</li>
<li>Step 3</li>
</ul>
<br>
<br>

<div class="box">
<h3>Property Upload Forms</h3><hr>

<p class="lead">Property Information</p>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleFormControlInput1">Sellers Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="seller_name" value="<?php echo $s_name; ?>" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Sellers ID</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="seller_id" value="<?php echo $s_id; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Property Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="p_name" value="<?php echo $p_name; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select name="p_cat" class="form-control" id="exampleFormControlSelect1" value="<?php echo $p_cat; ?>">
      <?php 
                   
                   $get_p_cats = "select * from categories";
                   $run_p_cats = mysqli_query($con,$get_p_cats);

                   while ($row_p_cats=mysqli_fetch_array($run_p_cats)){

                        $p_cat_id = $row_p_cats['cat_id'];
                        $p_cat_title = $row_p_cats['cat_title'];
                           
                        echo "
                        <option value='$p_cat_id'> $p_cat_title </option>
                        ";
                   }

                   ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Region</label>
    <select name="p_reg" class="form-control" id="exampleFormControlSelect1" value="<?php echo $p_reg; ?>">
      <?php 
                   
                   $get_p_regs = "select * from regions";
                   $run_p_regs = mysqli_query($con,$get_p_regs);

                   while ($row_p_regs=mysqli_fetch_array($run_p_regs)){

                        $p_reg_id = $row_p_regs['reg_id'];
                        $p_reg_title = $row_p_regs['reg_title'];
                           
                        echo "
                        <option value='$p_reg_id'> $p_reg_title </option>
                        ";
                   }

                   ?>
    </select>
  </div>  
  <div class="form-row">
    <div class="col">
    <label for="exampleFormControlFile1">Property image 1</label>
      <img width="70" height="70" src="admin_area/seller_images/<?php echo $p_img1; ?>" alt="<?php echo $p_img1; ?>">
    </div>
    <div class="col">
    <label for="exampleFormControlFile1">Property image 2</label>
      <img width="70" height="70" src="admin_area/seller_images/<?php echo $p_img2; ?>" alt="<?php echo $p_img2; ?>">
    </div>
  </div>

  <div class="form-row">
    <div class="col">
    <label for="exampleFormControlFile1">Property image 3</label>
      <img width="70" height="70" src="admin_area/seller_images/<?php echo $p_img3; ?>" alt="<?php echo $p_img3; ?>">
    </div>
    <div class="col">
    <label for="exampleFormControlFile1">Property image 4</label>
      <img width="70" height="70" src="admin_area/seller_images/<?php echo $p_img4; ?>" alt="<?php echo $p_img4; ?>">
    </div>
    <div class="col">
    <label for="exampleFormControlFile1">Property image 5</label>
      <img width="70" height="70" src="admin_area/seller_images/<?php echo $p_img5; ?>" alt="<?php echo $p_img5; ?>">
    </div>
  </div>
<div class="form-group">
    <label for="exampleFormControlInput1">Special Facilities</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="p_fac" value="<?php echo $p_fac; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Property Location</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="p_loc" value="<?php echo $p_loc; ?>">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Property Description</label>
    <textarea class="summernote" rows="3" name="p_desc"><?php echo $p_desc; ?></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Property Price</label>
    <textarea class="summernote" rows="3" name="p_price"><?php echo $p_price; ?></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="p_email" placeholder="" value="<?php echo $p_email; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Phone Number</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="p_contact" placeholder="" value="<?php echo $p_contact; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Whatsapp Number</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="p_contact2" placeholder="" value="<?php echo $p_contact2; ?>">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Label</label>
    <select class="form-control" id="exampleFormControlSelect1" name="p_label" value="<?php echo $p_label; ?>">
      <option value="vacant">vacant</option>
      <option value="full">full</option>
    </select>
  </div>

  <div class="form-group">
    <label></label>
           <input name="upload_post" value="Upload Product" type="submit" class="btn btn-success form-control">
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
<script src="summernote-bs4.js"></script>
<script>
    $('.summernote').summernote();
</script>
</body>
</html>

<?php 
     
     if(isset($_POST['update'])){
 //getting the text data from the fields
       $property_name = $_POST['property_name'];
       $property_cat = $_POST['property_cat'];
       $property_reg = $_POST['property_reg'];
       $property_loc = $_POST['property_loc'];
       $property_price = $_POST['property_price'];
       $property_desc = $_POST['property_desc'];
       $property_label = $_POST['property_label'];
       $property_fac = $_POST['property_fac'];
       $bed = implode("<br> ", $property_fac);

       
       $maps_link = $_POST['maps_link'];
       $email_link = $_POST['email_link'];
       $phone = $_POST['phone'];
       $phone_link = $_POST['phone_link'];
       $whatsapp_link = $_POST['whatsapp_link'];
       $status = $_POST['status'];

     //getting the image from the field
    $property_img1 = $_FILES['property_img1']['name'];
    $property_img2 = $_FILES['property_img2']['name'];
    $property_img3 = $_FILES['property_img3']['name'];
    $property_img4 = $_FILES['property_img4']['name'];
    $property_img5 = $_FILES['property_img5']['name'];

    $temp_name1 = $_FILES['property_img1']['tmp_name'];
    $temp_name2 = $_FILES['property_img2']['tmp_name'];
    $temp_name3 = $_FILES['property_img3']['tmp_name'];
    $temp_name4 = $_FILES['property_img4']['tmp_name'];
    $temp_name5 = $_FILES['property_img5']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$property_img1");
    move_uploaded_file($temp_name2,"product_images/$property_img2");
    move_uploaded_file($temp_name3,"product_images/$property_img3");
    move_uploaded_file($temp_name4,"product_images/$property_img4");
    move_uploaded_file($temp_name5,"product_images/$property_img5");
     
    $update_property = "UPDATE property set property_cat='$property_cat',date=NOW(),property_name='$property_name'
    ,property_img1='$property_img1',property_img2='$property_img2',property_img3='$property_img3',property_img4='$property_img4',property_img5='$property_img5',
    property_price='$property_price',maps_link='$maps_link',phone_link='$phone_link',email_link='$email_link',whatsapp_link='$whatsapp_link',phone='$phone',status='$status',
    property_loc='$property_loc',property_desc='$property_desc',property_label='$property_label' where property_id='$p_id'
    ";

    $run_property = mysqli_query($con,$update_property);

    if($run_property){
        echo "<script>alert('Property has been updated')</script>";

         echo "<script>window.open('index.php?view_property','_self')</script>";
    }
     
     }

?>
