<?php ?>

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
    <?php require_once("nav.php"); ?>
<table>
	<tr>
		<th>name</th><th>email</th>
	</tr>

	<?php 
    
    $cnt = mysqli_connect("localhost", "root", "root", "db1");
    
    $qry = "select * from tb1";
    
    $result = mysqli_query($cnt,$qry);
    print_r($result);
    
//    $table = mysqli_fetch_array($result);
    
//    this formula doesnt work on PC
//    $table = mysqli_fetch_all($result, MYSQLI_ASSOC);
//    print_r($table);
    
    while($row = $result->fetch_assoc()){
//        print_r($row) $row; 
        
        echo '<tr><td></td>'.$row['name'].'<td></td>'.$row['email'].'</td></tr>';
    }
    mysqli_close($cnt);
    
    ?>

</table>
</body>

</html>
