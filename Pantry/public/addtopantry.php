<?php
include '../views/mypantry.php';//remove views

$selected_item = $_POST['food'];
	
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($selected_item))
{
	//Gets remaining table data based on the chosen item.
	$mainlist = "SELECT * FROM `inventory` WHERE item = '$selected_item'";
	$result_add = mysqli_query($connect, $mainlist);
	$row_add = mysqli_fetch_array($result_add, MYSQLI_ASSOC);
	$item_check = ("SELECT * FROM `user_inventory` WHERE item = '$selected_item'");
	$check = mysqli_query($connect, $item_check);
	$row_check = mysqli_fetch_array($check, MYSQLI_ASSOC);	
		
		
	//Adds item to user_inventory.
	if($_POST['add']){
		//Checks to see if item is already in the table.
		
		//var_dump($row_check);
		if($row_check== null){
			//echo "empty";
		$query_add = "INSERT INTO `user_inventory` (`item_id`, `item`, `type`, `time`) VALUES ('{$row_add["id"]}', '{$row_add["item"]}', '{$row_add["type"]}', CURRENT_TIMESTAMP)";
		$row_insert = mysqli_query($connect, $query_add);
		}
		redirect("../views/mypantry.php");
	}else if($_POST['remove']){
		//Removes item from the pantry list.
		//echo "remove";
		if($row_check != null){
		$query_remove = "DELETE FROM `user_inventory` WHERE item = '$selected_item'";
		$row_remove = mysqli_query($connect, $query_remove);
		}else{
			echo "This item has already been removed.";
		}
		redirect("../views/mypantry.php");
	}else if($_POST['removeadd']){
		//Adds items to grocery list and removes them from pantry.
		$grocery_check = ("SELECT * FROM `grocery_list` WHERE item = '$selected_item'");
		$grocery = mysqli_query($connect, $grocery_check);
		$row_check_grocery = mysqli_fetch_array($grocery, MYSQLI_ASSOC);
		if($row_check_grocery == null){
			$query_add = "INSERT INTO `grocery_list` (`item_id`, `item`, `type`) VALUES ('{$row_add["id"]}', '{$row_add["item"]}', '{$row_add["type"]}')";
			$row_insert = mysqli_query($connect, $query_add);
		}
		
		if($row_check != null){
			$query_remove = "DELETE FROM `user_inventory` WHERE item = '$selected_item'";
			$row_remove = mysqli_query($connect, $query_remove);
			
		}else{
			echo "This item has already been removed.";
		}
	}
	redirect("../views/mypantry.php");
	
	
	
}

?>