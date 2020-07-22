<center>
    
<h1>Do You Really Want To Delete Your Account ? </h1>
<form action="" method="post">

<input type="submit" name="Yes" value="Yes I want To Delete" class="btn btn-danger">
<input type="submit" name="No" value="No I Dont want To Delete" class="btn btn-success">
</form>
</center>

<?php
$username = $_SESSION['username'];

if(isset($_POST['Yes'])){
    $delete_customer = "DELETE from customers where username='$username'";

    $run_delete_customer = mysqli_query($db,$delete_customer);

    if($run_delete_customer){
        session_destroy();
        echo "<script>alert('Account Successfully Deleted , Feel free to come back when you change your mind')</script>";

        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['No'])){
    echo "<script>window.open('my_account.php?my_favourites','_self')</script>";
}
?>