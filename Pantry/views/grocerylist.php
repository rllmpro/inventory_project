<?php
require("../includes/helpers.php");
renderHeader(["title" =>"Grocery List"]); 
	print("Here you can make changes to your grocery list.");
	echo "<form action = '../public/grocerylist.php' method= 'POST'>";
	echo "<select name = 'grocery_item'>";
	require ("foodlist.php");
	echo "</select>";
	echo "<input type = 'submit' value = 'Add' name = 'add'/>";
	echo "<input type = 'submit' value = 'Remove From List' name = 'remove'/>";
	echo "<input type = 'submit' value = 'Add All' name = 'addall'/>";
	echo "</form>";
	
	$groceryList = "SELECT * FROM `grocery_list`";
	$grocerydata = mysqli_query($connect, $groceryList) or die('error getting data');
	echo "<table align='center'>";
	echo "<tr><th>Item</th><th>Type</th>";
	while($row = mysqli_fetch_array($grocerydata, MYSQLI_ASSOC)){
		echo "<tr><td>";
		echo $row['item'];
		echo "</td><td>";
		echo $row['type'];
		echo "</td></tr>";
		
	}
	echo"</table>";
	
	renderFooter();
?>
