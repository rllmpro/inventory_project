<!doctype html>
<html>
	<head>
		<title><?= htmlspecialchars($title) ?></title>
		<link href="../css/style.css" type="text/css" rel="stylesheet"/>
	</head>
		<style>
			body {
			background-size: cover;
			background-image: url("https://c2.staticflickr.com/8/7404/27647332925_0184bfced6_b_d.jpg"); 
			text-align: center;
			}
			td {
			background-color: #00CED1;
			color: black;
			text-align: center;
			border-radius: 7px;
			padding: 10px;
			font-size: 14px;
			border: 2px solid white;
			}
			th {
			background-color: #FFF987;
			color: black;
			border-radius: 7px;
			border: 1px solid white;
			}
			
		</style>
	<body>
			<h1><?= htmlspecialchars($title) ?></h1>
		
		<div>
			<table align ="center">
				<tr>
				<td><a href= "../public/index.php">Home</a></td>
				<td><a href= "../views/mypantry.php">My Pantry</a></td>
				<td><a href= "../views/grocerylist.php">Grocery List</a></td>
				</tr>
			</table>
		</div>
		<div>
		