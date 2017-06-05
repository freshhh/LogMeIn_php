<?php
$title = "Log In";

if(isset($_SESSION['id'])){
session_unset();
session_destroy();
    
}



session_start();
include "html_head.php";
include "nav.php";
$_SESSION['imgerror'] = false;
$_SESSION['error'] = false;
//if(isset($_POST['sign_up'])){
 //                   header("Location: signup.php");        }

?>
<style>
    .logoutHide{
        visibility:hidden;
    }
</style>
    
    
    <body>

    
   <?php
        
include("login_form.php");     
        
        
        
//Mandatory variables to dispaly
$fname = "";
$lname = "";
$pwd = "";
//checks if the submit button has been checked and info has been given.
if(isset($_POST['sub_Button'])){
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    
    //include the database to query.
    include "db.php";
    
            //checks if info given is valid and not empty
            if(($pwd != null) && ($email != null)){
                $sql = "SELECT * FROM users WHERE EMAIL='$email'";
                $results = mysqli_query($db_conn,$sql);

                
                
                if($results){

                $rows = mysqli_fetch_assoc($results);
                        

                        $fname = $rows['fname'];
                        $lname = $rows['lname'];
                        $db_pwd = $rows['pwd'];
                        $id = $rows['id'];
                        $_SESSION['id'] = $id;
                        $db_email = $rows['email'];
                        $_SESSION['db_email'] = $db_email;
                    
                        if($db_pwd == $pwd){
                            $_SESSION['fname'] = $fname;
                             $_SESSION['lname'] = $lname;
                            header("Location: signedInPage.php");      

                        } else
                        {
                          
                        
                               $_SESSION['error'] = true;
                            
                           
                        }

                        }
                    } else {
                echo "<p>Invalid information</p>" ;
            }

             }

?>

    </body>

    

