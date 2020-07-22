<?php 
  include("includes/db.php");
  include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>FRANKO SALES</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="FrankoStyles.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> 
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
          $get_banner = "SELECT * from banners ORDER BY rand() DESC LIMIT 0,1";
          $run_banner = mysqli_query($con,$get_banner);

          while($row_banner=mysqli_fetch_array($run_banner)){
            $ban_link = $row_banner['ban_link'];
            $ban_image = $row_banner['ban_image'];

            echo " 
            <a href='$ban_link'>
<img src='admin_area/banner_images/$ban_image' style='width:100%;'>
</a>
            ";
          }

    ?>
<body>






<center>
<div id="wishlist" class="col-md-12">
            <div class="box">
            <form action="../cart.php" method="post" enctype="multipart/form-data">
            
            <h1>Wishlist</h1>
            <p class="text-muted">You currently have 3 item(s) in your whishlist</p>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Brand</th>
                            <th colspan="1">Delete</th>
                            <th colspan="2">Sub-Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                       <tr>

                           <td>
                                <img class="img-responsive" src="./assets/100.jpg" width="70px">

                           </td>
                           <td>
                               <a href="#">Techno Cannon 11 pro</a>
                           </td>
                           <td>
                               2
                           </td>
                           <td>
                               GHC 500
                           </td>
                           <td>
                               Techno
                           </td>
                           <td>
                               <input type="checkbox" name="remove[]">
                           </td>
                           <td>
                               GHC 10000
                           </td>
                                                 
                       </tr>

                    </tbody>
                    <tbody>
                        
                       <tr>

                           <td>
                                <img class="img-responsive" src="./assets/l.png" width="70px">

                           </td>
                           <td>
                               <a href="#">Techno Cannon 11 pro</a>
                           </td>
                           <td>
                               2
                           </td>
                           <td>
                               GHC 500
                           </td>
                           <td>
                               Techno
                           </td>
                           <td>
                               <input type="checkbox" name="remove[]">
                           </td>
                           <td>
                               GHC 10000
                           </td>
                                                 
                       </tr>

                    </tbody>
                    <tbody>
                        
                       <tr>

                           <td>
                                <img class="img-responsive" src="./assets/101.jpg" width="70px">

                           </td>
                           <td>
                               <a href="#">Techno Cannon 11 pro</a>
                           </td>
                           <td>
                               2
                           </td>
                           <td>
                               GHC 500
                           </td>
                           <td>
                               Techno
                           </td>
                           <td>
                               <input type="checkbox" name="remove[]">
                           </td>
                           <td>
                               GHC 10000
                           </td>
                                                 
                         </tr>

                         </tbody>
                         <tfoot>
                             <tr>
                                 <th colspan="5">Total</th>
                                 <th colspan="2">GHC1000</th>
                             </tr>
                         </tfoot>
                    </table>
                </div> 
                <div class="box-footer">
                    <div class="pull-left">
                        <a href="../index.php" class="btn btn-default">
                            <i class="fa fa-chevron-left"></i> Continue Shopping
                        </a>
                    </div>
                    <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" name="update" value="Update Wishlist" class="btn btn-default">
                            <i class="fa fa-sync"></i> Update Wishist
                        </button>
                    </div>
                </div>  

             </form>
           </div>
        </div>    

</div>
</div>
</center>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootshape.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="main.js"></script>
</body>
</html>