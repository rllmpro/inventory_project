<?php
include('../connection.php');
require("../includes/helpers.php");
renderHeader(["title" =>"My Pantry"]); 
	//mysql_connect('hostname', 'username', 'password');
	//mysql_select_db('database-name');
	
	echo "<p>Select an item below to add to pantry list<p>";
	/*$user = "SELECT `item` FROM `inventory`";
	$result = mysqli_query($connect, $user);
	echo "<form action='../public/addtopantry.php' method = 'POST'>";//remove public
	echo "<select name='user'>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<option value='" . $row['inventory'] . "'>" . $row['item'] . "</option>";
		//echo "<imput type = 'submit' value = 'Add' />";
	$val = $_POST['item'];
	}
	echo "</select>";*/	
	echo "<form action = '../public/addtopantry.php' method= 'POST'>";
	echo "<select name = 'food'>";
	require ("foodlist.php");
	
	echo "</select>";
	echo "<input type = 'submit' value = 'Add' name = 'add'/>";
	echo "<input type = 'submit' value = 'Remove' name = 'remove'/>";
	echo "<input type = 'submit' value = 'Remove/Add' name = 'removeadd'/>";
	echo "</form>";

$query = "SELECT * FROM `user_inventory`";
$querydata = mysqli_query($connect, $query) or die('error getting data');
	echo "<table align='center'>";
	echo "<tr><th>Item</th><th>Type</th><th>Date Added</th>";
while($rows = mysqli_fetch_array($querydata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $rows['item'];
	echo "</td><td>";
	echo $rows['type'];
	echo "</td><td>";
	echo $rows['time'];
	echo "</td></tr>";
}
echo"</table>";

	
renderFooter();

?>