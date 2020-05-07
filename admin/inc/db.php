<?php 
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_TABLE", 'estore');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_TABLE);

/*$conn = mysqli_connect("localhost","root","","estore");
if ($conn) {
	echo "DB connected";
}
else{
	echo "DB not connected";
}*/
 ?>
