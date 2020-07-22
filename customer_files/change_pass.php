<h1 align="center">Change Password</h1>
<form action="" method="post">
<div class="form-group">
     <label> Your old password: </label>
     <input type="text" name="old_pass" class="form-control" required>
     </div>
     <label> Your new password: </label>
     <input type="text" name="new_pass" class="form-control" required>
     
     <label> Confirm New password: </label>
     <input type="text" name="new_pass_again" class="form-control" required>
     </div>
     <div class="text-center">
     <button type="submit" name="submit" class="btn btn-primary">
     <i class="fa fa-user-md"></i>Update Now
     </button>
     </div>
</form>

<?php

if(isset($_POST['submit'])){
    $username = $_SESSION['username'];

    $c_old_pass = $_POST['old_pass'];

    $c_new_pass = $_POST['new_pass'];

    $c_new_pass_again = $_POST['new_pass_again'];

    $db = mysqli_connect("localhost","root","","housemarket");

    $sel_c_old_pass = "SELECT * from customers where pass='$c_old_pass'";

    $run_c_old_pass = mysqli_query($db,$sel_c_old_pass);

    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

    if($check_c_old_pass==0){
        echo "<script>alert('Sorry, your current password is not valid.Please try again later')</script>";

        exit();
    }
    if($c_new_pass!=$c_new_pass_again){
        echo "<script>alert('sorry, your new password doesnt match')</script>";

        exit();
    }
    $update_c_pass ="UPDATE customers set pass='$c_new_pass' where username='$username'";

    $run_c_pass = mysqli_query($db,$update_c_pass);

    if($run_c_pass){
        echo "<script>alert('Your password has been updated successfully')</script>";

        echo "<script>window.open('my_account.php?my_favourites','_self')</script>";
    }
}

?>