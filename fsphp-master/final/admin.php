<?php session_start();// Starting Session ?>

<html>
<head>
	<meta charset="utf-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<style>
		table, td {
			border: 1px solid #000;
		}
		th{
			background: #000;
			color:#fff;
			padding:10px;
		}
		td {
			padding: 20px;
		}
	</style>
</head>
<body>
<table>
	<tr>
		<th>name</th><th>email</th>
	</tr>

	<?php

		//connect to database
		$cnt = mysqli_connect("localhost", "root", "root", "DBNAME");

		//sql statement to capture all data from a table
		$sql = "SELECT * FROM TBNAME";

		//query by connecting and adding sql statement
		$result = mysqli_query($cnt,$sql);
		//print_r($result);

		//capture all the table data into an array
		$table = mysqli_fetch_all($result, MYSQLI_ASSOC);
		//print_r($table);

		//loop through the array to generate table
		foreach($table as $row) {
			echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td></tr>";
		}

		//close the connection
		mysqli_close($cnt); // Closing Connection
	?>
</table>
</body>

</html>
