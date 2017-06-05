
<?php
session_start();
$title = $_SESSION['fname']." ".$_SESSION['lname'];
//$getid_connect = $mysqli_query($db_conn,"select * from users where email = '") 


include("html_head.php");
include("logout_style.php");


       

?>
<html>
    <head>
<title>Freshhhh</title>
        
        
        
        
</head>
    
    <body>
    <nav>
    <a href="logoutPage.php">Logout</a>
    
    </nav>    
      <?php  
       
   echo "<h3 style='color: #dfbbfa;'>Welcome ".$_SESSION['fname']." ".$_SESSION['lname'].", This is Your page. </h3><h2>".$_SESSION['id']."</h2>";
        
        
    ?>           

       
        
     
       <a href="mkdir.php">Redirect to make directory</a> 
        <?php
        if($_SESSION['imgerror'] == true){
            echo "<p style='color: red;'>".$_SESSION['imgerror_msg']." : ".$_SESSION['ft']."</p>";
        }
        
        ?>
     
        
        <form action="uploaded.php" method="post" enctype="multipart/form-data">
          Select the file to be uploaded: <br>
          <input name="uploaded_file" type="file" id="fileUploaded">
          <input type="submit"  value="Upload" name="submit">
        </form> 
    
    </body>





</html>