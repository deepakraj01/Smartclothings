<?php require_once('inc/top.php'); ?>
<?php 
// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
// }
// else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
//     header('location: index.php');
// }
 ?>

<?php 
/*if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `users` WHERE `users`.`id` = $del_id";
    if (isset($_GET['del'])) {
        if (mysqli_query($conn, $del_query)) {
            $msg = "User Has Been Deleted";
        }
        else{
            $error = "User Has Not Been Deleted";
        }
    }
}*/

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_check_query = "SELECT * FROM orders WHERE id = $del_id";
    $del_check_run = mysqli_query($conn, $del_check_query);
    if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "DELETE FROM `orders` WHERE `orders`.`id` = $del_id";
    //if (isset($_GET['del'])) {
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){    
            if (mysqli_query($conn, $del_query)) {
                $msg = "Order Has Been Deleted";
            }
            else{
            $error = "Order Has Not Been Deleted";
            }
        }
    }
    else{
        header('location: index.php');
    }
}

if (isset($_POST['checkboxes'])) {
     foreach ($_POST['checkboxes'] as $order_id) {
         $bulk_option = $_POST['bulk-options'];
         if ($bulk_option == 'pending') {
            $bulk_pending_query = "UPDATE `orders` SET `status` = 'pending' WHERE `orders`.`id` = $order_id";
            mysqli_query($conn, $bulk_pending_query);
         }
         else if ($bulk_option == 'confirm') {
            $bulk_confirm_query = "UPDATE `orders` SET `status` = 'confirm' WHERE `orders`.`id` = $order_id";
            mysqli_query($conn, $bulk_confirm_query);
         }
         else if ($bulk_option == 'delivered') {
            $bulk_deliver_query = "UPDATE `orders` SET `status` = 'delivered' WHERE `orders`.`id` = $order_id";
            mysqli_query($conn, $bulk_deliver_query);  
         }
     }
}

?>
  </head>
  <body>
    <div id="wrapper">
<?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
              <?php require_once('inc/sidebar.php'); ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-file-text-o"></i> Orders <small>View All Orders</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-file-text-o"></i> Orders</li>
                    </ol>
                    
                    <?php 
                    $query = "SELECT * FROM orders ORDER BY id DESC";
                    $run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($run) > 0) {
                        
                     ?>
                    <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <select name="bulk-options" id="" class="form-control">
                                                <option value="pending">Pending</option>
                                                <option value="confirm">Confirm</option>
                                                <option value="delivered">Delivered</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="submit" class="btn btn-success" value="Apply">
                                        <!-- <a href="adduser.php" class="btn btn-primary">Add New</a> -->
                                    </div>
                                </div>
                            
                        </div>
                    </div>

                    <?php  
                    if (isset($error)) {
                        echo "<span style='color:red;' class='pull-right'>$error</span>";
                    }
                    else if (isset($msg)) {
                        echo "<span style='color:green;' class='pull-right'>$msg</span>";
                    }{

                    }
                    ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                               <th><input type="checkbox" id="selectallboxes"></th>
                                <th>Sr#</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Number</th>
                                <th>Order Date</th>
                                <th>Instructions</th>
                                <th>Status</th>
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($row = mysqli_fetch_array($run)){
                                $id = $row['id'];
                                $product_name = ucfirst($row['prod_name']);
                                $price = $row['price'];
                                $customer_name = ucfirst($row['cust_name']);
                                $adres = $row['cust_addres'];
                                $city = $row['city'];
                                $number = $row['number'];
                                $instruct = $row['instruct'];
                                $date = getdate($row['date']);
                                $day = $date['mday'];
                                $month = substr($date['month'],0,3);
                                $year = $date['year'];
                                $status = $row['status'];
                             ?>
                            
                            <tr>
                               <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>
                                <td><?php echo $id; ?></td>
                                <td><?php echo ucfirst($product_name); ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo ucfirst($customer_name); ?></td>
                                <td><?php echo "$adres $city"; ?></td>
                                <td><?php echo $number; ?></td>
                                <td><?php echo "$day $month $year"; ?></td>
                                <td><?php echo $instruct; ?></td>
                                <td><?php echo ucfirst($status); ?></td>
                                <td><a href="product.php?del=<?php echo $id; ?>"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php 
                    }
                    else{
                        echo "<center><h2>No Orders Avalible Now</h2></center>";
                    }
                     ?>
                     </form>
                </div>
            </div>
        </div>

     <?php require_once('inc/footer.php'); ?>