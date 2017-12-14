<?php session_start(); ?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<style>
		*{
			font-family: sans-serif;
		}
	</style>
</head>
<body>
<?php require_once "nav.php"; ?>
<h2>Login</h2>
<form method="post">
<label>E-mail
	<input type="email" name="email"  value="" ><br>
</label>
	<br>
<label>Password
	<input type="password" name="pw" value="" ><br>
</label>
<br>
<input type="submit" name="submit" value="Submit">
</form>

<?php
    
    if( isset($_POST['submit'] ) ){
        
        if( empty($_POST['email']) || empty($_POST['pw']) ){
            echo "required fields are empty";            
        } else {
            $p = $_POST['pw'];
            $e = $_POST['email'];
            
            $cnt = mysqli_connect("localhost", "root", "root", "db1");
            
            $qry = "select * from tb1 where pw='$p' and email='$e'";
            
            $login = mysqli_query($cnt, $qry);
            //print_r($login);
            $row = $login -> num_rows;
            
            if ($row == 1){
                $a = mysqli_fetch_assoc($login);
            //print_r($a);
                $_SESSION['u'] = $a['uid'];
//                echo $_SESSION['u'];
                $_SESSION['d'] = $a['date'];
//                echo $_SESSION['d'];
                $_SESSION['n'] = $a['name'];
//                echo $_SESSION['n'];
                $_SESSION['e'] = $a['email'];
//                echo $_SESSION['e'];
                $_SESSION['p'] = $a['pw'];
//                echo $_SESSION['p'];
                echo "<a href='profile.php'>proceed to profile</a>";
                
            } else {
                echo "try again";
                
            }
            
            mysqli_close($cnt);
        }
        
        
    }
    
    ?>

</body>
</html>