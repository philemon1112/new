<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if(isset($_POST['action'])){
    $sql = "SELECT * FROM property Where category !=''";

    if(isset($_POST['category'])){
        $category = implode("','", $_POST['category']);
        $sql .="AND category IN('".$category."')";
    }
    if(isset($_POST['region'])){
        $region = implode("','", $_POST['region']);
        $sql .="AND region IN('".$region."')";
    }
    if(isset($_POST['facility'])){
        $facility = implode("','", $_POST['facility']);
        $sql .="AND facility IN('".$facility."')";
    }

    $result = $conn->query($sql);
    $output ='';

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $output .='<div class="box1">
<div class="card mb-4">
  <div class="row no-gutters">
    <div class="col-md-4">
      <a href="singleproduct.php?pro_id='.$row['property_id'].'"><img src="admin_area/product_images/'.$row['property_img1'].'" class="card-img"></a>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">'.$row['property_name'].'<div class="reviews"><small class="text-muted">12,700 reviews</small></div></h5>
        <div class="alter">
                     
        </div>
        <p class="card-text"><strong>Location:</strong>'.$row['property_loc'].'</p>
        <i class="far fa-heart"></i>
        <p class="card-text"><small class="text-muted"><a href="'.$row['maps_link'].'">Show On Map</a></small><div class="blue"><h6>'.$row['status'].'</h6></div></p>
      </div>
    </div>
  </div>
</div>';
        }
    }
    else{
        $output = "<h3>No Product Found <h3>";
    }
    echo $output;
}
?>
