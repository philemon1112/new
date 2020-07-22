<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<style>
.label{
    text-transform: uppercase;
    font-size: 18px;
    font-weight: 700;
    position: absolute;
    top: 10px;
    padding-left:51px;
    z-index: 20;
}

.label .labelBackground{
position: absolute;
top:0;
right:0;
}

.label .theLabel{
    position: relative;
    width: 150px;
    padding: 6px 50px 6px 15px;
    margin: 10px 50px 10px -71px;
    color: #fff;
}
.label.vacant .theLabel{
    background: green;
}
.label.full .theLabel{
    background: red;
}
.label .theLabel:before,
.label .theLabel:after{
    content: "";
    position: absolute;
    width: 0;
    height: 0;
}

.label .theLabel:after{
    left: 0;
    top: 100%;
    border-width: 5px 10px;
    border-style: solid;
    border-color: #000 #000 transparent transparent;
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
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
        <li class="nav-item active">
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
  </div>
<body>
<style>
body{
  background:#F5F5F5;
}
.box{
    background: #ffffff;
    margin: 0 0 10px;
    border:solid 1px #e6e6e6;
    box-sizing: border-box;
    padding: 8px;
    box-shadow: 3px 3px 5px rgba(0, 0, 0, .01);
}
</style>

<div id="content" class="container">
    <div class="col-md-12">
         <ul class="breadcrumb bg-light">
             <li>
                 <a href="index.php">Home</a>
             </li>
             <li>
                Hotels
             </li>
         </ul>
                        
    </div>
    
<div class="row" id="result">
    <?php
include("includes/sidebar.php");
    ?>
          <div class="col-md-9">
            <?php
        if(!isset($_GET['p_cat'])){

            if(!isset($_GET['p_reg'])){

        echo "
            <div class='box'>
                <h1>Properties</h1>
                <p class='lead'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo natus tempora dignissimos voluptas, et soluta fugit accusamus aliquid eligendi officia esse tempore blanditiis eum pariatur sint quod deleniti laborum, perspiciatis.</p>
            </div>

            ";

            }

            }
            ?>
<?php
               if(!isset($_GET['p_cat'])){

                 if(!isset($_GET['p_reg'])){
                   
                    $per_page = 5;

                    if(isset($_GET['page'])){

                      $page = $_GET['page'];

                      }else{
                        $page =1;
                      }
                      $start_from = ($page-1) * $per_page;

                      $get_property = "SELECT * from property order by 1 DESC LIMIT $start_from, $per_page";

                     $run_property = mysqli_query($db,$get_property);

    while ($row_property = mysqli_fetch_array($run_property)){
        $pro_id = $row_property['property_id'];
        $pro_name = $row_property['property_name'];
        $pro_loc = $row_property['property_loc'];
        $status = $row_property['status'];
        $maps_link = $row_property['maps_link'];
        $pro_img1 = $row_property['property_img1'];
        $pro_label = $row_property['property_label'];

        $get_rev = "SELECT * from rating where p_id='$pro_id'";

        $run_rev = mysqli_query($db,$get_rev);

        $count_rev = mysqli_num_rows($run_rev);
        
         $tag="SELECT avg(rating) as average from rating where p_id='$pro_id'";

                    $run_tag = mysqli_query($db,$tag);

                    $row_tag = mysqli_fetch_array($run_tag);

                    $average1 = $row_tag['average'];

                    $average2 = (round($average1,1));

        if($pro_label == ""){

        }else{
            $property_label = "
            <a class='label $pro_label'>
<div class='theLabel'> $pro_label</div>
<div class='labelBackground'> </div>
            </a>
            ";
        }

        echo "
        <div class='box1'>
<div class='card mb-4'>
  <div class='row no-gutters'>
    <div class='col-md-4'>
    $property_label
      <a href='singleproduct.php?pro_id=$pro_id'><img src='admin_area/product_images/$pro_img1' class='card-img'></a>
      
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h5 class='card-title'><a style='color:green;' href='singleproduct.php?pro_id=$pro_id'>$pro_name</a><div class='reviews'><small class='text-muted'>$count_rev review(s)</small></div></h5>

        
        <p class='lead'><strong>Location:</strong>$pro_loc</p>
        <p class='card-text'>
        
        <div class='try' style='color:green; padding-right:4px; font-size:30px;'>$average2 <i style='color:green;' class='fas fa-star'></i></div>
        
        </p>
        <p class='card-text'><div class='blue'><h6>$status</h6></div></p>
      </div>
    </div>
  </div>
</div>
        
        ";
        
        }        
                  
                 
      ?>
    
    </div>
          
    <center>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
      
          <?php
             
             

             $query = "SELECT * from property";

             $result = mysqli_query($con,$query);

             $total_records = mysqli_num_rows($result);

             $total_pages = ceil($total_records / $per_page);

             echo"
             
             <li class='page-item'>
             <a class='page-link' href='hotels.php?page=1'> ".'First Page'." </a>
             </li>
             
             ";
           for($i=1; $i<=$total_pages; $i++){
             echo"
             
             <li class='page-item'>
             <a class='page-link' href='hotels.php?page=".$i."'> ".$i." </a>
             </li>
             
             ";
             };

              echo"
             
             <li class='page-item'>
             <a class='page-link' href='hotels.php?page=$total_pages'> ".'Last Page'." </a>
             </li>
             
             ";

            }
        }

          ?>

</ul>
</center>
<nav aria-label="Page navigation example">
      
      <?php getpcatpro(); ?>

      <?php getpregpro(); ?>

     </div>
     </div>
     </div> 
     
     </div> 
     </div> 
     </div> 
     </div>     
     
</nav>   

<?php
include("includes/footer.php");
  ?>

 <!-- Optional JavaScript -->

  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootshape.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){

  $(".product_check").click(function(){
var action = 'data';
var category = get_filter_text('category');
var region = get_filter_text('region');
var facility = get_filter_text('facility');

$.ajax({
  url:'action.php',
  method:'POST',
  data:{action:action,category:category,region:region,facility:facility},
  success:function(response){
    $("#result").html(response);
    
  }
})
  });

  function get_filter_text(text_id){
    var filterData = [];
    $('#'+text_id+':checked').each(function(){
      filterData.push($(this).val());
    });
    return filterData;
  }
});
</script>
</body>
</html>
