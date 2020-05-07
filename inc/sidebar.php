<?php 
require_once('inc/db.php');
 ?>
<head>
	
</head>

  <body>
    <div id="wrapper">
        <div class="container-fluid body-section">
                                                          
                    <!-- <div class="row"> -->
                        <div class="col-md-3">
                            <center>
                                <h3><span style='color: orange;'>LOC</span><span style='color: grey;'>ATIONS</span></h3>
                                
                            </center>
                            <br>

                            <table class="table table-hover table-bordered table-striped">
                                
                                <tbody>
                                <?php 
                                $query = "SELECT * FROM categories ORDER BY cat_id DESC ";
                                $run = mysqli_query($conn, $query);
                                if (mysqli_num_rows($run) > 0) {
                                    while($row = mysqli_fetch_array($run)){
                                        $cat_id = $row['cat_id'];
                                        $cat_name = $row['cat_name'];
                                 ?>
                                    <tr>                                        
                                    <div class="panel panel-default">
								        <div class="panel-heading">
									       <h4 class="panel-title"><a href="shop.php"><center><span style='color: grey;'><?php echo ucwords($cat_name); ?></span></center></a></h4>
								        </div>
							         </div>
                                       
                                    </tr>
                                    <?php 
                                        }
                                    }
                                    else{
                                    echo "No Category Found";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <!-- </div> -->
                </div>
</body>