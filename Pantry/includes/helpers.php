<?php

require_once("../connection.php");
/*
 * Render header and footer.
 */
function renderHeader($data = []){
		extract($data);
		require("../views/header.php");
	}

function renderFooter($data = []){
	extract($data);
	require("../views/footer.php");
	
	}


function redirect($location)
{
	if (headers_sent($file, $line))
	{
		trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
	}
	header("Location: {$location}");
	exit;
}


?>