
<?php //session_start(); ?>

<form  method="post" action="loginPage.php">
    <?php if(isset($_POST['submit']) && $_SESSION['error']){echo "<h3>Invalid information</h3>";}  ?>
            <input type="email"  name="email"><br>
            <input type="password"  name="pwd"><br>
            <input type="submit" name="sub_Button"><br>
            <a href="#">Forgot Password</a><br>
            <a href="signup.php">Sign Up</a><br>
   
    
        </form>


<?php
//<button name="sign_up" value="Sign Up!"  href="signup.php" >Sign Up!</button>
//<p style='color: black; font-size: 17px; margin: 14px auto 2px 2px;'> Don't have an account?</p>
?>
