<?php
session_start(); 
include "html_head.php";
include "nav.php";
include("logout_style.php");

$dirnum = 0777;
$dir1 = "uploads/".$_SESSION['id'];
?>
<body><nav>
    <a href="logoutPage.php">Logout</a>
    
    </nav></body>



<?php




if(is_dir($dir1)){
echo "already here";
}else
{
mkdir($dir1,$dirnum);
if(is_dir($dir1)){
echo "just made";
}

}




?>

