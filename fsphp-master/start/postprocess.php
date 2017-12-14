<?php session_start();
    
$n = $_POST['name'];
$u = $_POST['user'];
$e = $_POST['email'];
$p = $_POST['pw'];

//echo $n;
//echo "<br>";
//echo $u;
//echo "<br>";
//echo $e;
//echo "<br>";
//echo $p;
//echo "<br>";
////print_r($FILES['photo']);
//echo "<br>";
//echo $_FILES['photo']['name'];
//echo "<br>";
//echo $_FILES['photo']['type'];
//echo "<br>";
//echo $_FILES['photo']['tmp_name'];
//echo "<br>";
//echo $_FILES['photo']['error'];
//echo "<br>";
//echo $_FILES['photo']['size'];
//echo "<br>";

//email
$t = "info@artbyeloi.com";

$m = "First name: $n\n User: $u\n Email: $e\n Password: $p";

$s = "New User Registered";

$h = 'From: '.$t."\r\n".'Reply-To: '.$t."\r\n".'X-Mailer: PHP/'.phpversion();

//mail($t, $s, $m, $h);

//server file storage - write content to a file
mkdir("users/$u");

$f = fopen("users/$u/profile.text", "w");

$t = "$n\n$u\n$e\n$p";

fwrite($f, $t);

fclose($f);
//this switches the name of the photo uploaded only if jpeg but you can make it for any format 
if($_FILES){
    switch($_FILES['photo']['type']){
        case 'image/jpeg';    
            $x = "users/$u/img.jpg";
            break;
        case 'image/png';    
            $x = "users/$u/img.png";
            break;
         case 'image/gif';    
            $x = "users/$u/img.gif";
            break;
        default:
            $x = "";
            break;
            
    };

    if($x){
        $j = $_FILES['photo']['tmp_name'];
        $i = $x;
        move_uploaded_file($j, $i);
    };
    
};

//connecting - 3 steps connect query close
$cnt = mysqli_connect("localhost", "root", "root", "db1");

$qry = "INSERT INTO tb1 (name,email,pw) VALUES ('$n','$e','$p');";

mysqli_query($cnt, $qry);

mysqli_close($cnt);

$_SESSION['i'] = $i;
$_SESSION['n'] = $n;
$_SESSION['e'] = $e;

header('location:confirmed.php');



?>