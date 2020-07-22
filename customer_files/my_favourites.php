<center>
    <h1>My Favourites</h1>

    <p class="lead"> Your Favourites On One Place</p>

    <p class="text-muted">
        If you have any questions feel free to <a href="../contact.php"> Contact Us</a> contact

    </p>
</center>

<hr>

<div class="table-responsive">
    <table class= "table table-bordered table-hover">
        <thead>
                            <th> no:</th>
                            <th> Product:</th>
                            <th> Image:</th>
                            <th> Region:</th>
                            <th> Contact:</th>
                            <th> Category:</th>
                            <th> Date:</th>
        </thead>
        <tbody>

            <?php

            $con = mysqli_connect("localhost","root","","housemarket");

             $customer_session = $_SESSION['username'];

             $get_customer = "SELECT * from customers where username='$customer_session'";

             $run_customer = mysqli_query($con,$get_customer);

             $row_customer = mysqli_fetch_array($run_customer);

             $customer_id = $row_customer['id'];

             $get_orders = "SELECT * from customer_saves where customer_id='$customer_id'";

             $run_orders = mysqli_query($con,$get_orders);

             $i = 0;

             while($row_orders = mysqli_fetch_array($run_orders)){


                 $id = $row_orders['id'];

                  $product = $row_orders['product'];

                   $image = $row_orders['image'];

                    $region = $row_orders['region'];

                    $category = $row_orders['category'];

                     $save_date = substr($row_orders['save_date'],0,11);
                     
                      $status = $row_orders['status'];

                      $i++;

            ?>
                            <tr>
                                <th> <?php echo $i; ?> </th>
                                <td> <?php echo $product; ?> </td>
                                <td> <img class="img-responsive" src="../admin_area/product_images/<?php echo $image; ?>" width="80px"> </td>
                                <td> <?php echo $region; ?> </td>
                                <td> <?php echo $status; ?> </td>
                                <td> <?php echo $category; ?></td>
                                <td> <?php echo $save_date; ?></td>

                </tr>

            <?php } ?>
        <tbody>
    </table>
</div>