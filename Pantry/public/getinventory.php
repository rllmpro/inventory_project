<?php
require_once("../connection.php");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$query = ("SELECT * FROM `user_inventory`");
	}
	
	//render("mypantry.php", ["title" => "My Pantry"]);
?>