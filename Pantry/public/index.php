<?php require("../includes/helpers.php"); ?>

<?php renderHeader(["title" =>"Kitchen Pantry"]); ?>

	<div>
	<br>
	You currently have these items in your pantry.<br>
	<br>
	</div>
	<div>
		
		
<?php

//require("../includes/helpers.php");
//renderHeader(["title" =>"My Pantry"]); 
$query = "SELECT * FROM `user_inventory`";
$querydata = mysqli_query($connect, $query) or die('error getting data');
	echo "<table align='center'>";
	echo "<tr><th>Item</th><th>Type</th><th>Date Added</th>";
while($row = mysqli_fetch_array($querydata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row['item'];
	echo "</td><td>";
	echo $row['type'];
	echo "</td><td>";
	echo $row['time'];
	echo "</td></tr>";
}
echo"</table>";
?>
	
<?php renderFooter(); ?>