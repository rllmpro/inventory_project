<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../connection.php';
	grabList();
}

function grabList(){
	global $connect;
	
	$query = "SELECT * FROM `inventory`";
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	$temparray = array();
	
	if($number_of_rows > 0){
		while($row = mysqli_fetch_assoc($result)){
			$temparray[] = $row;
		}
	}
	header('Content-Type: application/json');
	echo json_encode(array("list" =>$temparray));
	mysqli_close($connect);
}