<?php
require_once('db.php');

session_start();

// if (!isset($_SESSION['username'])) {
//     header('location: login.php');
// }

////////////// Add Category/////////////

if(isset($_POST['add-category'])) {
	$cat_name = $_POST['cat-name'];

	if(empty($cat_name)) {
		header('location: ../categories.php?error=Category Name Required');
	}
	else{
		$query = "INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name')";
		if(mysqli_query($conn,$query)) {
			header('location: ../categories.php?success=New Category Added');
		}
		else{
			header('location: ../categories.php?error=This Category Already Exists');
		}

	}

}

if(isset($_POST['update-category'])) {
	$edit_id = $_GET['update_category'];
	$up_cat_name = $_POST['up-cat-name'];

	if(empty($up_cat_name)) {
		header("location: ../categories.php?uperror=Category Name Required&edit=$edit_id");
	}
	else{
		$query = "UPDATE `categories` SET `cat_name` = '$up_cat_name' WHERE `cat_id` = $edit_id";
		if(mysqli_query($conn,$query)) {
			header("location: ../categories.php?upsuccess=Category Updated Successfully&edit=$edit_id");
		}
		else{
			header("location: ../categories.php?uperror=This Category Already Exists&edit=$edit_id");
		}

	}

}
 ?>