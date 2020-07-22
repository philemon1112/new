
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../properties.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea1'});</script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="summernote-bs4.css" rel="stylesheet">
<link href="summernote-bs4.css" rel="stylesheet">
    <title>Insert Property</title>
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
    $get_banner = "SELECT * from banners LIMIT 1,5";
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

<body>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Products</h1>

        
    </div>
</div>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tachometer-alt"></i> Dashboard /insert Product here
            </li>
        </ol>
    </div>
</div>



<div class="row">
        <div class="col-lg-12">
             <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">
                     <i class="far fa-money-bill-alt fa-fw"></i>Insert Product
                  </h3>
                </div>
            <div class="panel-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
            <label class="col-md-3 control-label"> Product Title </label>
            <div class="col-md-6">
            <input name="property_name" type="text" class="form-control" >
            </div>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label"> Product Brand </label>
            <div class="col-md-6">
            <select name="product_cat" class="form-control">
                  
            </select>
            </div>
            </div>

            <div class="form-group">
                 <label class="col-md-3 control-label"> Product Image 1 </label>
                   <div class="col-md-6">
                     <input name="product_img1" type="file" class="form-control">
                    </div>
            </div>
            <div class="form-group">
                 <label class="col-md-3 control-label"> Product Image 2 </label>
                   <div class="col-md-6">
                     <input name="product_img2" type="file" class="form-control" >
                    </div>
            </div>
            <div class="form-group">
                 <label class="col-md-3 control-label"> Product Image 3 </label>
                   <div class="col-md-6">
                     <input name="product_img3" type="file" class="form-control" >
                    </div>
            </div>
            <div class="form-group">
                 <label class="col-md-3 control-label"> Product Price </label>
                   <div class="col-md-6">
                     <input name="product_price" type="text" class="form-control" >
                    </div>
            </div>
            <div class="form-group">
                 <label class="col-md-3 control-label"> Product Keywords </label>
                   <div class="col-md-6">
                     <input name="product_keywords" type="text" class="form-control" >
                    </div>
            </div>
            <div class="form-group">
                 <label class="col-md-3 control-label"> Product Description </label>
                   <div class="col-md-6">
                     <textarea name="product_desc" cols="87" rows="10" class="form control"></textarea>
                    </div>
            </div>
            <div class="form-group">
                 <label class="col-md-3 control-label"></label>
                   <div class="col-md-6">
                     <input name="insert_post" value="insert Product" type="submit" class="btn btn-primary form-control">
                    </div>
            </div>
            
            </form>
            
            </div>
        </div>
</div>

<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootshape.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>

<?php 
     
     if(isset($_POST['insert_post'])){

        //getting the text data from the fields
       $property_name = $_POST['property_name'];
       
     
      $insert_product = "INSERT INTO property (product_name) VALUES ('$property_name')";
      
     
$con = mysqli_connect("localhost","root","","housemarket");

     $insert_pro = mysqli_query($con, $insert_product);

    if($insert_pro){

        echo "<script> alert('Product has been inserted sucessfully') </script>";
        echo "<script> window.open('index.php','_self') </script>";
    }
     }

?>
