<!-- networm786@gmail.com -->
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
if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `products` WHERE `users`.`id` = $del_id";
    if (isset($_GET['del'])) {
        if (mysqli_query($conn, $del_query)) {
            $error = "Product(s) Has Not Been Deleted";
            
        }
        else{
            $msg = "Product(s) Has Been Deleted";
        }
    }
}

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_check_query = "SELECT * FROM products WHERE id = $del_id";
    $del_check_run = mysqli_query($conn, $del_check_query);
    if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "DELETE FROM `products` WHERE `products`.`id` = $del_id";
    //if (isset($_GET['del'])) {
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){    
            if (mysqli_query($conn, $del_query)) {
                $msg = "Product(s) Has Been Deleted";
            }
            else{
            $error = "Product(s) Has Not Been Deleted";
            }
        }
    }
    else{
        header('location: index.php');
    }
}

if (isset($_POST['checkboxes'])) {
     foreach ($_POST['checkboxes'] as $product_id) {
         $bulk_option = $_POST['bulk-options'];
         if ($bulk_option == 'delete') {
            $bulk_del_query = "DELETE FROM `products` WHERE `products`.`id` = $product_id";
            mysqli_query($conn, $bulk_del_query);
         }
         // else if ($bulk_option == 'edit') {
         //    $bulk_author_query = "UPDATE `products` SET `product_name` = '$product_name', `image` = '$image', `brand` = '$brand', `detail` = '$detail', `price` = '$price' WHERE `products`.`id` = $product_id";
         //    mysqli_query($conn, $bulk_author_query);
         // }
         // else if ($bulk_option == 'admin') {
         //    $bulk_admin_query = "UPDATE `users` SET `role` = 'admin' WHERE `users`.`id` = $user_id";
         //    mysqli_query($conn, $bulk_admin_query);  
         // }
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
                    <h1><i class="fa fa-file-text-o"></i> Products <small>View All Products</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-file-text-o"></i> Products</li>
                    </ol>
                    
                    <?php 
                    $query = "SELECT * FROM products ORDER BY id DESC";
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
                                                <option value="delete">Delete</option>
                                                <option value="edit">Edit</option>
                                                <!-- <option value="draft">Publish</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="submit" class="btn btn-success" value="Apply">
                                        <a href="addproduct.php" class="btn btn-primary">Add New</a>
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
                                <th>Sr #</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Size</th>
                                <!-- <th>Categories</th> -->
                                <th>Detail</th>                                
                                <th>Edit</th>
                                <th>Del</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($row = mysqli_fetch_array($run)){
                                $id = $row['id'];
                                $product_name = ucfirst($row['product_name']);
                                $image = $row['image'];
                                $brand = ucfirst($row['brand']);
                                $price = $row['price'];
                                $size = $row['size'];
                                // $category = $row['category'];
                                $detail = $row['detail'];
                                
                                // $date = getdate($row['date']);
                                // $day = $date['mday'];
                                // $month = substr($date['month'],0,3);
                                // $year = $date['year'];
                             ?>
                            
                            <tr>
                               <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>
                                <td><?php echo $id; ?></td>
                                <td><?php echo ucfirst($product_name); ?></td>
                                <td><img src="img/<?php echo $image; ?>" width="30px"></td>
                                <td><?php echo ucfirst($brand); ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $size; ?></td>
                                <!-- <td><?php echo $category; ?></td> -->
                                <td><?php echo $detail; ?></td>
                                <td><a href="editproduct.php?edit=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a></td>
                                <td><a href="product.php?del=<?php echo $id; ?>"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php 
                    }
                    else{
                        echo "<center><h2>No Products Avalible Now</h2></center>";
                    }
                     ?>
                     </form>
                </div>
            </div>
        </div>

     <?php require_once('inc/footer.php'); ?>