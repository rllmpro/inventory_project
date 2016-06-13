<?php
include '../views/grocerylist.php';
$selected_grocery = $_POST['grocery_item'];
if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($selected_grocery)){
	$mainlist = "SELECT * FROM `inventory` WHERE item = '$selected_grocery'";
	$result_add = mysqli_query($connect, $mainlist);
	$row_add = mysqli_fetch_array($result_add, MYSQLI_ASSOC);
	$item_check = ("SELECT * FROM `grocery_list` WHERE item = '$selected_grocery'");
	$check = mysqli_query($connect, $item_check);
	$row_check = mysqli_fetch_array($check, MYSQLI_ASSOC);
	if($_POST['add']){
		if($row_check == null){
			$query_addgrocery = "INSERT INTO `grocery_list` (`item_id`, `item`, `type`) VALUES ('{$row_add["id"]}', '{$row_add["item"]}', '{$row_add["type"]}')";
			$row_insertgrocery = mysqli_query($connect, $query_addgrocery);
		}else{
			echo "This item is already on the list.";
		}
		redirect("../views/grocerylist.php");
	}else if($_POST['remove']){
		if($row_check != null){
			$query_remove = "DELETE FROM `grocery_list` WHERE item = '$selected_grocery'";
			$row_remove = mysqli_query($connect, $query_remove);
		}else{
			echo "This item is not in the list to remove.";
		}
		redirect("../views/grocerylist.php");
	}else if($_POST['addall']){
		$grocery_addall = "SELECT * FROM `grocery_list`";
		$result_grocery = mysqli_query($connect, $grocery_addall);
		//Adds all contents of grocery list to the pantry inventory.
		 while ($row = mysqli_fetch_array($result_grocery, MYSQLI_ASSOC)) {
		 //echo "$row['item']";
		 //var_dump($row);
		 $user_check = "SELECT `item_id` FROM `user_inventory` WHERE item_id = '{$row["item_id"]}'";
		 $result_usercheck = mysqli_query($connect, $user_check);
		 $rowuser = mysqli_fetch_array($result_usercheck, MYSQLI_ASSOC);
		 
		 if($rowuser == null){
		 $query_addallgrocery = "INSERT INTO `user_inventory` (`item_id`, `item`, `type`, `time`) VALUES ('{$row["item_id"]}', '{$row["item"]}', '{$row["type"]}', CURRENT_TIMESTAMP)";
		 $insert_grocery = mysqli_query($connect, $query_addallgrocery);
		 $query_deletelist = "DELETE FROM `grocery_list` WHERE `grocery_list`.`item_id` = '{$row["item_id"]}'";
		 $delete_data = mysqli_query($connect, $query_deletelist);
		 }else if($rowuser != null){
		 	$query_updateuser = "UPDATE `user_inventory` SET `time` = CURRENT_TIMESTAMP WHERE `user_inventory`.`item_id` = '{$row["item_id"]}' ";
		 	$update_user = mysqli_query($connect, $query_updateuser);
		 	$query_deletelist = "DELETE FROM `grocery_list` WHERE `grocery_list`.`item_id` = '{$row["item_id"]}'";
		 	$delete_data = mysqli_query($connect, $query_deletelist);
		 }
		 
		 }
		 redirect("../views/grocerylist.php");
	}
	
}



?>