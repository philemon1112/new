

<?php
$customer_session = $_SESSION['username'];

$get_customer = "SELECT * from customers where username ='$customer_session'";
$run_customer = mysqli_query($db,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['id'];

$customer_name = $row_customer['name'];

$customer_email = $row_customer['email'];

$username = $row_customer['username'];

$contact = $row_customer['contact'];

$customer_image = $row_customer['c_image'];

?>

<h1 align="center">Edit Your Account</h1>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label> Customer Name: </label>
    <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>
</div>

<div class="form-group">
    <label> Customer Email: </label>
    <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>
</div>

<div class="form-group">
    <label> Customer Username: </label>
    <input type="text" name="c_username" class="form-control" value="<?php echo $username; ?>" required>
</div>

<div class="form-group">
    <label> Customer Contact: </label>
    <input type="text" name="c_contact" class="form-control" value="<?php echo $contact; ?>" required>
</div>

<div class="form-group">
    <label> Customer Image: </label>
    <input type="file" name="c_image" class="form-control form-height-custom"  required>
    <img class="img-responsive" style='width:20%;' src="customer_images/<?php echo $customer_image; ?>">
</div>

<div class="text-center">
    <button name="update" type="submit" class="btn btn-primary">
        <i class="fa fa-user-md"></i> Update Now
    </button>
</div>
</form>
<?php
if(isset($_POST['update'])){
    $update_id = $customer_id;
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_username = $_POST['c_username'];
    $c_contact = $_POST['c_contact'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");

    $db = mysqli_connect("localhost","root","","housemarket");

    $update_customer = "UPDATE customers SET name='$c_name',email='$c_email',username='$c_username',contact='$c_contact',c_image='$c_image' where id='$update_id'";

    $run_customer = mysqli_query($db,$update_customer);

    if($run_customer){
        echo "<script>alert('Your account has been edited,to complete the process please relogin')</script>";

        echo "<script>window.open('logout.php','_self')</script>";
    }
}
?>