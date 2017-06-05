<?php
$title = "Uploaded";
/* 
New methods used

basename($file);
is_dir($directoryname);
mkdir($directoryname,0777);
move_uploaded_file($current,$destination);

*/


$t = time();

session_start();
    

// ---------------------- \\
include "html_head.php";
include "nav.php";
include("logout_style.php");
//  ---------------------- //



$fileSize = 0;
$mimeType = "";
$filetype = "";
$dirnum = 0777;
$dir1 = "uploads/".$_SESSION['id'];
$file_dest = $dir1."/".$t.basename($_FILES["uploaded_file"]["name"],PATHINFO_BASENAME);
$file = $_FILES['uploaded_file'];
$hd = $_FILES['uploaded_file']['tmp_name'];



function upload_image($holding,$dest){

       $rt = move_uploaded_file($holding , $dest);
   
    if($rt){
        return true;
    }
    else {
        return false;
    }

}

function check_image($dest){
        $filet = pathinfo($dest);
        $filetype = $filet['extension'];
          if($filetype == 'jpg' || $filetype == 'jpeg' || $filetype == 'png' || $filetype == 'gif' || $filetype == 'JPG' || $filetype == 'JPEG' || $filetype == 'PNG' || $filetype == 'GIF'){
           
            return true;
        }  else if($filetype != 'jpg' && $filetype != 'jpeg' && $filetype != 'png' && $filetype != 'gif'){
            
            $_SESSION['imgerror_msg'] = "Invalid Image type";
            $_SESSION['imgerror'] = true;
            $_SESSION['ft'] = $filetype;
            header("Location: signedInPage.php");
            return false;
        }
        
} 

function exist($dest){
    if(file_exists($dest)){
         
        return false;
    }
    else {
        return true;
    }
}

function file_type($files){
    $mimeType = $files["type"];
    if($mimeType == "image/jpg" || $mimeType == "image/jpeg" || $mimeType == "image/png" || $mimeType == "image/gif"){
         
        return true;
    } else {
        
        return false;
    }
    
    
}

function file_size($files){
    $fileSize = $files["size"];
    if($fileSize <= 3000000){
       
        
        return true;
    } else {
       
        return false;
    }
  
}

function doTheJob($holding,$dest,$files){
    //$dest - path where file is going to be uploaded to.
    //$holding - current hold of the file $_FILES['filename']['tmp_name']
    //$ok - integer
    //$files - $_FILES['filename']
    
    if(file_size($files)){
        
         if(file_type($files)){
             
              if(exist($dest)){
                  
                    if(check_image($dest)){
                        
                              if(upload_image($holding,$dest)){
                                return true;
                    
                        }else { echo "<h3>Uploading Image.. Failed</h3><br>"; }
                    }else { echo "Checking if image.. Failed<br><br>"; }
                }else { echo "Checking existence.. Failed<br>"; } 
            }else { echo "Checking type....  Failed<br>"; }
        }else { echo "Checking size...  Failed<br>"; }
    
}


if(isset($_POST['submit'])){
  
 if(is_dir($dir1)){
  
       if(doTheJob($hd,$file_dest,$file) === true){
           echo "<h2 style='color: green'>File uploaded</h2><br>";
           echo $_SESSION['id'];
       }
     else
     {
        echo "<br>Didnt do the job<br>";
     }
       
       
       
}else
{
mkdir($dir1,$dirnum);
if(is_dir($dir1)){
if(doTheJob($hd,$file_dest,$file) === true){
           echo "<p style='color:Black; font-size:'30px;'>File uploaded, but had to make a new directory<p><br>";
       }
     else
     {
        echo "Didnt do the job, but made a new directory<br>";
     }
} else { echo"error happened<br>";}

} 
    
    
    
}





?>