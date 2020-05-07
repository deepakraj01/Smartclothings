<?php require_once('inc/top.php'); 
// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
// }
// else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
//     header('location: index.php');
// }

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $edit_query = "SELECT * FROM products WHERE id = $edit_id";
    $edit_query_run = mysqli_query($conn, $edit_query);
    if (mysqli_num_rows($edit_query_run) > 0) {
        $edit_row = mysqli_fetch_array($edit_query_run);
        $e_product_name = $edit_row['product_name'];
        $e_image = $edit_row['image'];
        $e_brand = $edit_row['brand'];
        $e_price = $edit_row['price'];
        $e_size = $edit_row['size'];
        // $e_category = $edit_row['category'];
        $e_detail = $edit_row['detail'];
    }
    else{
        header('location: index.php');
    }
}
else{
    header('location: index.php');
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
                    <h1><i class="fa fa-file-text"></i> Edit Product <small> Edit Product Details</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-file-text"></i> Edit Product</li>
                    </ol>
                    <?php 
                    if (isset($_POST['submit'])) {
                        
                        $product_name = mysqli_real_escape_string($conn, $_POST['product-name']);
                        $image = $_FILES['image']['name'];
                        $image_tmp = $_FILES['image']['tmp_name'];
                        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
                        $price = mysqli_real_escape_string($conn, $_POST['price']);
                        $size = mysqli_real_escape_string($conn, $_POST['size']);
                        // $category = mysqli_real_escape_string($conn, $_POST['category']);
                        $detail = mysqli_real_escape_string($conn, $_POST['detail']);
                        
                        if (empty($image)) {
                            $image = $e_image;
                        }

                        // $salt_query = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
                        // $salt_run = mysqli_query($conn, $salt_query);
                        // $salt_row = mysqli_fetch_array($salt_run);
                        // $salt = $salt_row['salt'];

                       

                        if (empty($product_name) or empty($image) or empty($brand) or empty($price) or empty($detail)) {
                                $error = "All (*) Fields Are Required";
                        }
                    
                        else{
                            $update_query = "UPDATE `products` SET `product_name` = '$product_name', `image` = '$image', `brand` = '$brand', `detail` = '$detail', `price` = '$price' WHERE `products`.`id` = $edit_id";

                            if (mysqli_query($conn, $update_query)) {
                                $msg = "Product Has Been Updated";
                                header("refresh:0; url=editproduct.php?edit=$edit_id");
                                if (!empty($image)) {
                                    move_uploaded_file($image_tmp, "img/$image");
                                }
                            }
                            else{
                                $error = "Product Has Not Been Updated";
                            }
                        }
                    }

                     ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="product-name">Product Name:*</label>
                                <?php 
                                if (isset($error)) {
                                    echo "<span class='pull-right' style='color:red;'>$error</span>";
                                }
                                else if (isset($msg)) {
                                    echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                }
                                 ?>
                                <input type="text" id="product-name" name="product-name" class="form-control" value="<?php echo $e_product_name;?>" placeholder="Product Name">
                                </div>


                                <div class="form-group">
                                <label for="image">Product Image:*</label>
                                <input type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                <label for="last-name">Brand:*</label>
                                <input type="text" id="brand" name="brand" class="form-control" value="<?php echo $e_brand; ?>" placeholder="Brand">
                                </div>

                                <div class="form-group">
                                <label for="price">Price:*</label>
                                <input type="text" id="price" name="price" class="form-control" value="<?php echo $e_price; ?>" placeholder="Price">
                                </div>

                                <div class="form-group">
                                <label for="size">Size:*</label>
                                <select name="size" id="size" class="form-control">
                                    
                                    <option value="X-Small" <?php if ($e_size == 'X-Small') { echo "selected";}?>>X-Small</option>

                                    <option value="Small" <?php if ($e_size == 'Small') { echo "selected";}?>>Small</option>

                                    <option value="Medium" <?php if ($e_size == 'Medium') { echo "selected";}?>>Medium</option>

                                    <option value="Large" <?php if ($e_size == 'Large') { echo "selected";}?>>Large</option>

                                    <option value="X-Large" <?php if ($e_size == 'X-Large') { echo "selected";}?>>X-Large</option>

                                    <option value="XX-Large" <?php if ($e_size == 'XX-Large') { echo "selected";}?>>XX-Large</option>
                                </select>
                                </div>


                                <div class="form-group">
                                <label for="detail">Detail:</label>
                                <textarea name="detail" id="details" cols="20" rows="5" class="form-control"> <?php echo $e_detail;?> </textarea>
                                </div>

                                <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-4">
                            
                            <?php                             
                                echo "<img src= 'img/$e_image' width='100%'>";
                             ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

     <?php require_once('inc/footer.php'); ?>