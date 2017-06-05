<?php
$title = "Sign Up";
session_start();
include "html_head.php";
include "nav.php";
$email_v = true;
$qwerty = "";
$email_verifier = true;


function getID(){
    $getrow = mysqli_query($db_conn,"SELECT * FROM users WHERE email = '$email' ");
    $row1 = mysqli_fetch_assoc($getrow);
    $userid = $row1['id'];
    $_SESSION['id'] = $userid;
    if(isset($_SESSION['id'])){
        return true;
    }
    else {
        return false;
    }
    
}



if(isset($_POST['btn_sub']) && isset($_POST['email'])  && isset($_POST['Lname'])  && isset($_POST['Fname'])){
    
    include "db.php";
    
    $email = $_POST['email'];
    $f_name = $_POST['Fname'];
    $l_name = $_POST['Lname'];    
    $su_pwd = $_POST['password'];
    $rt_pwd = $_POST['Rpassword'];
    
    
    
    function checkd($data,$field){
        $sql = "select from users where ".$field."='".$data."'";
        $q_r = mysqli_query($db_conn,$sql);
        if(mysqli_num_rows($q_r) > 0){
            $verify =  false;
        }else {
            $verify = true;
        }
        return $verify;
    }
    
    
    
    
    
   
    
    
        if(checkd($email,"email")){
                if($su_pwd == $rt_pwd){
                    $sql = "INSERT INTO users (fname,lname,email,pwd) VALUES ('$f_name','$l_name','$email','$su_pwd')";
                    $insert_query = mysqli_query($db_conn,$sql);


                        if($insert_query){
                        $_SESSION['fname'] = $f_name;
                        $_SESSION['lname'] = $l_name;
                        getID();
                         
                        header("Location: loginPage.php"); 
                                
                        }
                        else {
                            $qwerty = "Information has been used already";
                        }
                    
                    }
           }else{
            $email_v = false;
        }

}





?>



<style>
    .logoutHide{
        visibility:hidden;
    }
</style>



<body>
    
    
    
    
    
    
    
<form action="signup.php" method="post" style='padding: 5px;'>
        <h4><?php if($email_v == false){echo "Email already exist"; } ?></h4>
        <input type="text" name="Fname" Placeholder="First Name"><br>
          <input type="text"  name="Lname"  Placeholder="Last Name"><br>
            <input type="email"  name="email"  Placeholder="Email Address"> <br>
            <input type="password"  name="password" value=""  Placeholder="Password" required><br>
            <input type="password"  name="Rpassword"  Placeholder="Re-type Password" required style='margin-bottom: 4px;'><br>
            <input type="submit" name="btn_sub" value="Sign Up" style="background-color: #99c; border:1px solid white;  border-radius: 5%; font-size: 13px; "> 
            
            <a href="loginPage.php"  style='float: right; 
                                            margin: 3px;
                                            padding: 4px; 
                                            background-color: #99c ; 
                                            color: #394599; 
                                            text-decoration: none; 
                                            font-size: 15px;
                                            border: 1px solid #eee;
                                            border-radius: 5%;'>Login</a>
        </form>
    
    
    
    
    
    </body>
    