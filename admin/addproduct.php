<?php require_once('inc/top.php'); 
// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
// }
// else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
//     header('location: index.php');
// }
?>
  </head>
  <body>
    <div id="wrapper">
<?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
              <?php require_once('inc/sidebar.php'); ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-file-text-o"></i> Add Product <small> Add New Product</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-file-text-o"></i> Add New Product</li>
                    </ol>
                   
                    <?php 
                    if (isset($_POST['submit'])) {
                        $date = time();
                        $product_name = mysqli_real_escape_string($conn, $_POST['product-name']);
                        $image = $_FILES['image']['name'];
                        $image_tmp = $_FILES['image']['tmp_name'];
                        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
                        $price = mysqli_real_escape_string($conn, $_POST['price']);
                        $price_trim = preg_replace('/\s+/','',$price);
                        $size = $_POST['size'];
                        $detail = mysqli_real_escape_string($conn, $_POST['detail']);

                        
                        // $salt_query = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
                        // $salt_run = mysqli_query($conn, $salt_query);
                        // $salt_row = mysqli_fetch_array($salt_run);
                        // $salt = $salt_row['salt'];

                        if (empty($product_name) or empty($image) or empty($brand) or empty($price) or empty($size) or empty($detail)) {
                                $error = "All (*) Fields Are Required";
                        }
                        else if ($price != $price_trim) {
                            $error = "Don't Use Spaces In Price";
                        }
                        // else if (mysqli_num_rows($check_run) > 0) {
                        //     $error = "User Name or Email Already Exist";
                        // }
                        else{
                            $insert_query = "INSERT INTO `products` (`id`, `product_name`, `image`, `brand`, `price`, `size`, `detail`) VALUES (NULL, '$product_name', '$image', '$brand', '$price', '$size', '$detail')";
                            if (mysqli_query($conn, $insert_query)) {
                                $msg = "Product Has Been Added";
                                move_uploaded_file($image_tmp, "img/$image");
                                $image_check = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
                                $image_run = mysqli_query($conn, $image_check);
                                $image_row = mysqli_fetch_array($image_run);
                                $check_image = $image_row['image'];
                                $product_name = "";
                                $brand = "";
                                $price = "";
                                $detail = "";
                            }
                            else{
                                $msg = "Product Has Not Been Added";
                            }
                        }
                    }
                     ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="first-name">Product Name:*</label>
                                <?php 
                                if (isset($error)) {
                                    echo "<span class='pull-right' style='color:red;'>$error</span>";
                                }
                                else if (isset($msg)) {
                                    echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                }
                                 ?>
                                <input type="text" id="product-name" name="product-name" class="form-control" value="<?php if (isset($product_name)) { echo $product_name;}?>" placeholder="Product Name">
                                </div>

                                <div class="form-group">
                                <label for="image">Product Image:*</label>
                                <input type="file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                <label for="brand">Brand:*</label>
                                <input type="text" id="brand" name="brand" class="form-control" value="<?php if (isset($brand)) { echo $brand;}?>" placeholder="Brand Name">
                                </div>

                                <div class="form-group">
                                <label for="username">Price:*</label>
                                <input type="text" id="price" name="price" class="form-control" value="<?php if (isset($price)) { echo $price;}?>" placeholder="0">
                                </div>
                               
                                <!-- <div class="form-group">
                                    <label for="size">Sizee</label>
                                    <input type="checkbox" name="size" class="form-control" placeholder="small" type="checkbox">
                                    <input type="checkbox" name="size" class="form-control" placeholder="large">
                                </div> -->

                                <div class="form-group">
                                <label for="size">Size:*</label>
                                <select name="size" id="size" class="form-control">
                                    <option value="X-Samll">X-Small</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                    <option value="X-large">X-Large</option>
                                    <option value="XX-Large">XX-Large</option>
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="detail">Details:*</label>
                                <textarea name="detail" id="detail" cols="20" rows="5" class="form-control"><?php if (isset($detail)) { echo $detail;}?></textarea>
                                </div>

                                <input type="submit" value="Add Product" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-4">
                            <?php 
                            if (isset($check_image)) {
                                echo "<img src= 'img/$check_image' width='100%'>";
                            }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <?php require_once('inc/footer.php'); ?>